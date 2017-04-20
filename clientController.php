<?php
	require('ClientModel.php');

	$_id = "test";
	$_pw = "1231";

	$id = $_POST['id'];
	$pw = $_POST['pass'];

	if(testLogin($id, $pw)) {
		session_start();
		$_SESSION['user_name'] = $id;
		header('Location: ./client.view.php');
		exit;
	}else{
		header('Location: ./signin.php');
		exit;
	}
