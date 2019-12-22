<?php
//DB読み込み用
function createSelectBoxModList($box){

  $i = 1;
  echo "<tr>";
  while($i <= $box){
    require('../dbconnect.php');
    $sql = 'SELECT * FROM modular';
    $moddata = $db->query($sql);

    $No = 1;

    if($i == 5 || $i == 9){
      echo "</tr><tr>";
    }
    echo "<td class='hidebox".$i."'>"."<select class='modselect' name=boxNo". $i .">";
    foreach ($moddata as $val) {
      // code...
      $moddataa = "<option value='" . $val['modid'] .
      "'>" . $val['mod'] . "</option>";
      echo $moddataa;
    }
    echo "</select>"."</td>";
    $i++;
  }
  echo "</tr>";
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

  <div class="">
    <form  action="delete.php" method="post">

      <table class="modTable" border="1">
        <tr>
          <th colspan="4">モジュラー</th>
        </tr>

        <?php echo createSelectBoxModList(12); ?>


      </table>
    </form>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    <script type="text/javascript">
    $(function(){
      $('.hidebox').hide();
    });

    function createMod(){
      let i = 12;
      // let gene = $('#rare').val();
      // console.log(gene);
      // const boxMax = 12;
      // while (i <= boxMax) {
      //   $('.hidebox'+i).hide();
      //   i++;
      // }
      // i++;
      // while (i <= gene) {
      //   $('.hidebox'+gene).show();
      //   i++;
      let maxBox = 12;
      let gene = $('#rare').val();
      let deleteBox = 0;
      if(gene == 8){
        deleteBox = 0;
      }else if(gene == 7) {
        deleteBox = 10;
      }else if(gene == 6){
        deleteBox = 8;
      }else {
        deleteBox = gene;
        deleteBox++;
        console.log(deleteBox);
      }

      // while () {      }
      while (i > deleteBox) {
        $('.hidebox'+i).hide();
        i--;
      }

    };


    </script>
  </body>

  </html>
