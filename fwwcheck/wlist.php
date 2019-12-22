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

$weapons = $db->prepare("SELECT * FROM weaponlist WHERE weaponOwner=?");
$weapons -> execute(array($_SESSION['memberNo']));
if(isset($_POST["weaponregister"])){
  $_SESSION['register'] = $_POST;
  header('Location: weaponRegistration.php');
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
    <h1>武器倉庫</h1>
    <p><?php echo "おはようございます。".htmlspecialchars($member['username'], ENT_QUOTES)."さん"; ?></p>
  </header>
  <main>
    <div class="">
      <form class="" action="" method="post" enctype="multipart/form-data">
        <table border="1">
          <th>武器名</th>
          <th>レベル</th>
          <th>攻撃力</th>
          <th>成長タイプ</th>
          <th>希少度</th>
          <tr>
            <td>
              <select class="wnameselect" id="wnameselect" style="width:130px"  name="wname">
              </select>
            </td>
            <td>
              <input type="number" min="1" max="10" value="3" name="level">
            </td>
            <td>
              <input type="text" value="100"  name="atk">

            </td>
            <td>
              <select class="" name="wtype">
                <option value="晩成">晩成</option>
                <option value="変則">変則</option>
                <option value="平坦">平坦</option>
                <option value="早熟">早熟</option>
              </select>
            </td>
            <td>
              <input id="rare" type="number" min="1" max="8" value="8"  name="rare" onchange="createMod();">
            </td>
          </tr>
        </table>
        <?php require('./mod.php'); ?>
        <div class="">
          <input type="submit" name="weaponregister" value="武器登録">
        </div>
      </form>
    </div>

  <?php require('./list.php'); ?>
  </main>
  <footer></footer>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

  <script type="text/javascript">
  $(function(){
    $('.wnameselect').select2();
    createSelectBox(weaponList, "wnameselect");
    $('.modselect').select2();
    
    let check = '.allcheck';
    let box = 'input[name="index[]"]';
    $(check).click(function(){
      $(box).prop("checked", $(this).is(':checked'));
    });

    $(box).on('click', function(){
      let boxCount = $(box).length;
      let checked = $(box + ':checked').length;
      if(checked === boxCount){
        $(check).prop('checked', true);
      }else {
        $(check).prop('checked', false);
      }
    });
  });

</script>
<script src="../js/list.js"></script>
<script src="../js/selectBoxGeneration.js"></script>
<script type="text/javascript">
</script>
</body>

</html>
