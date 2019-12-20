<?php
session_start();
require('../dbconnect.php');
  if(!isset($_SESSION['register'])){
    // header('Location: wlist.php');
    // exit();
    echo "失敗";
  }
  // if(empty($_POST)){echo "POSTが空です";}
  if(empty($_SESSION)){echo "SESSIONが空です";}

  if(!empty($_SESSION)){
    echo "登録完了";
    $statement = $db -> prepare('INSERT INTO weaponlist SET wname=?, wtype=?, atk=?, rare=?');

    echo $ret = $statement -> execute(array(
    // $ret = $statement->execute(array(
        $_SESSION['register']['wname'],
        $_SESSION['register']['wtype'],
        $_SESSION['register']['atk'],
        sha1($_SESSION['register']['rare']),
    ));
    unset($_SESSION['register']);

    // header('Location: wlist.php');
    // exit();
  }
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
    </header>
    <main>
      <h1>登録に失敗している可能性があります</h1>
      <a href="wlist.php">戻る</a>
    </main>
    <footer></footer>
</body>

</html>
