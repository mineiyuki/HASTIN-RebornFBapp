<?php 
$this->config->load('app_config');
$this->load->helper('form');
$this->load->helper('url');
$this->load->helper('html');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php $this->config->item('results_page_title'); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("css/style.css");?>" />
	</head>
	<body>
	
	
	<div id="container">
		<?php 
			if(isset($login_url)){
				echo '<script type="text/javascript"> top.location.href = "'.$login_url.'";</script>';
			}
		
		?>
		<div id="headerContainer"><img  alt="<?php $this->config->item('results_header_img_text') ?>" src="<?php  echo base_url("images/".$this->config->item('results_header_img'));?>"></div>
		<div id="result_txt"><?php echo $result_text; ?></div>
		
		<?php 
			if ($result_image!=""){
				echo '<img alt="" src="'.base_url("images/".$result_image).'" id="result_image">';				
			}
		?>
		<br/>
	
		
		<script>function home(){top.location='<?php echo $this->config->item('facebook_page'); ?>'}</script>
		<a href="javascript:home()" id="home_btn" target="_self"></a>
		<div id="footer"><?php echo $this->config->item('results_footer_text');?></div>
	</div>
	
	</body>
</html>