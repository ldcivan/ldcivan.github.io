<?php
session_start();
$expireTime = 60*60*12; // 过期时间为30天
$_SESSION['timeout'] = time() + $expireTime;

// 检查验证码是否正确
if (isset($_POST['captcha']) && $_POST['captcha'] === $_SESSION['captcha']) {
    $_SESSION['visited'] = true;
    echo '验证码正确！将返回你<a href='.$_SESSION['comeFrom'].'>之前所在的页面</a>，或者你也可以点击这边回到<a href="/">主页</a>';
    exit ('<meta http-equiv="refresh" content="3;url='.$_SESSION['comeFrom'].'">');
} else {
    echo '验证码错误或者验证码过期！<br>若反复显示此内容，则请在验证码页面手动刷新一下';
    exit ('<meta http-equiv="refresh" content="2;url=/antiBot">');
}
?>
