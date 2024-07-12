<?php
session_start();  // 启动会话，以便存储验证码

// 定义常量
define('CAPTCHA_WIDTH', 120);   // 验证码图像宽度
define('CAPTCHA_HEIGHT', 40);   // 验证码图像高度
define('CAPTCHA_LENGTH', 6);    // 验证码字符数

// 生成验证码字符串
$captcha = generateCaptcha(CAPTCHA_LENGTH);

// 存储验证码到会话中
$_SESSION['captcha'] = $captcha;

// 创建验证码图像
$image = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);

// 填充背景色
$bgColor = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bgColor);

// 添加随机噪点
for ($i = 0; $i < 100; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($image, rand(0, CAPTCHA_WIDTH), rand(0, CAPTCHA_HEIGHT), $color);
}

// 添加随机干扰线
for ($i = 0; $i < 5; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline($image, rand(0, CAPTCHA_WIDTH), rand(0, CAPTCHA_HEIGHT), rand(0, CAPTCHA_WIDTH), rand(0, CAPTCHA_HEIGHT), $color);
}

// 添加验证码字符串
$fontFile = '/usr/share/fonts/msttcore/arial.ttf';   // 字体文件路径
$fontSize = 20;            // 字体大小
$textColor = imagecolorallocate($image, 0, 0, 0);
$textX = 10;   // 字符串起始 x 坐标
$textY = 25;   // 字符串起始 y 坐标
for ($i = 0; $i < CAPTCHA_LENGTH; $i++) {
    $char = substr($captcha, $i, 1);
    imagettftext($image, $fontSize, rand(-15, 15), $textX, $textY, $textColor, $fontFile, $char);
    $textX += ($fontSize * 0.7);   // 每个字符之间的间隔
}

// 设置图像类型和输出格式
header('Content-Type: image/png');
imagepng($image);

// 销毁图像资源
imagedestroy($image);

// 生成验证码字符串的函数
function generateCaptcha($length) {
    $chars = '123456789abdefghjmnqrtuyABDEFGHJLMNQRTUY';
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($chars) - 1);
        $captcha .= substr($chars, $index, 1);
    }
    return $captcha;
}
?>
