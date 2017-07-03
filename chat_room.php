<!DOCTYPE html> 
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="./css/common/bootstrap.min.css">
<!-- なんかstyle.cssだとバグってる？ -->
<link rel="stylesheet" type="text/css" href="./css/chat_room/stylesheet.css">
</head>
<body>
  <?php
    session_start();
    $name = $_SESSION['name'];
  ?>
<div class="wrap">

	<div class="header">
		<nav class="navbar navbar-default">
			<p class="title">Select Room</p>
			<ul class="nav navbar-nav navbar-right">
				<li><p class="name">Hello <?php echo $_SESSION['name']; ?></p></li>
				<li><button class="btn btn-warning" onclick="location.href='./select_room.php'">RoomOut</button></li>
			</ul>
		</nav>
	</div>

	<div class="msg_main">
		<div class="msg_list">
  			<table id="msg_list"></table>
  		</div>

  		<form action="" method="post" class="form-inline form" onsubmit="return false;">
		    <input type="text" class="form-control text" id="message"/>
		    <input type="hidden" id="test" value="1">
		    <input type="submit" class="form-control button" id="send" value="send" />
  		</form>
  	</div>

</div>

</body>

<script type="text/javascript" src="./jquery-3.2.1.min.js"></script>
<!-- socket.ioのクラインアントライブラリを取得 -->  
<script src="./node_modules/socket.io-client/dist/socket.io.js"></script>
<script src="./socket/client.js"></script>
</html>