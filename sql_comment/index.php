<head>
    <meta charset="utf-8">
    <title>comment board</title>
    <style>
        /* 设置表格边框和间距 */
        table {
          border-collapse: collapse;
          border-spacing: 0;
          text-align: center;
        }
        
        /* 设置表头样式 */
        th {
          font-weight: bold;
          background-color: #eee;
          padding: 0.5em;
        }
        
        /* 设置表格单元格样式 */
        td {
          border: 1px solid #ccc;
          padding: 0.5em;
          word-wrap: break-word;
          white-space: pre-wrap;
        }
        
        td.diagonal {
          transform: rotate(45deg);
        }

        tr.comment {
          background-color: #f2f2f2;
        }
        
        tr:hover {
          background-color: #ccc;
        }

    </style>
</head>
<body>
<?php
//error_reporting(0);
// 连接数据库
$servername = "127.0.0.1";
$username = "root";
$password = "Ldc123456";
$dbname = "messages";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if (!$conn) {
    die("连接失败：" . mysqli_connect_error());
}

// 从数据库中读取评论数据
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// 在表格中显示评论数据
if (mysqli_num_rows($result) > 0) {
    echo "<table><tbody width=95%>";
    echo "<tr><th width=30px>ID</th><th width=15%>昵称</th><th width=50%>评论</th><th width=180px>时间</th><th width=100px>IP属地</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='comment'>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["comment"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "</tr>";
        // 如果有管理员留言，显示管理员留言及留言时间
        if (!empty($row["reply"])) {
            echo "<tr>";
            echo "<td>𝗟</td>";
            echo "<td>(管理答复)</td>";
            echo "<td class='admin-reply'>" . $row["reply"] . "</td>";
            echo "<td class='admin-reply-time'>" . $row["updated_at"] . "</td>";
            echo "<td class='diagonal'>----</td>";
            echo "</tr>";
        }
    }
    echo "</tbody></table>";
} else {
    echo "暂无评论。";
}

// 关闭数据库连接
mysqli_close($conn);
?>
<!--
<div><h3 id='留言板'>留言板</h3><div class='mdui-table-fluid mdui-table th' style='margin-left:1%;width:98%;'><br><form action='./comment.php' method='post'><table class='mdui-table'><tbody><tr><th><label class='mdui-textfield-label'>昵称</label><input type='text' class='mdui-textfield-input' name='name' placeholder='请输入昵称(小于25字)' required='required' maxlength='25' style='width:98%;'><br><label class='mdui-textfield-label'>评论</label><input type='text' class='mdui-textfield-input' name='comment' placeholder='要讲文明哟~(小于200字)' required='required' maxlength='200' style='width:98%;'><br><center><input class='mdui-btn mdui-ripple mdui-btn-raised mdui-btn-dense mdui-color-theme' type='submit' id ='submitButton' value='发送' onclick=''></center></th></tr></tbody></table></form>
-->
</body>