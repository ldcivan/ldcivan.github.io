<?php session_start(); ?>
<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pro-Ivan 通行证分发</title>
	<link rel="stylesheet" href="/mdui/css/mdui.css" />
	<link rel="stylesheet" href="/new-js/index.css">
	<script src="/mdui/js/mdui.min.js"></script>
    <style>
        #divcss{margin:20 auto;width:50%;height:40px;}   
        #footer {
            height: 45px;
            line-height: 40px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            text-align: center;
            background: #373d41;
            color: #ffffff;
            font-family: Arial;
            font-size: 16px;
            letter-spacing: 1px;
        }
        a {text-decoration: none}
    </style>
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
<body class="mdui-theme-primary-light-blue mdui-container-fluid" style="max-width: 1200px;">
<?php
//所有需要输出二次密码打开的页面，只需要将本php文件进行包含即可
$url = $_SERVER["HTTP_REFERER"];
//echo $url;
if(isset($_GET['close'])){  
$url = $_GET['url']; 
unset($_SESSION['recheck']);
}
if(isset($_POST['password']) && $_POST['password'] == '123456'){
    $_SESSION['recheck'] = 1;
    $type=0;
    header('location:'.$url);
}
if(isset($_POST['password']) && $_POST['password'] == 'yujionako'){
    $_SESSION['recheck'] = 1;
    $type=1;
    header('location:'.$url);
}
if(!isset($_SESSION['recheck'])){
    setcookie("log", "1", time( )+86400*30, "/", $_SERVER['HTTP_HOST']);
    exit('<div id="divcss"><center>
        <img src="/Ivan.svg" width="250px"><br><br>
        <form class="mdui-textfield" style="width:300px;" method="post">
            <input class="mdui-textfield-input" placeholder="管理员密码" style="text-align:center;" type="password" name="password" />
            <br>
            <input class="mdui-btn mdui-color-theme mdui-text-color-white-text" type="submit" value="确定" /><br>维护中，仅持有管理员密码者可进入管理<br>输入管理密码仍然会到此界面，请清除cookie
        </form>
    </center></div>
    ');
}
?>
<div id="footer">
    <?php
        if(isset($_COOKIE["passport"]) === FALSE){
            setcookie("passport", "by9X45eN7UMI0o75CR9t65eX7cvB88C98ny74bU8C74Xw577N9j", time( )+86400*30, "/", $_SERVER['HTTP_HOST']);
            if($type == 0){
                setcookie("type", "0", time( )+86400*30, "/", $_SERVER['HTTP_HOST']);
            }
            if($type == 1){
                setcookie("type", "x3X43W547897bM89I54c656drS6f5C6ju7v678f64bynUn8ONU98p", time( )+86400*30, "/", $_SERVER['HTTP_HOST']);
            }
        }
    ?>
    <a href="<?php if(isset($_SESSION['passcomeFrom']))echo $_SESSION['passcomeFrom']; else $_SESSION['comeFrom']; ?>"><font color="#FFFFFF">已添加通行证，点击此处安全退出本页面</font></a>
</div>
</body>
</html>