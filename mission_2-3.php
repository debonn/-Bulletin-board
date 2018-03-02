<!_ホームページのタイトルを表示させる。_>
<title>プロフィール入力画面</title>
<!_文字化け対策_>
 <meta http-equiv="content-type" charset="utf-8">
<!_「名前」の入力フォームを作成。_>
<p>名前</p>
<form method="post">
<!_テキストボックスを作成した。_>
<input type = "text" name = "name">

<!_「コメント」の入力フォームを作成。_>
<p>コメント</p>

<!_テキストボックスを作成した。_>
<input type = "text" name = "comment">

<!_パスワードの入力フォームを作成した。_>
<p>パスワード</p>
<p>(8文字以上で、英子文字、英大文字、数字を各一文字以上含むこと)</p>
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
//一旦、変数としてpasswordを保存する。
$PASS = $_REQUEST['password'];


//mission_2-2.phpで使う文字列の結合とカウントを行う。

//全ての入力フォームに入力されたときのみ、処理を行う。
//ただし、0と入力してしまうと、未入力と判定されてしまう。
if ( !empty($_REQUEST['name']) && !empty($_REQUEST['comment']) && !empty($_REQUEST['password'])) {
//countの処理
$filename2 = 'mission_2-2-2.txt';
//mission_2-2-2.txtの内部が空であった場合とそうでない時の場合分け。
if (file_exists($filename2)) {
	$fp2 = fopen($filename2,'a');
	fwrite($fp2, "1,");
	$file = file_get_contents("mission_2-2-2.txt");
//echo $file;
	$data = explode(",", $file);
	fclose($fp2);
//$cntが今回書き込んだコメントの番号になる。
	$cnt = count($data) -1;
	} else {
	$fp2 = fopen($filename2,'w');
	fwrite($fp2, "1,");
	$file = file_get_contents("mission_2-2-2.txt");
	$data = explode(",", $file);
	fclose($fp2);
	$cnt = count($data) - 1;

	}
//print_r($data);
//日時の設定を行う。
date_default_timezone_set('Japan');
//テキストボックスに入力された文字列の結合を行う。
$Mojiretu = $cnt. "<>". $NAME ."<>" .$COMMENT ."<>". date('Y/m/d H:i:s');
//入力先のテキストファイル名はmission_2-2-1.txtとする。
$filename = 'mission_2-2-1.txt';
//mission_2-2-1.txtの内部が空であった場合とそうでない時の場合分け。
if (file_exists($filename)) {
	$fp = fopen($filename,'a');
	fwrite($fp,$Mojiretu ."\n");
	fclose($fp);
	} else  {
	$fp = fopen($filename,'w');
	fwrite($fp, $Mojiretu ."\n");
	$file = file_get_contents("mission_2-2-1.txt");
	fclose($fp);
	}

//パスワードを別のテキストファイルで保存する。

$filename3 = 'mission_2-2-3.txt';
//mission_2-2-2.txtの内部が空であった場合とそうでない時の場合分け。
if (file_exists($filename3)) {
	$fp3 = fopen($filename3,'a');
	fwrite($fp3, $PASS."\n");
	fclose($fp3);
	} else {
	$fp3 = fopen($filename3,'w');
	fwrite($fp3, $PASS."\n");
	fclose($fp3);

	}
} else {
echo "入力が不十分です。";
echo "<br>";
}
?>


<?php
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