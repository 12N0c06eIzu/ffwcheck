<?php
require('dbconnect.php');

session_start();

$loginError = array();

if(!empty($_POST)){
  if($_POST['userid'] != '' && $_POST['password'] != ''){
    $login = $db->prepare('SELECT * FROM userlist WHERE userid=? AND password=?');
    $login->execute(array(
      $_POST['userid'],
      sha1($_POST['password'])
    ));
    $member = $login->fetch();


    if($member){
      $_SESSION['memberNo'] = $member['memberNo'];
      $_SESSION['time'] = time();

      header('Location: ./fwwcheck/wlist.php');
      exit();
    }else{
      $error['login'] = 'failed';
      $loginError['login'] = "ＩＤとパスワードを正しく入力してください。";
    }
  }else {
    $error['login'] = 'blank';
    $loginError['login'] = "ＩＤとパスワードを確認してください";
  }
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
    <h1>ＦＷ武器管理ツール</h1>
  </header>
  <main>
    <?php if(!empty($error)) :?>
      <div class="error" style="border:1px solid; width:500px; text-align:center; ">
        <?php echo '<ul>' ?>
            <?php foreach ($loginError as $message): ?>
              <?php echo '<li style="color: red;">'; ?>
                  <?php echo $message; ?>
              <?php echo '</li>'; ?>
            <?php endforeach; ?>
        <?php echo '</ul>' ?>
      </div>
    <?php  endif; ?>
    <p>ログインフォーム</p>
    <!-- <form class="" action="index.html" method="post"> -->
    <!-- <form class="" action="./fwwcheck/wlist.php" method="post"> -->
    <form class="" action="" method="post">
      <dl class="">
        <dt>
        </dt>userid<dd>
          <input type="text" name="userid" value="">
        </dd>
        <dt>password</dt>
        <dd>
          <input type="password" name="password" value="">
        </dd>
      </dl>
      <input type="submit" name="" value="ログインする">
      <a href="./account/registerAccount.php">新規作成</a>
    </form>
  </main>
  <a href="./fwwcheck/wlist.php">testURL: wlist.php</a>
  <footer></footer>
</body>

</html>
