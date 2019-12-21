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
<!-- / #header --></div>
<div id="main">
<div class="inner form">
  <?php
    require_once('../common/common.php');

    $post = sanitize($_POST);
    $wiki_id = $_GET['id'];
    $wiki_title = $post['title'];
    $wiki_sentence = $post['sentence'];

    // $wiki_title = htmlspecialchars($wiki_title,ENT_QUOTES,'UTF-8');
    // $wiki_sentence = htmlspecialchars($wiki_sentence,ENT_QUOTES,'UTF-8');

    if($wiki_title == ''){
      print 'タイトル名が入力されていません<br />';
    }else {
      print '<p class="required">タイトル名</p>';
      print "<p class=\"required\">$wiki_title</p>";
      print '<br />';
    }

    if($wiki_sentence == ''){
      print '記事が入力されていません <br />';
    }else {
      print '<p class="required">記事</p>';
      print "<p style=\"font-size:15px;\">$wiki_sentence</p>";
      print '<br />';
    }
    if($wiki_title == '' || $wiki_sentence == ''){
      print '<form>';
      print '<input class="btn type="button" onclick="history.back()" value="戻る">';
      print '</form>';
    }else {
      print '<form method="post" action="wiki_edit_done.php?id='.$wiki_id.'">';
      print '<input type="hidden" name="id" value="'.$wiki_id.'">';
      print '<input type="hidden" name="title" value="'.$wiki_title.'">';
      print '<input type="hidden" name="sentence" value="'.$wiki_sentence.'">';
      print '<input class="btn" type="submit" value="編集">';
      print '<input class="btn" type="button" onclick="history.back()" value="戻る">';
      print '<br />';
    }
  ?>


<!-- / .inner --></div>
<!-- / #main --></div>

<div id="sub">
<h3>Menu</h3>
<ul>
<li><a href="wiki.php">トップページ</a></li>
<li><a href="wiki_add.php">新規作成</a></li>
<li><a href="wiki_list.php">記事一覧</a></li>
</ul>

<h3>Categories</h3>
<ul>
</ul>

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
