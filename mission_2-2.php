<?php
//一旦、変数としてnameを格納する。
$NAME = $_REQUEST['name'];
//echo $NAME;
//一旦、変数としてcommentを格納する。
$COMMENT = $_REQUEST['comment'];
//echo $COMMENT;
//一旦、変数としてpasswordを保存する。
$PASS = $_REQUEST['password'];
?>

<!_mission_2-2.phpで使う文字列の結合とカウントを行う。_>
<?php
//countの処理
$filename2 = 'mission_2-2-2.txt';
//全ての入力フォームに入力されたときのみ、処理を行う。
//ただし、0と入力してしまうと、未入力と判定されてしまう。
if ( !empty($_REQUEST['name']) && !empty($_REQUEST['comment']) && !empty($_REQUEST['password'])) {

//mission_2-2-2.txtの内部が空であった場合とそうでない時の場合分け。
if (file_exists($filename2)) {
	$fp2 = fopen($filename2,'a');
	fwrite($fp2, "1,");
	$file = file_get_contents("mission_2-2-2.txt");
//echo $file;
	$data = explode(",", $file);
	fclose($fp2);
	$cnt = count($data);
	$cnt = $cnt -1;
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
//$filename = 'mission_2-2-1.txt';
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


//countの処理
$filename3 = 'mission_2-2-3.txt';

//mission_2-2-2.txtの内部が空であった場合とそうでない時の場合分け。
if (file_exists($filename3)) {
	$fp3 = fopen($filename3,'a');
	fwrite($fp3, $PASS ."\n");
	fclose($fp3);
	} else {
	$fp3 = fopen($filename3,'w');
	fwrite($fp3, $PASS ."\n");
	fclose($fp3);

	}
} else {
//三つのフォームのどれかが未入力の場合
echo "入力が不十分です。";
}
?>
