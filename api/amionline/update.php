<?php
$servername = "localhost";
$username = "root";
$password = "Ldc123456";
$dbname = "AmIOnline";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $device_id = $_POST['device_id'];
    $status = $_POST['status'];

    // 检查设备是否被允许
    $check_device_sql = "SELECT COUNT(*) as count FROM allowed_devices WHERE device_id='$device_id'";
    $result = $conn->query($check_device_sql);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        if ($status === 'online' || $status === 'offline') {
        $sql = "INSERT INTO device_status (device_id, status, last_update) 
                VALUES ('$device_id', '$status', NOW()) 
                ON DUPLICATE KEY UPDATE status='$status', last_update=NOW();";

            if ($conn->query($sql) === TRUE) {
                echo "Status updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Invalid status";
        }
    } else {
        echo "Unauthorized device";
    }
}

$conn->close();
?>
