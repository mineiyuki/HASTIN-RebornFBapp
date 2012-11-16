<?php
	//Facebook SDK for PHP の src/ にあるファイルを
	//サーバ内の適当な場所にコピーしておく
	require_once('./src/facebook.php');

	$config = array(
		'appId'  => '461867823852501',
		'secret' => '32a6b43df6ebfa894c0b1a53547671a6'
	);

	$facebook = new Facebook($config);

	//ログイン済みの場合はユーザー情報を取得
	if ($facebook->getUser()) {
		try {
			$user = $facebook->api('/me','GET');
		} catch(FacebookApiException $e) {
			//取得に失敗したら例外をキャッチしてエラーログに出力
			error_log($e->getType());
			error_log($e->getMessage());
		}
	}
?>
<html>
	<body>
	<?php
		if (isset($user)) {
			//ログイン済みでユーザー情報が取れていれば表示
			echo '<pre>';
			print_r($user);
			echo '</pre>';
		} else {
			//未ログインならログイン URL を取得してリンクを出力
			$loginUrl = $facebook->getLoginUrl();
			echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
		}
	?>
	</body>
</html>
