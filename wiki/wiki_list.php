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

    $sql = 'SELECT * FROM article WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    print '<h2>記事一覧</h2><br />';

  } catch (\Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    // var_dump($e->getMessage());
    exit();
  }

?>

<?php while(true): ?>
  <?php $rec = $stmt->fetch(PDO::FETCH_ASSOC);?>
  <?php if($rec == false):?>
    <?php break;?>
  <?php endif;?>
  <li><a href="wiki_detail.php?id=<?php print($rec['id']);?>"><?php print $rec['title'];?></a></li>
  <time><?php print $rec['created'];?></time>
  <hr>
  <?php print '<br />';?>
<?php endwhile;?>

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
