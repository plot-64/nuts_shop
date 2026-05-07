<!-- ヘッダー&メニュー -->

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<!-- 検索フォーム -->

<form action="product.php" method="get">
商品検索
<input type="text" name="keyword">
<!-- 検索ボックス -->
<input type="submit" value="検索">
<!-- 検索ボタン -->
</form>
<hr>

<!-- テーブル -->
<?php
echo '<table>';
echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>';

if (isset($_REQUEST['keyword'])) {
	// もしキーワードきていたら
	$sql=$pdo->prepare('SELECT * FROM product WHERE name LIKE ?');
	// データベースから検索のSQL文 骨組み
	$sql->execute(['%'.$_REQUEST['keyword'].'%']);
	// キーワードは部分一致と設定,実行
} else {
	$sql=$pdo->query('SELECT * FROM product');
	// リクエストがないなら,データベースすべてをだしといて～
}

// SQL実行,結果を取得,取得結果をもとに画面へ

foreach ($sql as $row) {
	// 実行結果(sql)を1行ずつループしながら変数rowに取り出して
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>';
	echo '<a href="detail.php?id=', $row['id'], '">', $row['name'], '</a>';
	echo '</td>';
	echo '<td>', $row['price'], '</td>';
	echo '</tr>';
	// 取り出した中身を画面に表示
}
echo '</table>';
?>
<?php require '../footer.php'; ?>
