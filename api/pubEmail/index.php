<meta charset="utf-8">
<title>Pro-Ivan 公用邮箱</title>
您可从此处获取公用邮箱的账号与密码。<br>
邮箱可用于一些你不想使用自有电子邮箱，或自有电子邮箱不可用的情况：比如注册一些小网站的账号，注册更多的AppStore账号等<br>
注意，使用这些电子邮箱时，不应在需要保密的场景中：比如注册要长期使用的账号等。<br>
Pro-Ivan可能在一个邮箱已被使用多次后将该邮箱信息隐藏，但不会关闭用户对其使用的权限。<br>
若一个邮箱被滥用，或被用于违反当地法律的事项，Pro-Ivan有权完全删除该邮箱，并将使用者IP地址记录在案。<br>
<br>
POP服务【服务地址： mail.pro-ivan.com 、端口： 110 】<br>
IMAP服务*【服务地址： mail.pro-ivan.com 、端口： 143 】<br>
SMTP服务*【服务地址： mail.pro-ivan.com 、端口： 25 】<br>
* 一般第三方软件要这俩端口就成。以QQ邮箱APP为例，IMAP对应收件服务器，SMTP对应发件服务器。<br>
<br>

<form method="POST" action="">
    <button type="submit" name="get_key">获取密钥</button>
</form>
<?php
// 开启会话
session_start();

// 定义密钥池
$keys = json_decode(file_get_contents('keys.json'), true);

if (!isset($_POST['get_key'])) exit();

// 获取客户端 IP 地址
$client_ip = $_SERVER['REMOTE_ADDR'];

// 检查会话中是否存在 user_key
if (!isset($_SESSION['user_key'])) {
    echo "你已经获得了一个密钥(".$_SESSION['user_key'].")，不能重复获取！";
} else {
    // 检查客户端 IP 地址是否已经获得了密钥
    $ip_keys = isset($_SESSION['ip_keys']) ? $_SESSION['ip_keys'] : array();
    if (!in_array($client_ip, $ip_keys)) {
        echo "你已经获得了一个密钥(".$_SESSION['user_key'].")，不能重复获取！";
    } else {
        // 随机选择一个密钥
        $key_index = array_rand($keys);
        $key = $keys[$key_index];
        
        // 从密钥池中删除所选密钥
        array_splice($keys, $key_index, 1);
        file_put_contents('keys.json', json_encode($keys));

        // 将密钥保存到会话中
        $_SESSION['user_key'] = $key;

        // 将客户端 IP 地址保存到会话中
        $ip_keys[] = $client_ip;
        $_SESSION['ip_keys'] = $ip_keys;

        // 显示所选密钥
        echo "你的密钥是：".$key;
    }
}
?>
