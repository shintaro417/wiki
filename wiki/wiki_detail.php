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
<div class="inner">
<?php
  try {
    $dsn = 'mysql:dbname=wiki;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM article WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_GET['id']));
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo $rec['id'];

    $dbh = null;
  } catch (\Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしております<br />';
    // var_dump($e->getMessage());
    exit();
  }

?>
<h2><?php print $rec['title'];?></h2>
<p>投稿：<?php print $rec['created'];?></p>
<p>編集：<?php print $rec['modified'];?></p>
  <p style="font-size:15px;"><?php print $rec['sentence'];?></p>

  <form method="post">
    <input type="hidden" name="id" value="<?php print $rec['id'];?>">
    <input type="hidden" name="title" value="<?php print $rec['title'];?>">
    <input type="hidden" name="sentence" value="<?php print $rec['sentence'];?>">
    <input class="btn" type="submit" name="edit" value="編集" formaction="wiki_edit.php?id=<?php print $rec['id'];?>">
    <input class="btn" type="submit" name="delete" value="削除" formaction="wiki_delete.php?id=<?php print $rec['id'];?>">
    <input class="btn" type="button" onclick="history.back()" value="戻る">
  </from>

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

