<?php
class Results extends CI_Controller{

	public function index()
	{
		$this->config->load('app_config');
		$this->load->helper('url');
		
		$fb_config = array(
				            'appId'  => $this->config->item('appID'),
				            'secret' => $this->config->item('appSecret')
		);
		$this->load->library('facebook', $fb_config);
		
		
		
		
		
		
		
		$results_arr=$this->config->item('results');
		$index=rand(0, count($results_arr)-1);
		
		$images_arr=$this->config->item('result_images');
		$image="";
		if(isset($images_arr[$index])){
			$image=$images_arr[$index];
		}
		
		$data=array();
		
		
		$doc = new DOMDocument();
		$doc->load( 'data/config.xml' );
		
		
		$results=$doc->getElementsByTagName("q1");
		$numQuestions=$doc->getElementsByTagName("question")->length;
		
		$index=0;
		$list=$results;
		while ($index<$numQuestions) {
			
			for ($i = 0; $i < $list->length; $i++) {
				if($list->item($i)->nodeType !=3 && $list->item($i)->getAttribute("ans") == $_POST[('q'.$index)]){
					
					if($index==$numQuestions-1){
						$data['result_text'] = $list->item($i)->textContent;
						$data['result_image'] = $list->item($i)->getAttribute("img");
					}
					$list=$list->item($i)->childNodes;
					break;
				}
			}
			
			$index++;
		}
		
		
		
		if (! $this->facebook->getUser()) {
			$data['login_url'] = $this->facebook->getLoginUrl(
			array('scope' => 'publish_stream')
			);
		}
		
		

			try {
				$attachment = array(
												'name' =>$data['result_text'].'
												'.$this->config->item('facebook_page'),
												'source' => '@'.realpath("images/".$data['result_image']),
												'method'=>'stream.publish',
				);
				$this->facebook->setFileUploadSupport(true);
				$result = $this->facebook->api('/me/photos/','post',$attachment);
			} catch (Exception $e) {
			}
			

		
		
	
		$this->load->view('results_view',$data);
	}
}