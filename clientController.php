<?php
	require('ClientModel.php');

	$name = $_POST['name'];
	$name = trim(htmlspecialchars($name, ENT_NOQUOTES, "UTF-8"));

	session_start();
	// ヴァリデーションチェック
	if (empty($name)) {
		$_SESSION['msg'] = "名前を入力して下さい。";
	}elseif(mb_strlen($name) > 30) {
		$_SESSION['msg'] = "名前は30文字以内で入力して下さい。";
	}

	// エラーがあればログイン画面へ
	if (isset($_SESSION['msg'])) {
		header('Location: ./login.php');
	}else{
		$_SESSION['name'] = $name;
		header('Location: ./select_room.php');
	}
