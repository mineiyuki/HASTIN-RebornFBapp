<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>サンプル診断</title>
</head>
<body>
  <?php
   $key=isset($_POST['key']) ? htmlspecialchars($_POST['key']) : "";
   require_once 'src/facebook.php';
  
   $facebook = new Facebook(array(
    'appId' => '461867823852501',
    'secret' => '32a6b43df6ebfa894c0b1a53547671a6',
   ));
  
   $user = $facebook->getUser();
   $num = 0;
   if ($user) {
    $friends_num = 0;
    $name = "hoge";
    try {
      $friends = $facebook->api(array(
                        'method'  => 'friends.get',
                        'uid'     => $user,
                        'access_token' => $key,
      ));
      $friends_num = count($friends);
      $user_profile = $facebook->api('/me');
      $name = $user_profile['name'];
    }
    catch (FacebookApiException $e)
    {
      error_log($e);
    }
    $num = $friends_num % 5;
   }
        $sub_message = "きっといいことあります";
    $picture = "http://shindan.c4sa.jp/sample/image/result0.png";
    if($num == 0){
          $sub_message = "大吉";
      $picture = "http://shindan.c4sa.jp/sample/image/result1.png";
    } else if($num == 1){
          $sub_message = "中吉";
      $picture = "http://shindan.c4sa.jp/sample/image/result2.png";
        } else if($num == 2){
          $sub_message = "小吉";
      $picture = "http://shindan.c4sa.jp/sample/image/result3.png";
        } else if($num == 3){
          $sub_message = "吉";
      $picture = "http://shindan.c4sa.jp/sample/image/result4.png";
        } else if($num == 4){
          $sub_message = "末吉";
      $picture = "http://shindan.c4sa.jp/sample/image/result5.png";
        }
          $message = $sub_message . "・・・と" . $name . "さんの運勢を勝手に予想しています。";
?>
    <center>
          <img src=<?php echo $picture?> />
          <?php echo $message ?>
          <a href="" onclick="document.form1.submit();return false;" >結果をウォールに投稿。</a>
          <form name="form1" method="POST" action="post.php" >
          <input type=hidden name="message" value="<?php echo $message ?>">
          <input type=hidden name="picture" value="<?php echo $picture ?>">
          <input type=hidden name="key" value="<?php echo $key ?>">
          </form>
    </center>
  </body>
</html>