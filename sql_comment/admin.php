<meta charset="utf-8">
<form action='' method='post'><table class='mdui-table'><tbody><tr><th><label class='mdui-textfield-label'>ID</label><input type='text' class='mdui-textfield-input' name='id' placeholder='请输入id' required='required' maxlength='25' style='width:98%;'><br><label class='mdui-textfield-label'>回复</label><input type='text' class='mdui-textfield-input' name='reply' placeholder='要讲文明哟~(小于200字)' required='required' maxlength='200' style='width:98%;'><br><center><input class='mdui-btn mdui-ripple mdui-btn-raised mdui-btn-dense mdui-color-theme' type='submit' id ='submitButton' value='发送' onclick=''></center></th></tr></tbody></table></form>
<?php
    if(!isset($_POST["id"])||!isset($_POST["reply"])) exit('请在输入后提交');
    // 连接数据库
    $servername = "127.0.0.1";
    $username = "root";
    $password = "Ldc123456";
    $dbname = "messages";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    
    // 获取管理员提交的回复
    $id = $_POST["id"];
    $reply = $_POST["reply"];
    
    // 更新评论记录中的回复字段
    $sql = "UPDATE comments SET reply='$reply', updated_at=NOW() WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "回复已提交到评论id：".$id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // 关闭数据库连接
    $conn->close();

?>