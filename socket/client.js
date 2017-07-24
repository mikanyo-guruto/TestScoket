//接続先の指定
var url = "localhost:8080";
//接続
var socket = io.connect(url);
var date = new Date();

function zero_padding(date) {
	var val = ('00' + date).slice(-2);
	return val;
}

//サーバから受け取るイベントを作成
socket.on("sendMessageToClient", function (data) {
	var disp_date = date.getFullYear()+"/"+zero_padding(date.getMonth()+1)+"/"+zero_padding(date.getDate())+" "+zero_padding(date.getHours())+":"+zero_padding(date.getMinutes())+":"+zero_padding(date.getSeconds());
	var message = "<tr>" + "<td class='name'>" + name + "</td>" + "<td class='message'>" + data.value + "</td>" + "<td class='create_time'>" + disp_date + "</td>" + "</tr>";
    $("#table_msg_list").prepend(message);
});

//ボタンクリック時に、メッセージ送信
$("input#send").click(function(){
    var msg = $("#message").val();
    //サーバへ送信
    socket.emit("sendMessageToServer", {value:msg}); 
});