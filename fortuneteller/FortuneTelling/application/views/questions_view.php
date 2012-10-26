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
	<title><?php $this->config->item('questions_page_title');?></title>
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url("css/style.css");?>" />
</head>
<body>


<div id="container">
	<div id="headerContainer"><img  alt="header" src="<?php  echo base_url("images/".$this->config->item('questions_header_img'));?>"></div>
	<div id="questions">
		<?php 
			echo form_open('results');
			
			for ($i = 0; $i < count($questions); $i++) {
				
				$group="q".$i;
				
				echo '<div class="question" id="q_'.$i.'">';
				echo '<div class="question_label" id="ql_'.$i.'">';
				echo form_label($questions[$i]->question, $group);
				echo "</div>";
				
				$first=true;
				for ($j = 0; $j < count($questions[$i]->answers); $j++) {
					echo form_radio($group,$j,$first);
					echo $questions[$i]->answers[$j]."   ";
					$first=false;
				}
				
				echo "</div>";
			}
			
			echo '<div id="submit_container">';
			echo form_submit('mysubmit');
			echo "</div>";
			
			echo form_close();
		?>
	</div>
	<div id="footer"><?php echo $this->config->item('questions_footer_text');?></div>
</div>

</body>
</html>