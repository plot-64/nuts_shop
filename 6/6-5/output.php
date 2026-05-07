<?php

use function Adminer\table;
require '../../header.php';
?>

<?php
$sql = $pdo->prepare('insert into product values(null,?,?)');
if (empty($_REQUEST['name'])) {
  echo '商品名を入力してください';
} else if (!preg_match('/^[0-9]+$/', $_REQUEST['price'])) {
  echo '価格を整数でにゅうりょくしてくれw';
}
else if ($sql->execute([htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], ])) {
  echo'追加に成功しました';}
  else {echo'追加に失敗しました';}
  ?>


<?php
require '../../footer.php';
?>

