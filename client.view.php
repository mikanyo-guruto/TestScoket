<?php session_start(); ?>
<!DOCTYPE html> 
<html>
<head></head>
<body>
  <h3>Welcom <?php echo $_SESSION['user_name']; ?></h3>
  <ul id="msg_list"></ul>
  <form action="" method="post" onsubmit="return false;">
    <input type="text" class="text" id="message"/>
    <input type="hidden" id="test" value="1">
    <input type="submit" class="button" id="send" value="送信" />
  </form>
</body>
<script type="text/javascript" src="./jquery-3.2.1.min.js"></script>
<!-- socket.ioのクラインアントライブラリを取得 -->  
<script src="./node_modules/socket.io-client/dist/socket.io.js"></script>
<script type="text/javascript">

// 名前の取得
/*
var parm = location.search.substring(1).split('&');
for(var i=0;parm[i];i++) {
    var kv = parm[i].split('=');
    var name = kv[1];
    console.log(name);
}
*/
var name = "<?php echo $_SESSION['user_name']; ?>";

//接続先の指定
var url = "localhost:8080";

//接続
var socket = io.connect(url);

socket.emit("setUserName", {value:name});

//サーバから受け取るイベントを作成
socket.on("sendMessageToClient", function (data) {
    $("#msg_list").prepend("<li>" + data.value + "</li>");
});

//ボタンクリック時に、メッセージ送信
$("input#send").click(function(){
    var msg = $("#message").val(); 
    $("#message").val(""); 
    //サーバへ送信
    socket.emit("sendMessageToServer", {value:msg}); 
});
</script>
</html>