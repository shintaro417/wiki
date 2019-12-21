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

    // if(isset($_GET['id']) && is_numeric($_GET['id'])){

      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($_POST['id']));
      // echo $_POST['id'];
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    $dbh = null;
  } catch (\Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしております<br />';
    // var_dump($e->getMessage());
    exit();
  }

?>
<h3>本当に削除していいですか？</h3>
<form method="post" action="wiki_delete_done.php?id=<?php print $_POST['id'];?>">
  <input type="submit" value="OK" class="btn">
  <input class="btn" type="btton" onclick="history.back()" value="戻る">
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
