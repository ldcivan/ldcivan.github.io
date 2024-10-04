<?php
session_start();  // 启动会话

$limit = 10;  // 间隔阈值
$currentTime = time();  // 当前时间戳

if (isset($_SESSION['lastAccessTime'])) {
    $lastAccessTime = $_SESSION['lastAccessTime'];

    if ($currentTime - $lastAccessTime < $limit) {
        // 访问频率超过限制，执行相应的操作，比如拒绝访问或提示用户稍后再试
        echo('<script>alert("您似乎正在进行重复上传，若不是重复上传，请10秒后重试");window.open("'.$_SERVER['HTTP_REFERER'].'", "_self");</script>');
        return false;
    }
}

// 更新最后访问时间
$_SESSION['lastAccessTime'] = $currentTime;

// 设置上传目录
$uploadDir = 'comicEXPO/';

// 检查并创建上传目录
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// 获取传入参数
$img = $_FILES['file'];
$platform = $_POST['platform'];
$author = $_POST['author'];

// 检查是否是多个文件上传
if (is_array($img['tmp_name'])) {
    // 处理多个文件
    foreach ($img['tmp_name'] as $key => $tmpName) {
        // 检查文件是否上传成功
        if ($img['error'][$key] === UPLOAD_ERR_OK) {
            // 获取文件扩展名
            $fileExtension = pathinfo($img['name'][$key], PATHINFO_EXTENSION);
            
            // 生成新的文件名
            $newFileName = time() . '_' . $platform . '_' . $author . '_' . $key . '.' . $fileExtension;
            $newFileName= preg_replace('/[\/:*?"<>|]/', '_', $newFileName);
            $destination = $uploadDir . $newFileName;
            
            // 验证并压缩图片
            if (validateAndCompressImage($tmpName, $destination)) {
                echo "文件上传成功：" . $img['name'][$key] . "<br>";
            } else {
                echo "文件验证错误（可能是类型不正确，仅支持PNG/JPG/JPEG）：" . $img['name'][$key] . "<br>";
            }
        } else {
            echo "文件上传错误：" . $img['name'][$key] . "<br>";
        }
    }
} else {
    // 处理单个文件
    if ($img['error'] === UPLOAD_ERR_OK) {
        // 获取文件扩展名
        $fileExtension = pathinfo($img['name'], PATHINFO_EXTENSION);
        
        // 生成新的文件名
        $newFileName = time() . '_' . $platform . '_' . $author . '.' . $fileExtension;
        $destination = $uploadDir . $newFileName;
        
        // 验证并压缩图片
        if (validateAndCompressImage($img['tmp_name'], $destination)) {
            echo "文件上传成功：" . $img['name'] . "<br>";
        } else {
            echo "文件验证失败（可能是类型不正确，仅支持PNG/JPG/JPEG）：" . $img['name'] . "<br>";
        }
    } else {
        echo "文件上传错误：" . $img['name'] . "<br>";
    }
}

header("refresh:10;url=./index.html");
echo('<br>上传结束，谢谢您的耐心操作！<br>正在返回上传页面，十秒后自动跳转...<br><a href="./index.html">点击此处</a>立即跳转');

// 函数：验证并压缩图片
function validateAndCompressImage($source, $destination) {
    $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    
    // 获取文件的 MIME 类型
    $fileMimeType = mime_content_type($source);
    
    // 验证 MIME 类型
    if (!in_array($fileMimeType, $allowedMimeTypes)) {
        return false;
    }
    
    // 验证文件是否为有效的图像
    $imageSize = getimagesize($source);
    if ($imageSize === false) {
        return false;
    }
    
    // 压缩并保存图片
    switch ($fileMimeType) {
        case 'image/jpg':
            $image = imagecreatefromjpeg($source);
            if ($image === false) {
                return false;
            }
            imagejpeg($image, $destination, 100); // 压缩质量设置为 75
            break;
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            if ($image === false) {
                return false;
            }
            imagejpeg($image, $destination, 100); // 压缩质量设置为 75
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            if ($image === false) {
                return false;
            }
            imagepng($image, $destination, 9); // 压缩质量设置为 6（0-9）
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            if ($image === false) {
                return false;
            }
            imagegif($image, $destination);
            break;
        default:
            return false;
    }
    
    // 释放内存
    imagedestroy($image);
    
    return true;
}
?>
