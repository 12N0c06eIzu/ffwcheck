<?php
session_start();
require('../dbconnect.php');


$weapons = $db->query('SELECT * FROM weaponlist ORDER BY wid DESC');

  if(isset($_POST["weaponregister"])){
    $_SESSION['register'] = $_POST;
    header('Location: weaponRegistration.php');
    exti();
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
    <h1>武器倉庫</h1>
  </header>
  <main>
    <div class="">
      <!-- <form class="" action="weaponRegistration.php" method="post" enctype="multipart/form-data"> -->
      <form class="" action="" method="post" enctype="multipart/form-data">
        <table border="1">
          <th>武器名</th>
          <th>攻撃力</th>
          <th>成長タイプ</th>
          <th>希少度</th>
          <tr>
            <td>
              <select class="wnameselect" id="wnameselect" style="width:130px"  name="wname">
              </select>
            </td>
            <td>
              <input type="text" value="100"  name="atk">

            </td>
            <td>
              <select class="" name="wtype">
                <option value="">晩成</option>
                <option value="">変則</option>
                <option value="">平坦</option>
                <option value="">早熟</option>
              </select>
            </td>
            <td>
              <input type="number" min="1" max="8" value="8"  name="rare">
            </td>
          </tr>
        </table>
        <div class="">
          <input type="submit" name="weaponregister" value="武器登録">
        </div>
      </form>
    </div>
    <div class="">
      <h3>登録済み武器</h3>
      <table border="1">
        <th>武器名</th>
        <th>攻撃力</th>
        <th>成長タイプ</th>
        <th>希少度</th>
        <?php while ($weapon = $weapons->fetch()):?>
          <tr>
            <td>
              <a href="#"><?php print($weapon['wname']); ?></a>
            </td>
            <td>
              <?php print($weapon['atk']); ?>
            </td>
            <td>
              <?php print($weapon['wtype']); ?>
            </td>
            <td>
              <?php print($weapon['rare']); ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
  </main>
  <footer></footer>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

  <script type="text/javascript">
  $(function(){
    $('.wnameselect').select2();
    createSelectBox(weaponList, "wnameselect");

  });
</script>
<script src="../js/list.js"></script>
<script src="../js/selectBoxGeneration.js"></script>
<script type="text/javascript">
  // createSelectBox(weaponList, wnameselect);
</script>
</body>

</html>
