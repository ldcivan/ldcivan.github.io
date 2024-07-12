<?php
$link = mysqli_connect('localhost','root','Ldc123456','stampxing');
mysqli_set_charset($link, 'utf8');
if ($link->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$ranking = "kano_rank";//排行榜表名
?>