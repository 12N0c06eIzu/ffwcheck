<?php
//DB読み込み用
//require('../dbconnect.php');

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
      <div class="">
        <h3>武器一覧</h3>
        <form class="" action="delete.php" method="post">

          <table border="1">
            <th>
              <input type="checkbox" class="allcheck"/>
            </th>
            <th>武器名</th>
            <th>希少度</th>
            <th>レベル</th>
            <th>攻撃力</th>
            <th>成長タイプ</th>
            <?php while ($weapon = $weapons->fetch()):?>
              <tr>
                <td>
                  <input type="checkbox" name="index[]" value="<?php echo $weapon['wid']; ?>">
                </td>
                <td>
                  <a href="update.php?wid=<?php print($weapon['wid']); ?>"><?php print($weapon['wname']); ?></a>
                </td>
                <td>
                  <?php print($weapon['rare']); ?>
                </td>
                <td>
                  <?php print($weapon['level']) ?>
                </td>
                <td>
                  <?php print($weapon['atk']); ?>
                </td>
                <td>
                  <?php print($weapon['wtype']); ?>
                </td>
              </tr>
            <?php endwhile; ?>
          </table>
          <input type="submit" name="" value="削除">
        </form>
      </div>
    </main>
    <footer></footer>
</body>

</html>
