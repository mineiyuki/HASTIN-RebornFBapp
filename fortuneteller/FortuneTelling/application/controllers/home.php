<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->config->load('app_config');
		$this->load->helper('url');
		
		$fb_config = array(
		            'appId'  => $this->config->item('appID'),
		            'secret' => $this->config->item('appSecret')
		);
		$this->load->library('facebook', $fb_config);
		
		
		if(empty($_REQUEST["signed_request"])) {
			header('Location: '.$this->config->item('facebookTabURL'));
		} else {
			$app_secret = $fb_config['secret'];
			$reqData = $this->parse_signed_request($_REQUEST["signed_request"], $app_secret);
			if (empty($reqData["page"]["liked"])) {
				$this->load->view('like_view');
				return;
			}
		}
		
		
		$user = $this->facebook->getUser();
		
		if ($user) {
			try {
				$data['user_profile'] = $this->facebook->api('/me');

				
			} catch (FacebookApiException $e) {
				$user = null;
			}
		}
		
		if ($user) {
			$data['logout_url'] = $this->facebook->getLogoutUrl();
			$data['startUrl']=site_url("questions");
			$data['logged_in']=true;
			redirect('/questions/', 'refresh');
			return;
		} else {
			
			
			$data['login_url'] = $this->facebook->getLoginUrl(array('scope' => 'publish_stream'));
			$data['startUrl']=$data['login_url'];
			$data['logged_in']=false;
		}
		
		$this->load->view('home_view',$data);
	}
	
	
	
	function parse_signed_request($signed_request, $secret) {
		list($encoded_sig, $payload) = explode('.', $signed_request, 2);
	
		// decode the data
		$sig = $this->base64_url_decode($encoded_sig);
		$data = json_decode($this->base64_url_decode($payload), true);
	
		if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
			error_log('Unknown algorithm. Expected HMAC-SHA256');
			return null;
		}
	
		// check sig
		$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
		if ($sig !== $expected_sig) {
			error_log('Bad Signed JSON signature!');
			return null;
		}
	
		return $data;
	}
	
	function base64_url_decode($input) {
		return base64_decode(strtr($input, '-_', '+/'));
	}
	
	
	
}
