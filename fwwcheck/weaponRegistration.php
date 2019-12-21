<?php
session_start();
require('../dbconnect.php');


if(isset($_SESSION['memberNo']) && $_SESSION['time'] + 3600  > time()){
  $_SESSION['time'] = time();

  $members = $db->prepare('SELECT * FROM userlist WHERE memberNo=?');
  $members -> execute(array($_SESSION['memberNo']));
  $member = $members->fetch();
}else {
  header('Location: ../index.php');
  exit();
}


if(!isset($_SESSION['register'])){
  // header('Location: wlist.php');
  // exit();
  echo "失敗";
}
// if(empty($_POST)){echo "POSTが空です";}
if(empty($_SESSION)){echo "SESSIONが空です";}

if(!empty($_SESSION)){
  echo "登録完了";
  echo $member['memberNo'];
  $statement = $db -> prepare('INSERT INTO weaponlist SET wname=?, wtype=?, atk=?, rare=? ,weaponOwner=?, level=?');

  echo $ret = $statement -> execute(array(
    // $ret = $statement->execute(array(
    $_SESSION['register']['wname'],
    $_SESSION['register']['wtype'],
    $_SESSION['register']['atk'],
    $_SESSION['register']['rare'],
    $member['memberNo'],
    $_SESSION['register']['level']
  ));
  unset($_SESSION['register']);

  header('Location: wlist.php');
  exit();
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
