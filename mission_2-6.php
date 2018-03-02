<meta http-equiv="content-type" charset="utf-8">
<!_ホームページのタイトルを表示させる。_>
<title>プロフィール入力画面</title>

<!_「名前」の入力フォームを作成。_>
<p>名前</p>
<form method="post">
<!_テキストボックスを作成した。_>
<input type = "text" name = "name">

<!_「コメント」の入力フォームを作成。_>
<p>コメント</p>

<!_テキストボックスを作成した。_>
<input type = "text" name = "comment">

<!_「編集対象番号」の入力フォームを作成。_>
<p>編集対象番号</p>
<!_テキストボックスを作成した。_>
<input type = "text" name = "edit">

<!_「パスワード」の入力フォームを作成。_>
<p>設定したパスワード</p>
<!_テキストボックスを作成した。_>
<input type = "text" name = "password">
<input type="submit" value="送信">
</form>

<?php
//一旦、変数としてnameを格納する。
$NAME = $_REQUEST['name'];
//echo $NAME;
//一旦、変数としてcommentを格納する。
$COMMENT = $_REQUEST['comment'];
//echo $COMMENT;
//一旦、変数としてパスワードを格納する。
$PASS = $_REQUEST['password'];
//一旦、変数として編集対象番号を入力する。
$EDIT = $_REQUEST['edit'];
?>

<?php
//コメントの番号を定義する。
	$file = file_get_contents("mission_2-2-2.txt");
//echo $file;
	$data = explode(",", $file);
	$cnt = count($data) - 1;
//print_r($data);
//日時の設定を行う。
date_default_timezone_set('Japan');

?>



<?php
//2－3までの掲示板に、編集機能を付ける。指定された番号のみを新しいコメントを上書き保存するようにする。


$filepass = file("mission_2-2-3.txt");
//POST送信にて、編集番号を送信する。その際にif文でaの編集項目から値が送信された場合のみに分岐させる。
$EDIT = $EDIT - 1;
//mission_2-2-3.txtに保存されているパスワードと入力されたパスワードを比較する。
if ( $filepass[$EDIT]==$_REQUEST['password']."\n" ) {
//編集対象番号は整数でなければならないため、入力が整数の場合のみTrueを返す。
if (gettype($EDIT)==integer) {
//2-2で作成されたファイル、mission_2-2-2.txtから投稿番号を取得する。
$file = file("mission_2-2-1.txt");
//テキストファイルに保存されていた各投稿番号と、POSTで送信された編集番号を比較し、
//イコールでない場合のみ、テキストファイルに上書き保存を行う。
$i = 0;
foreach ($file as $key => $value) {
//$dは画面で表示される番号のために使用する変数である。
	$d = $i + 1;
	if ($key==$EDIT) {
//	echo $file[$i];
	$file[$i] = $d . "<>". $NAME ."<>" .$COMMENT ."<>". date('Y/m/d H:i:s')."\n";
	}
	$filename = 'mission_2-2-1.txt';
	if ($i == 0) {
	$fp = fopen($filename,'w');
	fwrite($fp, $file[$i]);
	fclose($fp);
	} else {
	$fp = fopen($filename,'a');
	fwrite($fp,$file[$i]);
	fclose($fp);
	}
	$i = $i + 1;
}
}


//ファイルの変数を格納
$filename = 'mission_2-2-1.txt';
//ファイルの中身を配列に格納
$line = file($filename);

//ファイルの中身をブラウザ上に表示する。
//foreach ($line as $value) {
//echo $value;
//echo "<br>";
//}
} elseif ( $filepass[$EDIT]!=$_REQUEST['password']."\n" ) {
//echo $filepass[$EDIT];
//echo $_REQUEST['password']."\n";
//echo "パスワードが間違っています。";
}

?>


 <meta http-equiv="content-type" charset="utf-8">
<!_「削除番号指定用」の入力フォームを作成。_>
<p>削除対象番号</p>
<form method="post">
<!_テキストボックスを作成した。_>
<input type = "text" name = "erase">

<!_「パスワード」の入力フォームを作成。_>
<p>設定したパスワード</p>
<!_テキストボックスを作成した。_>
<input type = "text" name = "password2">
<input type="submit" value="送信">
</form>

<?php
//2－3までの掲示板に、削除機能を付ける。指定された番号のみを消去するようにする。
$filepass2 = file("mission_2-2-3.txt");
//削除対象番号を$ERASEに格納する。
$ERASE = $_REQUEST['erase'] - 1;
//削除するコメントのパスワードを$PASS2に格納する。
$PASS2 = $_REQUEST['password2'];

//POST送信にて、削除番号を送信する。その際にif文でaの削除項目から値が送信された場合のみに分岐させる。
if ( $filepass2[$ERASE]==$PASS2."\n" ) {
//削除対象番号は整数でなければならない。
if (gettype($ERASE)==integer) {
//2-2で作成されたファイル、mission_2-2-2.txtから投稿番号を取得する。
$file = file("mission_2-2-1.txt");
//テキストファイルに保存されていた各投稿番号と、POSTで送信された削除番号を比較し、
//イコールでない場合のみ、テキストファイルに上書き保存を行う。
$i = 0;
foreach ($file as $key => $value) {

	if ($key==$ERASE) {
//	echo $file[$i];
	$file[$i] = 'コメントは削除されました。'."\n";
	}
	$filename = 'mission_2-2-1.txt';
	if ($i == 0) {
	$fp = fopen($filename,'w');
	fwrite($fp, $file[$i]);
	fclose($fp);
	} else {
	$fp = fopen($filename,'a');
	fwrite($fp,$file[$i]);
	fclose($fp);
	}
	$i = $i + 1;
}
}
} elseif ( $filepass2[$ERASE]!=$PASS2."\n" ) {
//echo "設定したパスワードが間違っています。<br>";
}

//ファイルの変数を格納
$filename = 'mission_2-2-1.txt';
//ファイルの中身を配列に格納
$line = file($filename);

//ファイルの中身をブラウザ上に表示する。
foreach ($line as $value) {
echo $value;
echo "<br>";
}

?>