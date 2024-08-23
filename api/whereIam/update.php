<?php
$servername = "localhost";
$username = "root";
$password = "Ldc123456";
$dbname = "whereIam";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// 获取POST数据
if(!$_POST['longitude']||!$_POST['latitude']) {
    die("Please POST");
}
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

// 准备SQL语句
$sql = "INSERT INTO location (longitude, latitude, time) VALUES ('$longitude', '$latitude', NOW())";

// 执行SQL语句
if ($conn->query($sql) === TRUE) {
    echo "Recorded!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 关闭连接
$conn->close();
?>
