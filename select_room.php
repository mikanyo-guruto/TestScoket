<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/common/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/select_room/style.css">
	<?php
		require_once( __DIR__ . './controller/roomController.php');
		session_start();
	?>
</head>
<body>
<div class="wrap">
	<div class="header">
		<nav class="navbar navbar-default">
			<p class="title">Select Room</p>
			<ul class="nav navbar-nav navbar-right">
				<li><p class="name">Hello <?php echo $_SESSION['name']; ?></p></li>
				<li><button class="btn btn-warning" onclick="location.href='./controller/logoutController.php'">Logout</button></li>
			</ul>
		</nav>
	</div>

	<?php if (isset($_SESSION['msg'])) { ?>
	<div class="message">
		<p class="alert alert-danger message">Message Field</p>
	</div>
	<?php } ?>

	<!-- room_crate -->
	<div class="create_room">
		<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Create Room</button>
	</div>

	<div class="modal fade" id="myModal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<h2 class="title">Create Room</h2>
	    	<form action="" method="post">
	    		<input type="text" class="form-control room_title" name="roon_title">
	    		<input type="submit" class="btn btn-success" name="Create" value="Create">
	    		<button type="button" class="btn btn-danger" data-dismiss="modal" href="#">Cancel</button>
	    	</form>
	    </div>
	  </div>
	</div>
	<!-- END room_crate -->

	<div class="list_room">
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Peaple</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Room Title</td>
					<td>2</td>
					<td><button class="btn btn-primary" onclick="location.href='./chat_room.php'">Join</button></td>
				</tr>
				<tr>
					<td>Room Title</td>
					<td>2</td>
					<td><button class="btn btn-primary">Join</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>