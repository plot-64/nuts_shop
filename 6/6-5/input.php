<?php
require '../../header.php';
?>

<p>商品追加</p>
<form action="output.php" method="post">
  <p>商品名<input type="text" name="name"></p>
  <p>価格<input type="text" name="price"></p>
  <input type="submit" value="追加">
</form>

<?php
require '../../footer.php';
?>
