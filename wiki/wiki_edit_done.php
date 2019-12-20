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
<!--<p id="siteDescription">ネガティブマージン。メニュー左</p>-->
<!-- / #header --></div>

<div id="main">
<div class="inner">
<?php
  require_once('../common/common.php');

  $post = sanitize($_POST);
  try {
    $wiki_id = $post['id'];
    $wiki_title = $post['title'];
    $wiki_sentence = $post['sentence'];

    // $wiki_title = htmlspecialchars($wiki_title,ENT_QUOTES,'UTF-8');
    // $wiki_sentence = htmlspecialchars($wiki_sentence,ENT_QUOTES,'UTF-8');

    $dsn = 'mysql:dbname=wiki;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE article SET title=?,sentence=?,modified=NOW() WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $wiki_title;
    $data[] = $wiki_sentence;
    $data[] = $wiki_id;
    $stmt->execute($data);
    // echo $stmt->rowCount();
    // echo $wiki_id;

    $dbh = null;


  } catch (\Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしております。<br />';
    // var_dump($e->getMessage());
    exit();
  }

?>
<p>修正しました</p>
<a href="wiki_list.php">リストへ戻る</a>
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
  <!-- <li><a href="wiki_list.php">記事一覧</a></li> -->
<!-- <li><a href="#">原始・古代</a></li>
<li><a href="#">中世</a></li>
<li><a href="#">近世</a></li>
<li><a href="#">近代</a></li>
<li><a href="#">現代</a></li> -->
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
<!--<li><a href="#">こんにちは</a><li>-->
</ul>
<!-- / #footer --></div>
</div>
</body>
</html>
</body>
</html>