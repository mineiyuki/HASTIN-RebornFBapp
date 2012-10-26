<?php 
$this->config->load('app_config');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Questions</title>
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url("css/style.css");?>" />
</head>
<body>
<div id="container">
	<img alt="<?php echo $this->config->item('like_image_alt_text');?>" src="<?php echo base_url("images/".$this->config->item('like_image_link'));?>">
</div>

</body>
</html>