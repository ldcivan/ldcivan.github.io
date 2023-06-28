<?php
// 连接到 MySQL 数据库
$servername = "localhost";
$username = "root";
$password = "Ldc123456";
$dbname = "elec_monitor";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// 检查连接是否成功
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $dromNumber = $_POST["dromNumber"];
    $email = $_POST["email"];

    // 将数据插入到数据库中
    $sql = "REPLACE INTO mytable (dromNumber, mailto) VALUES ('$dromNumber', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "数据插入成功";
        echo $dromNumber .'-->' .$email;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// 关闭数据库连接
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>绑定宿舍编号到邮箱</title>
    <meta charset="utf-8">
    <style>
        a {
            font-weight:bold;
            color: black;
        }
    </style>
</head>
<body>
    <h2>绑定宿舍编号到邮箱</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="dromNumber">宿舍编号：</label>
        <input type="text" name="dromNumber" id="dromNumber" oninput="value=value.replace(/[^\d]/g,'')" required><br><br>
        <label for="email">邮箱：</label>
        <input name="email" id="email"><br><br>
        <input id="submit" type="submit" value="提交" style="display:none">
        <button onclick="check(document.getElementById('email').value)" type="button">提交</button>
        <button onclick="document.getElementById('email').value = '000@pro-ivan.cn';document.getElementById('submit').click()" type="button">清空宿舍对应的邮箱</button>
    </form>
    <script>
        function check(email){
          //邮箱验证的正则表达式
          const reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
          let str = email;
          console.log(reg.test(str));
          if (reg.test(str)) {
              document.getElementById('submit').click()
          }
          else
            alert('非法的邮箱');
        }
    </script>
    <br>
    <h3>重要更新：</h3>现已支持在线获取宿舍编号！请使用<a href="getID">本页面</a>！
    <br>
    <h3>注意：</h3>宿舍编号不是宿舍号。获取宿舍编号请使用<a href="https://raw.githubusercontent.com/ldcivan/bupt_electronic_monitor/main/elec_id_get.py" download="drom_num_get.py" target="_blank">本python程序</a>（需要填写登录https://app.bupt.edu.cn/后的cookie）。
    <br>
    <h3>或者：</h3>浏览器访问<a href="https://app.bupt.edu.cn/buptdf/wap/default/chong">app.bupt.edu.cn/buptdf/wap/default/chong</a>后，按<b>f12</b>并找到<b>网络/Network</b>选项卡，查询完你的余额后，选择写有<b>search</b>的一项，在<b>载荷/请求/request</b>中即可找到<b>dromNumber</b>。
    <br>
    <h3>获取cookie方法：</h3>浏览器访问<a href="https://app.bupt.edu.cn">app.bupt.edu.cn</a>后，按<b>f12</b>并找到<b>网络/Network</b>选项卡，按<b>ctrl+r</b>刷新页面后选择写有<b>app.bupt.edu.cn</b>的一项，在<b>请求标头/request header</b>中即可找到<b>cookie</b>。理论上你只需要获得<b>eai-sess</b>就能使用程序。
</body>
</html>
