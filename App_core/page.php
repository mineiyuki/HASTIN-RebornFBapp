<?php
if($fh = @fopen('data.txt','r')){
	while(FALSE !== ($line = fgets($fh))){
		$arr = unserialize($line);
	}
	fclose($fh);
}else{
	echo 'ただいまサイトのメンテナンス中です';
    exit;
}
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name = "viewport" content = "width = 740">
<title><?php echo $arr['app_title']; ?></title>

<link rel="stylesheet" type="text/css" href="common.css">
<style type="text/css">
body{
	color:<?php echo $arr['body_txt_color']; ?>;
	/*
	background: url(images/bg_img.jpg) repeat 50% 50% <?php echo $arr['body_bg_color']; ?>;
	*/
}
a.btn,
input[type="submit"].btn {
	background: <?php echo $arr['btn_bg_color']; ?>;
	color:<?php echo $arr['btn_txt_color']; ?>;
}
a.btn:hover,
input[type="submit"].btn:hover{
	color:<?php echo $arr['btn_txt_hover']; ?>;
}
</style>
</head>
<body>





<div class="wrap">
<h1><img src="images/title_img.jpg" style="max-width:580px;" alt="<?php echo $arr['app_title']; ?>" title="<?php echo $arr['app_title']; ?>" /></h1>
<p class="b"><?php echo $arr['app_desc']; ?></p>

<?php
if (isset($_POST['signed_request'])) {
    list($encoded_sig, $payload) = explode('.', $_POST['signed_request'], 2); 
    $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
}
?>
<?php if ($data && $data['page']['liked']) : ?>
<!-- ■ いいね後 ■ -->

<a href="<?php echo $arr['app_url']; ?>" target="_parent" class="btn">アプリへ移動</a>
<!--
<a href="https://secure2188.sakura.ne.jp/mineiyuki.com/hastin/" class="btn">アプリへ移動</a>
-->

<?php else : ?>
<!-- ■ いいね前 ■ -->

<h2><?php /* echo $arr['iine_req']; */ ?>いいねを押してね！</h2>

<?php endif; ?>

</div><!-- /.wrap -->

</body>
</html>
