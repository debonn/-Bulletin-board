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
<input type="submit" value="送信">
</form>

<?php
//一旦、変数としてnameを格納する。
$NAME = $_REQUEST['name'];
//echo $NAME;
//一旦、変数としてcommentを格納する。
$COMMENT = $_REQUEST['comment'];
//echo $COMMENT;
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

//POST送信にて、編集番号を送信する。その際にif文でaの編集項目から値が送信された場合のみに分岐させる。
$EDIT = $_REQUEST['edit'] - 1;
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