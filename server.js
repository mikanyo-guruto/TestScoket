//サーバ作成
var io = require('socket.io')(8080);
user = {};

//クライアント接続があると、以下の処理をさせる。
io.on('connection', function (socket) {

	// ユーザの名前をセット
	socket.on("connected", function (name) {
		user[socket.id] = name;
		io.emit("sendMessageToClient", {value: "[" + user[socket.id] + "]が入室しました。"});
	});

	// クライアントからの受信イベントを設定
	socket.on("sendMessageToServer", function (data) {
    	io.emit("sendMessageToClient", {value: "[" + user[socket.id] + "] " + data.value});
	});

	// 接続切れイベントを設定
	socket.on("disconnect", function () {
		if (user[socket.id]) {
    		io.emit("sendMessageToClient", {value: "[" + user[socket.id] + "]が退室しました。"});
			delete user[socket.id];
		}
	});
});
