<?php
    session_start();
    require('./dbconnect.php');

    if (!isset($_SESSION['join'])) {
        header('Location: index.php');
        exit();
    }

    if(!empty($_POST)){
        $statement = $db -> prepare('INSERT INTO userlist SET userid=?, email=?, username=?, password=?, created=NOW()');

        echo $ret = $statement -> execute(array(
        // $ret = $statement->execute(array(
            $_SESSION['join']['email'],
            $_SESSION['join']['userid'],
            $_SESSION['join']['username'],
            sha1($_SESSION['join']['password']),
        ));
        unset($_SESSION['join']);
        
        header('Location: thanks.php');
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
        <form action="" method="post">
            <input type="hidden" name="action" value="submit">
            <dl>
                <dt>EMAIL</dt>
                <dd>
                <?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?>
                </dd>
                <dt>ユーザーＩＤ</dt>
                <dd>
                <?php echo htmlspecialchars($_SESSION['join']['userid'], ENT_QUOTES); ?>
                </dd>
                <dt>ユーザー名</dt>
                <dd>
                <?php echo htmlspecialchars($_SESSION['join']['username'], ENT_QUOTES); ?>
                </dd>
                <dt>パスワード</dt>
                <dd>【非表示】</dd>
            </dl>
            <div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a>|<input type="submit" value="登録する"></div>
        </form>
    </main>
    <footer></footer>
</body>

</html>