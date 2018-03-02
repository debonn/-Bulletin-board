 <meta http-equiv="content-type" charset="utf-8">
<!_「削除番号指定用」の入力フォームを作成。_>
<p>削除対象番号</p>
<form method="post">
<!_テキストボックスを作成した。_>
<input type = "text" name = "erase">
<input type="submit" value="送信">
</form>

<?php
//2－3までの掲示板に、削除機能を付ける。指定された番号のみを消去するようにする。

//POST送信にて、削除番号を送信する。その際にif文でaの削除項目から値が送信された場合のみに分岐させる。
$ERASE = $_REQUEST['erase'] - 1;
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