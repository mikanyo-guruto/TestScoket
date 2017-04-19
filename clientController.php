<?php
	require('ClientModel.php');

	$_id = "test";
	$_pw = "1231";


	$id = $_POST['id'];
	$pw = $_POST['pass'];

	if(testLogin($id, $pw)) {
		header('Location: ./client.html');
		exit;
	}else{
		header('Location: ./signin.php');
		exit;
	}
