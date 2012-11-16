<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>サンプル診断</title>
</head>
<body>

<?php
require_once 'src/facebook.php';
  
$facebook = new Facebook(array(
    'appId' => '461867823852501',
    'secret' => '32a6b43df6ebfa894c0b1a53547671a6',
));
  
$fb_user = $facebook->getUser();
$signed_request = $facebook->getSignedRequest();
$like_status = $signed_request["page"]["liked"];
  
if( $like_status ){
  
        if (!$fb_user) {
        $par = array(
          'canvas' => 1,
          'fbconnect' => 0,
          'scope' => 'publish_stream,read_friendlists',
          'redirect_uri' => 'http://www.facebook.com/pages/C4SA/304181992955126?sk=app_102962246494780');
        $fb_login_url = $facebook->getLoginUrl($par);
  
        echo "<script type='text/javascript'>top.location.href = '$fb_login_url';</script>";
        }
  
      $key = $facebook->getAccessToken();
      echo "<center>";
      echo "<div>";
      echo "<a href='' onclick='document.form1.submit();return false;' >サンプル診断</a>";
      echo "<form name='form1' method='POST' action='answer.php' >";
      echo "<input type=hidden name='key' value='" . $key . "'>";
      echo "</form>";
      echo "</div>";
      echo "</center>";
  
} else {
     echo "<center>";
     echo "いいね押してね";
     echo "</center>";
}
?>
  
</body>
</html>