<!_ホームページのタイトルを表示させる。_>
<title>プロフィール入力画面</title>
<!_文字化け対策_>
 <meta http-equiv="content-type" charset="utf-8">
<!_「名前」の入力フォームを作成。_>
<p>名前</p>
<form action="mission_2-2.php" method="post">
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


