<?php
  try{
    $db = new PDO('mysql:dbname=fwwcheck;host=127.0.0.1;charset=utf8', 'root', '');
    // $db = new PDO('mysql:dbname=fwwcheck;host=localhost;charset=utf8', 'root', '');
  }  catch(PDOExeption $e){
    echo 'DB接続エラー' . $e -> getMessage();
  }
?>
