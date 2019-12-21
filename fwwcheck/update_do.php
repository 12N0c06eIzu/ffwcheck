<?php
//DB読み込み用
require('../dbconnect.php');
$statement = $db -> prepare('UPDATE weaponlist SET wname=?, wtype=?, atk=?, rare=?, level=? WHERE wid=?');
$statement -> execute(array($_POST['wname'], $_POST['wtype'], $_POST['atk'], $_POST['rare'],  $_POST['level'], $_POST['wid']));

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
    </header>
    <main>

    </main>
    <footer></footer>
</body>

</html>
