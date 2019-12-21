<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="wiki.css">
  <title>Wiki</title>
</head>
<body id="index">
 <div class="bkRGBA">
 <div id="header">
   <h1>wiki</h1>
　</div>

<div id="main">
<div class="inner form">
  <h2>新規作成</h2>
<form method="post" action="wiki_add_check.php">
      <dt><span class="required">タイトル名</span></dt>
      <dd><input type="text" name="title" class="title"></dd>
      <dt><span class="required">記事</span></dt>
      <dd><textarea  name="sentence" class="article"></textarea></dd>
      <input type="submit" value="作成" class="btn">
      <input class="btn" type="button" onclick="history.back()" value="戻る">
</form>
<!-- / .inner --></div>
<!-- / #main --></div>

<div id="sub">
<h3>Menu</h3>
<ul>
<li><a href="wiki.php">トップページ</a></li>
<li><a href="wiki_add.php">新規作成</a></li>
<li><a href="wiki_list.php">記事一覧</a></li>
</ul>

<!-- <h3>Categories</h3>
<ul>
</ul> -->

<!--<h3>Archives</h3>-->
<!--
<ul>
<li><a href="#">2019年11月</a></li>
<li><a href="#">2019年10月</a></li>
<li><a href="#">2019年9月</a></li>
<li><a href="#">2019年8月</a></li>
<li><a href="#">2019年7月</a></li>
</ul>
-->

<!-- / #sub --></div>

<div id="footer">
<ul>
<li class="utilityHome"><a href="wiki.php">HOME</a></li>
</ul>
<!-- / #footer --></div>
</div>
</body>
</html>
