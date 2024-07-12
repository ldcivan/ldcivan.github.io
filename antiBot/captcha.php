<?php
ini_set('session.gc_maxlifetime', 20);
session_start();

$length = 4; // 验证码的长度
$width = 120; // 验证码图像的宽度
$height = 40; // 验证码图像的高度

// 创建一个随机字符串作为验证码
$captcha = substr(str_shuffle("123456789abdefghijmnqrtuyABDEFGHJLMNQRTUY"), 0, $length);

// 将验证码存储在 session 变量中
$_SESSION['captcha'] = $captcha;

// 创建一个空的图像对象
$image = imagecreatetruecolor($width, $height);

// 生成一个随机背景色
$bg_color = imagecolorallocate($image, rand(200, 255), rand(200, 255), rand(200, 255));

// 用背景色填充整个图像
imagefill($image, 0, 0, $bg_color);

// 创建一个随机文本颜色
//$text_color = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));

//随即字号
$fontSize = rand(25, 35);

// 在图像中添加验证码文本
//$font = '/usr/share/fonts/msttcore/arial.ttf'; // TrueType 字体文件路径
$fonts = array_merge(glob('/usr/share/fonts/*/*.ttf'), glob('/usr/share/fonts/chinese/*/*.ttf'));


$fontss = array_filter($fonts, function($fonts) {
  return !preg_match('/(DroidSans|webdings)/', $fonts);
});

$font = $fontss[array_rand($fontss)];
$textbox = imagettfbbox($fontSize, 0, $font, $captcha); // 计算文本框大小
$x = ($width - $textbox[4]) / 2; // 计算文本框左上角的 x 坐标
$y = ($height - $textbox[5]) / 2; // 计算文本框左上角的 y 坐标
//imagettftext($image, 20, rand(-15, 15), $x, $y, $text_color, $font, $captcha);

for ($i = 0; $i < $length; $i++) {
    $char = substr($captcha, $i, 1);
    imagettftext($image, $fontSize, rand(-15, 15), $x, $y, imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100)), $font, $char);
    $x += ($fontSize * rand(60,80) * 0.01);   // 每个字符之间的间隔
}

// 扭曲图像
$amplitude = 180; // 扭曲振幅
$phase = 180; // 扭曲相位
for ($x = 0; $x < $width; $x++) {
    for ($y = 0; $y < $height; $y++) {
        $sx = $x + $amplitude * sin($y / $height * 2 * M_PI + $phase);
        $sy = $y + $amplitude * sin($x / $width * 2 * M_PI + $phase);
        if ($sx < 0 || $sy < 0 || $sx >= $width || $sy >= $height) {
            continue;
        }
        $color = imagecolorat($image, $sx, $sy);
        imagesetpixel($image, $x, $y, $color);
    }
}

// 添加随机噪点
for ($i = 0; $i < 100; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($image, rand(0, $width), rand(0, $height), $color);
}

// 添加随机干扰线
for ($i = 0; $i < 10; $i++) {
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $color);
}


// 输出图像并销毁
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
