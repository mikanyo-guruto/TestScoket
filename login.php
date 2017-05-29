<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/common/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/login/style.css">
</head>
<body>

<?php session_start(); ?>

<div class="wrap">
	<div class="user">
		<p class="message">What's your name?</p>
		<div class="msg">
			<p><?php 
			if(isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?></p>
		</div>
		<form action="./clientController.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control name" name="name">
				<input type="submit" class="btn btn-default submit" value="Login">
			</div>
		</form>
	</div>
</div>
</body>
</html>