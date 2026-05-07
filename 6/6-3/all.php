<?php
require '../../header.php';
?>
<?php
foreach ($pdo->query('select*from product') as $row) {
  // DBから$pdoに持ってきたメソッドたちを一つ選んで$rowに入れる
  echo '<p>';
  echo $row['id'],':';
  echo $row['name'],':';
  echo $row['price'],':';
  echo '</p>';
}
?>

<?php
require '../../footer.php';
?>

<?php
echo '<table><tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>';
foreach ($pdo->query('select*from product') as $row) {
  echo '<tr><td>', $row['id'], '</td>';
  echo '<td>', $row['name'], '</td>';
  echo '<td>', $row['price'], '</td>','</tr>';
}
echo '</table>';
?>
