<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>验证码</title>
    		<script>
        	var _hmt = _hmt || [];
        	(function() {
         	 var hm = document.createElement("script");
         	 hm.src = "https://hm.baidu.com/hm.js?90415f833f988b0bccfb250d70f115f6";
         	 var s = document.getElementsByTagName("script")[0]; 
         	 s.parentNode.insertBefore(hm, s);
        	})();
    	</script>
</head>
<body>
    <h1>为了服务器的内容安全，我们不得不加入了简单的人机验证</h1>
    <form method="post" action="./process.php">
        <label for="captcha">请输入验证码：</label>
        <input type="text" name="captcha" id="captcha" />
        <img id="captchaImg" src="./captcha.php" alt="验证码" />
        <input type="submit" value="提交" />
        <button type="button" onclick="document.getElementById('captchaImg').src='./captcha.php';">刷新</button>
    </form>
</body>
</html>
<!--
cnm，爬爬爬爬牛魔爬，老子服务器都被牛魔酬宾给爬烂了！
-->
