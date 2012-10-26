<?php 
$this->config->load('app_config');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php echo $this->config->item('app_meta'); ?>
	<title><?php echo $this->config->item('start_link_text'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url("css/style.css");?>" />
</head>
<body>


<div id="container">

	<img alt="<?php echo $this->config->item('splash_scr_alt_text');?>" src="<?php echo base_url("images/".$this->config->item('splash_scr_image_link'));?>">
	
	<?php 
		if($logged_in==true)
		{
			echo '<a href="'.$login_url.'" id="start_link" target="_self">'.$this->config->item('start_link_text').'</a>';	
		}else{
			echo "<script>function login(){top.location='".$startUrl."';}</script>";
			echo '<a href="javascript:login()" id="start_link" target="_self">'.$this->config->item('start_link_text').'</a>';
		}
	?>
	
</div>

</body>
</html>