<?php session_start(); ?>
<?php
require '../header.php';
require 'menu.php';
?>

<?php
unset($_SESSION['customer']);
// unsetは値をnullにする
$sql = $pdo->prepare('select * from customer where login=? and password=?');
$sql->execute ([$_REQUEST['login'],$_REQUEST['password']]);
foreach ($sql as $row) {
  $_SESSION['customer']=[
    'id'=>      (int)$row['id'],
    'name'=> (string)$row['name'],
    'address'=>      $row['address'],
    'login'=>        $row['login'],
    'password'=>     $row['password']];}
  if (isset($_SESSION['customer'])) {
    echo'いらっしゃいませ',$_SESSION['customer']['name'],'さん。';}
    else {echo'ログイン名またはパスワードが違います';}
    ?>

<?php
require '../footer.php';
?>

