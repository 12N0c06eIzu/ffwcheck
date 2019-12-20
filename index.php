<?php
    session_start();

    if (!empty($_POST)) {
        if ($_POST['email'] == '') {
            $error['email'] == 'blank';
        }
        if ($_POST['userid'] == '') {
            $error['userid'] == 'blank';
        }
        if ($_POST['username'] == '') {
            $error['username'] == 'blank';
        }
        if ($_POST['password'] == '') {
            $error['password'] == 'blank';
        }
        if (strlen($_POST['password']) < 4) {
            $error['password'] == 'blank';
        }

        if (empty($error)) {
            $_SESSION['join'] = $_POST;
            header('Location: check.php');
            exit();
        }

        if(empty($error)){
            $member = $db->prepare('SELECT COUNT(*) AS cnt FROM userlist WHERE email=?');
            $member->execute(array($_POST['email']));
            $record = $member->fetch();
            if($record['cnt'] > 0){
                $error['email'] = 'duplicate';
            }
        }
    }


    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite'){
        $_POST = $_SESSION['join'];
        $error['rewrite'] = true;
     }
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ＦＷ武器管理ツール</title>
    <style>
        form{
            width: 300px;
            border: 1px solid;
        }
        dl{
            padding: 10px;
        }
        div{
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>ＦＷ武器管理ツール</h1>
    </header>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <dl>
                <dt>
                    email
                </dt>
                <dd>
                    <input
                    type="text"
                    name="email"
                    id="email"
                    value="<?php if(!empty($_POST['email'])){
                        echo htmlspecialchars($_POST['email'], ENT_QUOTES);
                    } ?>"
                    required
                    >

                    <?php if (isset($error['email']) && $error['email'] == 'blank'):?>
                    <p class="error">入力が正しくありません</p>
                    <?php endif;?>
                </dd>
                <dt>
                    userid
                </dt>
                <dd>
                    <input
                    type="text"
                    name="userid"
                    id="userid"
                    value="<?php if(!empty($_POST['userid'])){
                        echo htmlspecialchars($_POST['userid'], ENT_QUOTES);
                    }?>"
                    required
                    >
                    <?php if (isset($error['userid']) && $error['userid'] == 'blank'):?>
                    <p class="error">入力が正しくありません</p>
                    <?php endif;?>
                </dd>
                <dt>
                    username
                </dt>
                <dd>
                    <input type="text" name="username" id="username" value="<?php if(!empty($_POST['username'])){
                        echo htmlspecialchars($_POST['username'], ENT_QUOTES);
                    }?>"
                    required
                    >
                    <?php if (isset($error['username']) && $error['username'] == 'blank'):?>
                    <p class="error">入力が正しくありません</p>
                    <?php endif;?>
                </dd>
                <dt>
                    password
                </dt>
                <dd>
                    <input type="password" name="password" id="password" value="<?php if(!empty($_POST['password'])){
                        echo htmlspecialchars($_POST['password'], ENT_QUOTES);
                    }?>"
                    required
                    >
                    <?php if (isset($error['password']) && $error['password'] == 'blank'):?>
                    <p class="error">入力が正しくありません</p>
                    <?php endif;?>
                    <?php if (isset($error['password']) && $error['password'] == 'length'):?>
                    <p class="error">4文字以上で入力して下さい</p>
                    <?php endif;?>
                </dd>
            </dl>
            <div>
                <button type="submit">入力内容を確認する</button>
            </div>
        </form>
    </main>
    <footer></footer>
</body>

</html>
