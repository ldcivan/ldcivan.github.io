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
    $dromNumber = mysqli_real_escape_string($conn, $dromNumber);
    $email = $_POST["email"];
    $email = mysqli_real_escape_string($conn, $email);
    

    // 将数据插入到数据库中
    if($email == '000@pro-ivan.cn' ){
        $sql = "DELETE FROM mytable WHERE dromNumber = ".$dromNumber;
        $email = "已清除对应邮箱";
    } else if ($email == '') {
        $sql = "SELECT DISTINCT mailto FROM mytable WHERE dromNumber = '".$dromNumber."'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if(mysqli_num_rows($result) > 0) {
                // 如果找到结果，则显示邮箱
                $row = mysqli_fetch_assoc($result);
                $searchemail = $row['mailto'];
            } else {
                // 如果未找到结果，则显示“未绑定过邮箱”
                $searchemail = "未绑定过邮箱";
            }
        } else {
            echo "查询失败，请重试！";
        }
        echo "查询到宿舍ID".$dromNumber."的绑定对象：".$searchemail;
    } else{
        $sql = "REPLACE INTO mytable (dromNumber, mailto) VALUES ('$dromNumber', '$email')";
    }

    if ($email != '' && mysqli_query($conn, $sql)) {
        echo "数据插入成功";
        echo $dromNumber .'-->' .$email;
    } else if ($email != '') {
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
	<style>
		label {
			display: block;
			margin-top: 10px;
		}
		form {
		    text-align: center;
		}

		p {
		    margin: 10px;
		}
		
        button {
	      margin: 10px;
          padding: 10px 20px;
          font-size: 16px;
          border-radius: 5px;
          background-color: #4CAF50;
          color: #ffffff;
          border: none;
          cursor: pointer;
          box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
          transition: background-color 0.3s;
        }
        
        button:hover {
          background-color: #3e8e41;
        }
        
        button:disabled {
            background-color: #cccccc;
        }
        
        select {
          /* 添加自定义样式 */
          background-color: #f2f2f2;
          color: #333333;
          padding: 10px;
          border: none;
          border-radius: 5px;
          font-size: 16px;
        }
        
        option {
          background-color: #f2f2f2;
          color: #333333;
          padding: 5px;
          font-size: 18px;
        }
        
        label {
          font-size: 18px;
          padding: 5px;
          font-weight: bold;
        }
        
        #result {
            font-size: 16px; 
            line-height: 22px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
          /* 添加自定义样式 */
          width: 200px;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 16px;
          color: #333333;
          background-color: #f2f2f2;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
          /* 添加获得焦点时的样式 */
          outline: none;
          border-color: #007bff;
          box-shadow: 0 0 5px #007bff;
        }
        
        input[type="submit"],
        input[type="button"] {
          /* 添加按钮样式 */
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          color: #fff;
          background-color: #007bff;
          cursor: pointer;
        }
        
        input[type="submit"]:hover,
        input[type="button"]:hover {
          /* 添加按钮悬停样式 */
          background-color: #0056b3;
        }

        #info {
            margin: 30px;
        }

	</style>
</head>
<body>
    <h2 style="margin: 20px;">绑定宿舍编号到邮箱</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="dromNumber">宿舍编号：</label>
        <input type="text" name="dromNumber" id="dromNumber" oninput="value=value.replace(/[^\d]/g,'')" required><br><br>
        <label for="email">邮箱：</label>
        <input name="email" id="email" type="email"><br><br>
        <input id="submit" type="submit" value="提交" style="display:none">
        <button onclick="check(document.getElementById('email').value)" type="button">绑定邮箱到该宿舍</button>
        <button onclick="document.getElementById('email').value = '';document.getElementById('submit').click()" type="button">查询该宿舍绑定的邮箱</button>
        <button onclick="document.getElementById('email').value = '000@pro-ivan.cn';document.getElementById('submit').click()" type="button">清空该宿舍绑定的邮箱</button>
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
    <div id="info">
    <h3>重要更新：</h3>现已支持在线获取宿舍编号！请使用<a href="getID">本页面</a>！
    <br>
    <h3>注意：</h3>宿舍编号不是宿舍号。获取宿舍编号请使用<a href="https://raw.githubusercontent.com/ldcivan/bupt_electronic_monitor/main/elec_id_get.py" download="drom_num_get.py" target="_blank">本python程序</a>（需要填写登录https://app.bupt.edu.cn/后的cookie）。
    <br>
    <h3>或者：</h3>浏览器访问<a href="https://app.bupt.edu.cn/buptdf/wap/default/chong">app.bupt.edu.cn/buptdf/wap/default/chong</a>后，按<b>f12</b>并找到<b>网络/Network</b>选项卡，查询完你的余额后，选择写有<b>search</b>的一项，在<b>载荷/请求/request</b>中即可找到<b>dromNumber</b>。
    <br>
    <h3>获取cookie方法：</h3>浏览器访问<a href="https://app.bupt.edu.cn">app.bupt.edu.cn</a>后，按<b>f12</b>并找到<b>网络/Network</b>选项卡，按<b>ctrl+r</b>刷新页面后选择写有<b>app.bupt.edu.cn</b>的一项，在<b>请求标头/request header</b>中即可找到<b>cookie</b>。理论上你只需要获得<b>eai-sess</b>就能使用程序。
    </div>
</body>
</html>
