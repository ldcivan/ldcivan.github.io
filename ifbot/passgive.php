<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Pro-Ivan 通行证分发</title>
  <style>
#divcss{margin:20 auto;width:50%;height:40px;}   
#footer {
            height: 90px;
            line-height: 40px;
            position: fixed;
            bottom: 0;
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
</head>
<body>
<?php
//所有需要输出二次密码打开的页面，只需要将本php文件进行包含即可
if ($_GET["close"] == 'yes'){
    header("refresh:0;url=/ifbot/passgive.php");
}
$url = $_SERVER["HTTP_REFERER"];
$num = '1';
//echo $url;
if (!session_id()){session_start();};
if(isset($_GET['close'])){  
$url = $_GET['url']; 
unset($_SESSION['recheck']);
}
if(isset($_POST['password']) && $_POST['password'] == '123456'){
    $_SESSION['recheck'] = 1;
    $type=0;
    header('location:'.$url);
}
if(isset($_POST['password']) && $_POST['password'] == $_COOKIE['ifbotpw']){
    $_SESSION['recheck'] = 1;
    $type=1;
    header('location:'.$url);
}
if(!isset($_SESSION['recheck'])){
    setcookie("ifbotlog", "1", time( )+30, "/", $_SERVER['SERVER_NAME']);
    setcookie("ifbotpw", $num, time( )+30, "/", $_SERVER['SERVER_NAME']);
    echo('<div id="divcss"><center>
        <img src="/Ivan.png" width=30%><br><br>
        <form method="post">');
        echo $num;
        exit ('是数字几？ ：<br><input type="password" name="password" />
            <input type="submit" value="确定" />
        </form>
    </center></div>
    ');
}
?>
<div id="footer">
    <?php
        if(isset($_COOKIE["ifbotlog"]) != 1){
            header("refresh:0;url=/ifbot/passgive.php?close=yes");
        }
        elseif(isset($_COOKIE["ifbot"]) === FALSE){
            setcookie("ifbot", "by9X45eN7UMI0o75CR9t65eX7cvB88C98ny74bU8C74Xw577N9j", time( )+30, "/", $_SERVER['SERVER_NAME']);
            echo ("    <script>window.open('/temp.php', '_self');</script>");
            if($type == 0){
                setcookie("ifbottype", "0", time( )+30, "/", $_SERVER['SERVER_NAME']);
            }
            if($type == 1){
                setcookie("ifbottype", "x3X43W547897bM89I54c656drS6f5C6ju7v678f64bynUn8ONU98p", time( )+30, "/", $_SERVER['SERVER_NAME']);
            }
        }
    ?>
    <script>//window.open('/temp.php', '_self');</script>
    <a href="/temp.php"><font color="#FFFFFF">点击以继续</font></a>
</div>
</body>
</html>