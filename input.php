<?php
require '../../header.php';
?>

<div class="th0">商品番号</div>
<div class="th1">商品名</div>
<div class="th2">価格</div>
<?php
foreach ($pdo->query('select * from product') as $row) {
  echo '<form action="output.php" method="post">';
  echo '<input type="hidden" name="id" value="',$row['id'],'">';
  echo '<div class="mt0">',$row['id'],'</div>';
  echo '<div class="dt1">';
  echo '<input type="text" name="name" value="',$row['name'],'">';
  echo '</div>';
  echo '<div class="dt1">';
  echo '<input type="text" name="price" value="',$row['price'],'">';
  echo '</div>';
  echo '<div class="dt2"><input type="submit" value="更新"></div>';
  echo '</form>';
  echo "\n";
}
?>

<?php
require '../../footer.php';
?>

