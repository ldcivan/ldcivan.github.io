<?php
header("Content-Type: text/html; charset=utf-8");

// 获取字体列表


$fonts = array_merge(glob('/usr/share/fonts/*/*.ttf'), glob('/usr/share/fonts/chinese/font/*.ttf'));
// 创建画布并输出字体示例
foreach ($fonts as $font) {
    $img = imagecreatetruecolor(200, 50);
    $bg_color = imagecolorallocate($img, 255, 255, 255); // 设置背景颜色为白色
    imagefill($img, 0, 0, $bg_color);
    $text_color = imagecolorallocate($img, 0, 0, 0); // 设置文本颜色为黑色
    $font_path = $font; // 字体文件路径，根据实际情况修改

    imagettftext($img, 20, 0, 10, 30, $text_color, $font_path, explode('/', $font)[5]); // 将字体名称作为文本输出到图片上

    imagepng($img, './font/'. explode('/', $font)[5] . '.png'); // 将图片保存到本地
    imagedestroy($img); // 释放内存
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fonts</title>
    <style>
        .font-example {
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <?php foreach ($fonts as $font): ?>
        <div class="font-example">
            <img src="./font/<?php echo explode('/', $font)[5] ?>.png" alt="<?php echo explode('/', $font)[5] ?>">
            <p><?php echo explode('/', $font)[5] ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>

