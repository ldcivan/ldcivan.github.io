<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>验证码</title>
</head>
<body>
    <h1>为了服务器的内容安全，我们不得不加入了简单的人机验证</h1>
    <form method="post" action="process.php">
        <label for="captcha">请输入验证码：</label>
        <input type="text" name="captcha" id="captcha" />
        <img src="captcha.php" alt="验证码" />
        <input type="submit" value="提交" />
    </form>
</body>
</html>
<!--
cnm，爬爬爬爬牛魔爬，老子服务器都被牛魔酬宾给爬烂了！
-->
