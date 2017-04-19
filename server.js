//サーバ作成
var io = require('socket.io')(8080);
var users = [];
var name = "";
//クライアント接続があると、以下の処理をさせる。
io.on('connection', function (socket) {
	socket['userName'] = name;
	users.push(socket);

	//接続通知をクライアントに送信
	io.emit("sendMessageToClient", {value: socket['userName'] + "が入室しました。"});

	//クライアントからの受信イベントを設定
	socket.on("sendMessageToServer", function (data) {
		var msg = "[" + socket.userName + "]" + data.value;
    	io.emit("sendMessageToClient", {value: msg});
	});     

	//接続切れイベントを設定
	socket.on("disconnect", function () {
    	io.emit("sendMessageToClient", {value: socket['userName'] + "1人退室しました。"});
	});
});