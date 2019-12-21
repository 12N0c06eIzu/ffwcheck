<?php
  require('../dbconnect.php');
  echo "<p>";
  if(isset($_POST['index']) && is_array($_POST['index'])){

    foreach ($_POST['index'] as $value) {
      // code...
      echo "{$value},";
      $weapon = $db -> prepare('DELETE FROM weaponlist WHERE wid=?');
      $weapon -> execute(array($value));
    }
  }
  echo "</p>";

    header('Location: wlist.php');
    exit();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ＦＷ武器管理ツール</title>
</head>
<body>
    <header>
      <h1>削除ぺージ</h1>
    </header>
    <main>
      <a href="wlist.php">return</a>
    </main>
    <footer></footer>
</body>

</html>
