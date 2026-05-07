<?php require '../../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th><th></th></tr>
<?php

foreach ($pdo->query('select * from product') as $row) {
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>', $row['name'], '</td>';
	echo '<td>', $row['price'], '</td>';
	echo '<td>';
	echo '<a href="javascript:void(0)" onclick="deleteconfirm(', $row['id'], ')">削除</a>';
	echo '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
<?php require '../../footer.php'; ?>


  <script>
		function deleteconfirm(id){
			var fig;
			fig=confirm("削除してもいいですか?");
			if (fig){
				window.location.href = `delete-output.php?id=${id}`
				// ファイル名?IDの$〇〇
			}
		}

    
    
   </script>

