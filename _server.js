//サーバ作成
var io = require('socket.io')(8080);
var users = [];
//クライアント接続があると、以下の処理をさせる。
io.on('connection', function (socket) {
	// 複数のクライアント名を保存
	/*
	socket['userName'] = name;
	users.push(socket);
	*/

	// ユーザが接続された時の処理
	socket.on("connected", function (name) {
		console.log(name.value);
		//socket['userName'] = name.value;
		users.push(socket);
		//users.push(socket);
	});

	//接続通知をクライアントに送信
	io.emit("sendMessageToClientConnected", {value: socket['userName'] + "が入室しました。"});

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
