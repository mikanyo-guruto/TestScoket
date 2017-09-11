<!DOCTYPE html> 
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="./css/common/bootstrap.min.css">
<!-- なんかstyle.cssだとバグってる？ -->
<link rel="stylesheet" type="text/css" href="./css/chat_room/style.css">
</head>
<body>
  <?php
    session_start();
  ?>
<div class="wrap">

	<div class="header">
		<nav class="navbar navbar-default">
			<p class="title">Chat Room</p>
			<ul class="nav navbar-nav navbar-right">
				<li><p class="name">Hello <?php echo $_SESSION['name']; ?></p></li>
				<li><button class="btn btn-warning" onclick="location.href='./controller/logoutController.php'">Logout</button></li>
			</ul>
		</nav>
	</div>

	<div class="msg_main">
		<div class="msg_list">
  			<table id="table_msg_list"></table>
  		</div>

  		<form action="" method="post" class="form-inline form" onsubmit="return false;">
  		<!--
		    <input type="text" class="form-control text" id="message"/>
		    <input type="hidden" id="test" value="1">
		    <input type="submit" class="form-control button" id="send" value="send" />
		-->
  		</form>

  		<div class="chat_area">
  			<input type="text" class="form-control text" id="message"/>
  			<button class="form-control button" id="send" onclick="publishMessage();">send</button>
  		</div>
  	</div>

</div>

</body>

<script type="text/javascript" src="./jquery-3.2.1.min.js"></script>
<!-- socket.ioのクラインアントライブラリを取得 -->  
<script src="./node_modules/socket.io-client/dist/socket.io.js"></script>
<script type="text/javascript" src="./socket/client.js"></script>
<script type="text/javascript">
	//接続
	var url = "localhost:8080";
	var socket = io.connect(url);
	var name = "<?php echo $_SESSION['name']; ?>";

	socket.on("sendMessageToClient", function() {});

	//
	function start(name) {
		socket.emit("connected", name);
	}

	//
	function publishMessage() {
		var textInput = document.getElementById('message');
		socket.emit("sendMessageToServer", {value: textInput.value, name: "<?php echo $_SESSION['name']; ?>"});
		textInput.value = '';
	}

	function zero_padding(date) {
		var val = ('00' + date).slice(-2);
		return val;
	}

	//サーバから受け取るイベントを作成
	socket.on("sendMessageToClient", function (data) {
		date = new Date();
		var disp_date = date.getFullYear()+"/"+zero_padding(date.getMonth()+1)+"/"+zero_padding(date.getDate())+" "+zero_padding(date.getHours())+":"+zero_padding(date.getMinutes())+":"+zero_padding(date.getSeconds());
		var send_msg = "<tr>" + "<td class='message'>" + data.value + "</td></tr>";
	    $("#table_msg_list").prepend(send_msg);
	});

	// 開始処理
	start(name);
</script>

</html>