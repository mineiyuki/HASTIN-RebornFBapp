<?php
$message=isset($_POST['message']) ? htmlspecialchars($_POST['message']) : "";
$picture=isset($_POST['picture']) ? htmlspecialchars($_POST['picture']) : "";
$key=isset($_POST['key']) ? htmlspecialchars($_POST['key']) : "";
  
if($message != "" && $picture != "" && $key != ""){
  require_once 'http://mineiyuki.com/hastin/src/facebook.php';
  
  $facebook = new Facebook(array(
      'appId' => '461867823852501',
      'secret' => '32a6b43df6ebfa894c0b1a53547671a6',
  ));
  
  $user = $facebook->getUser();
  
  if ($user) {
    try{
       $facebook->api('/me/feed', 'POST', array(
          'message' => $message,
          'picture' => $picture,
          'link' => "http://www.facebook.com/pages/C4SA/304181992955126",
          'access_token' => $key,
        ));
     } catch (Exception $e){
        error_log($e);
     }
  }
}
?>
  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>サンプル診断</title>
</head>
<body>
  
  投稿しました。
  
</body>
</html>