<?php
	$user = "root";
	$pass = "";

	function testLogin($id, $pw) {
		try{
			$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

			$query = 'SELECT * FROM users WHERE id';
			$result = $dbh->query($query);
			if($result === $id) {
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e) {
			echo $e->getMessage();
			die();
		}
	}
