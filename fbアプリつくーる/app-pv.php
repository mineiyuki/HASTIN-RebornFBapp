<?php

$coupling = array(
	'1111' => '1',
	'1112' => '2',
	'1121' => '3',
	'1122' => '4',
	'1211' => '5',
	'1212' => '6',
	'1221' => '7',
	'1222' => '8',
	'2111' => '9',
	'2112' => '10',
	'2121' => '11',
	'2122' => '12',
	'2211' => '13',
	'2212' => '14',
	'2221' => '15',
	'2222' => '16',
);

if($fh = @fopen('data.txt','r')){
	while(FALSE !== ($line = fgets($fh))){
		$arr = unserialize($line);
	}
	fclose($fh);
	
}else{
	echo '表示するデータがありません';
    exit;
}
?>

<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name = "viewport" content = "width = 740">
<title><?php echo $arr['app_title']; ?></title>
<link rel="stylesheet" type="text/css" href="common.css">
<style type="text/css">
body{
	color:<?php echo $arr['body_txt_color']; ?>;
	background: url(images/bg_img.jpg) repeat 50% 50% <?php echo $arr['body_bg_color']; ?>;
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

<script language="JavaScript">
<!--
function nidoosi(form) {
	var elements = form.elements;
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].type == 'submit') {
			elements[i].disabled = true;
		}
	}
} 
//-->
</script>
<script language="JavaScript">
<!--
myImageCnt = 16;
myImage = new Array(
 "images/2.gif",
 "images/3.gif",
 "images/4.gif",
 "images/5.gif",
 "images/6.gif",
 "images/7.gif",
 "images/8.gif",
 "images/9.gif",
 "images/10.gif",
 "images/11.gif",
 "images/12.gif",
 "images/13.gif",
 "images/14.gif",
 "images/15.gif",
 "images/16.gif",
 "images/1.gif"
);
myNowCnt = 0;
function myChange(){
	if (myNowCnt == myImageCnt-1){myNowCnt=0;}else{myNowCnt++;}
	document.myFormImg.src = myImage[myNowCnt];
	setTimeout( "myChange()" , 300 );
}
//-->
</script>
</head>
<body>

<div class="wrap">
<h1 style="text-align:center;"><img src="images/title_img.jpg" alt="<?php echo $arr['app_title']; ?>" title="<?php echo $arr['app_title']; ?>" /></h1>

<?php
if(($_POST['flg']) == 'result'){

	$app_title = $arr['app_title'];
	$page_url = $arr['page_url'];
	$app_desc = $arr['app_desc'];
	$intro_msg = $arr['intro_msg'];
	$img_dir_path = $arr['img_dir_path'];

	$type = $coupling[$_POST['result']];
	$title = $arr['title'.$type];
	$msg = $arr['msg'.$type];
	$img = $img_dir_path . $type . '.jpg';
	$ft_msg = base64_decode($arr['ft_msg']);

	echo <<<END
	<h2><span class="small">${intro_msg}</span><br />
	「${title}」です！</h2>
	<div style="margin-bottom:10px;text-align:center;">
	<img src="images/${type}.jpg" alt="${title}" title="${title}" style="max-width:580px;" />
	</div>
	<p id="msg">${msg}</p>
	<div>${ft_msg}</div>
END;

}elseif(($_POST['flg']) == 'confirm'){

	$result = $_POST['a1'].$_POST['a2'].$_POST['a3'].$_POST['a4'];

	echo '<h2>診断中...</h2>';

	echo <<<END
	<p><img src="images/1.gif" width="250" height="187" name="myFormImg"></p>
	<script language="JavaScript"><!--
	myChange();  
	// --></script>

	<form method="post" onSubmit="return nidoosi(this)">
	<input type="submit" value="結果を見る" class="end_btn btn" />
	<input type="hidden" name="result" value="${result}" />
	<input type="hidden" name="flg" value="result" />
	</form>
	<p>※結果はウォールに投稿されます</p>
END;

}elseif(($_POST['flg']) == '4'){

	echo <<<END
	<h2>${arr['q4']}</h2>

	<form method="post">
	<input type="submit" value="${arr['a4_1']}" class="a4_1 btn" />
	<input type="hidden" name="a4" value="1" />
	<input type="hidden" name="a1" value="${_POST['a1']}" />
	<input type="hidden" name="a2" value="${_POST['a2']}" />
	<input type="hidden" name="a3" value="${_POST['a3']}" />
	<input type="hidden" name="flg" value="confirm" />
	</form>

	<form method="post">
	<input type="submit" value="${arr['a4_2']}" class="a4_2 btn" />
	<input type="hidden" name="a4" value="2" />
	<input type="hidden" name="a1" value="${_POST['a1']}" />
	<input type="hidden" name="a2" value="${_POST['a2']}" />
	<input type="hidden" name="a3" value="${_POST['a3']}" />
	<input type="hidden" name="flg" value="confirm" />
	</form>
END;

}elseif(($_POST['flg']) == '3'){

	echo <<<END
	<h2>${arr['q3']}</h2>

	<form method="post">
	<input type="submit" value="${arr['a3_1']}" class="a3_1 btn" />
	<input type="hidden" name="a3" value="1" />
	<input type="hidden" name="a1" value="${_POST['a1']}" />
	<input type="hidden" name="a2" value="${_POST['a2']}" />
	<input type="hidden" name="flg" value="4" />
	</form>

	<form method="post">
	<input type="submit" value="${arr['a3_2']}" class="a3_2 btn" />
	<input type="hidden" name="a3" value="2" />
	<input type="hidden" name="a1" value="${_POST['a1']}" />
	<input type="hidden" name="a2" value="${_POST['a2']}" />
	<input type="hidden" name="flg" value="4" />
	</form>
END;

}elseif(($_POST['flg']) == '2'){

	echo <<<END
	<h2>${arr['q2']}</h2>

	<form method="post">
	<input type="submit" value="${arr['a2_1']}" class="a2_1 btn" />
	<input type="hidden" name="a2" value="1" />
	<input type="hidden" name="a1" value="${_POST['a1']}" />
	<input type="hidden" name="flg" value="3" />
	</form>

	<form method="post">
	<input type="submit" value="${arr['a2_2']}" class="a2_2 btn" />
	<input type="hidden" name="a2" value="2" />
	<input type="hidden" name="a1" value="${_POST['a1']}" />
	<input type="hidden" name="flg" value="3" />
	</form>
END;

}elseif(($_POST['flg']) == '1'){

	echo <<<END
	<h2>${arr['q1']}</h2>

	<form method="post">
	<input type="submit" value="${arr['a1_1']}" class="a1_1 btn" />
	<input type="hidden" name="a1" value="1" />
	<input type="hidden" name="flg" value="2" />
	</form>

	<form method="post">
	<input type="submit" value="${arr['a1_2']}" class="a1_2 btn" />
	<input type="hidden" name="a1" value="2" />
	<input type="hidden" name="flg" value="2" />
	</form>
END;

}else{

	echo <<<END

	<p class="b">${arr['app_desc']}</p>
	<form method="post">
	<input type="submit" value="${arr['app_start_btn']}" class="a1_1 btn" />
	<input type="hidden" name="flg" value="1" />
	</form>

END;

}

?>
</div><!-- /.wrap -->


</body>
</html>