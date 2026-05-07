<?php
require '../../header.php';
?>
<?php
foreach ($pdo->query('select * from product') as $row) {
  echo '<p>';
  echo $row['id'],':';
  echo $row['name'],':';
  echo '</p>';
}
?>

<?php
require '../../footer.php';
?>