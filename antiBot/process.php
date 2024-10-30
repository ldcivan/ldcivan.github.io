<?php
session_start();
$expireTime = 60*60*12; // 过期时间为30天
$_SESSION['timeout'] = time() + $expireTime;

// 检查验证码是否正确
if (isset($_POST['captcha']) && $_POST['captcha'] === $_SESSION['captcha']) {
    $_SESSION['visited'] = true;
    echo '<div style="color:green;"><i class="mdui-icon material-icons">check</i> 验证码正确！将自动返回你<a href='.$_SESSION['comeFrom'].'>之前所在的页面</a>，或者你也可以点击这边回到<a href="/">主页</a></div>';
    exit ('<meta http-equiv="refresh" content="1;url='.$_SESSION['comeFrom'].'">');
} else {
    exit ('<div style="color:red;"><i class="mdui-icon material-icons">error</i>验证码错误或者验证码过期！请手动刷新验证码后重试！</div>');
}
?>
