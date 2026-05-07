
<?php session_start(); ?>
<!-- セッション開始 -->
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php


if (isset($_SESSION['customer'])) {
// セッションにカスタマー情報があるか(ログインしているか)確認	

// ログインしているなら(情報がある)... true

	$id=$_SESSION['customer']['id'];
	// 変数idにidを代入 

	$sql=$pdo->prepare('select * from customer where id!=? and login=?');
	// 骨組みSQLの作成
	// 自分以外のIDでログイン名が同じものを探す
	// $sqlに  $pdo->prepare の結果を入れる ()は未完成のsql文

	$sql->execute([$id, $_REQUEST['login']]);
  // 未完成のSQL文の?に代入
	// ここでSQL文が完成,実行される



} else {
	// ログインしていないなら… false
	// ログインせず情報入力=新規登録

	$sql=$pdo->prepare('select * from customer where login=?');
	// 骨組みSQL
	// 同じlogin名のものがあるか探すためのSQL文

	$sql->execute([$_REQUEST['login']]);
	// 前の入力画面で入力された情報を下に代入
	// SQL文完成のため実行
}


// ここまででセッションに情報があるか(ログインの有無)
// によって2種類のうちどちらかのSPL文が実行されている

if (empty($sql->fetchAll())) {
// 前作ったSQLの結果,中身がカラかどうか判別(empty)
// カラならloginが被っていない
// 結果があるならloginが被っている

  // カラ(被っていないなら)
	// そのloginは使ってOK 次に進む

	if (isset($_SESSION['customer'])) {
		// 更新or新規の判別
		// セッションにカスタマー情報があるか

		// あるならログイン済み つまり情報変更

		$sql=$pdo->prepare(
			'update customer set name=?, address=?, '.
			'login=?, password=? where id=?');
			// データを更新するためのSQLの骨組み

		$sql->execute([
			$_REQUEST['name'], $_REQUEST['address'], 
			$_REQUEST['login'], $_REQUEST['password'], $id]);
			// 更新のために前画面で入力された値を代入

		$_SESSION['customer']=[
			'id'=>$id,
			 'name'=>$_REQUEST['name'], 
			'address'=>$_REQUEST['address'],
			 'login'=>$_REQUEST['login'], 
			'password'=>$_REQUEST['password']
			];// 更新されたのでセッションも新しくする

		echo 'お客様情報を更新しました。';
		// 更新出来たと表示。更新終了

  //セッション情報がないので つまり新規登録
	} else {

		$sql=$pdo->prepare('insert into customer values(null,?,?,?,?)');
		// データを新規登録するための骨組みSQL

		$sql->execute([
			$_REQUEST['name'], $_REQUEST['address'], 
			$_REQUEST['login'], $_REQUEST['password']]);
      // 新規登録のため 骨組みに代入

		echo 'お客様情報を登録しました。';
		// 登録できたと表示 登録終了
	}

// 被っているなら…

} else {
	echo 'ログイン名がすでに使用されていますので、変更してください。';
	// そのloginは使用不可の為警告表示
}
?>
<?php require '../footer.php'; ?>
