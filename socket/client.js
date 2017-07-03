//接続先の指定
var url = "localhost:8080";
//接続
var socket = io.connect(url);
var name = "NULL";
console.log(name.value);
socket.on("connected", function(name) {});

//サーバから受け取るイベントを作成
socket.on("sendMessageToClient", function (data) {
    $("#msg_list").prepend("<tr>" + "<td class='name'>" + name + "</td>" + "<td class='message'>" + data.value + "</td>" + "<td class='create_time'>" + "2012/01/01 24:00" + "</td>" + "</tr>");
});

//ボタンクリック時に、メッセージ送信
$("input#send").click(function(){
    var test = ["test1", "test2"];
    socket.emit("sendMessageToServer", {value:test});
    var msg = $("#message").val();
    $("#message").val(""); 
    //サーバへ送信
    socket.emit("sendMessageToServer", {value:msg}); 
});