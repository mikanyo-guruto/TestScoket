//サーバ作成
var io = require('socket.io')(8080);
var userName = "NULL";

//クライアント接続があると、以下の処理をさせる。
io.on('connection', function (socket) {

	// ユーザの名前をセット
	socket.on("connected", function (name) {
		userName = name;
	});

	//接続通知をクライアントに送信
	io.emit("sendMessageToClient", {value: userName + "が入室しました。"});

	//クライアントからの受信イベントを設定
	socket.on("sendMessageToServer", function (data) {
		var msg = data.value;
    	io.emit("sendMessageToClient", {value: msg});
	});     

	//接続切れイベントを設定
	socket.on("disconnect", function () {
    	io.emit("sendMessageToClient", {value: userName + "が退室しました。"});
	});
});
