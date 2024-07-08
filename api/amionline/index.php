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

$sql = "SELECT device_id, status, last_update FROM device_status";
$result = $conn->query($sql);

$isAnyDeviceOnline = false;
$devices = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $devices[] = $row;
        if ($row['status'] === 'online') {
            $isAnyDeviceOnline = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>站长在吗？</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .status {
            text-align: center;
            font-size: 1.4em;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .status-online {
            color: green;
            border: 2px solid green;
        }
        .status-offline {
            color: red;
            border: 2px solid red;
        }
        .tips {
            text-align: center;
            color: grey;
            font-size: 0.9em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 1em;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>站长在吗？</h1>
        <div class="status <?php echo $isAnyDeviceOnline ? 'status-online' : 'status-offline'; ?>">
            <?php echo $isAnyDeviceOnline ? '站长在线上' : '站长已下线'; ?>
        </div>
        <div class="tips"><?php echo $isAnyDeviceOnline ? '现在通过哔哩哔哩、邮箱等方式大概率可以联系到站长' : '站长正在摸鱼……'; ?></div>
        <table>
            <tr>
                <th>设备名</th>
                <th>状态</th>
                <th>最后更新于</th>
            </tr>
            <?php foreach ($devices as $device): ?>
                <tr>
                    <td>
                    <?php
                    $device_id = $device['device_id'];
                    
                    // 查询device_name
                    $sql = "SELECT device_name FROM allowed_devices WHERE device_id = '$device_id'";
                    $result = $conn->query($sql);
                    $device_name = $result->fetch_assoc()['device_name'];
                    
                    if ($device_name) {
                        echo $device_name;
                    } else {
                        echo "Device not found";
                    }
                    ?>
                    </td>
                    <td class="<?php echo $device['status'] === 'online' ? 'status-online' : 'status-offline'; ?>">
                        <?php echo htmlspecialchars(ucfirst($device['status'])); ?>
                    </td>
                    <td><?php echo htmlspecialchars($device['last_update']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php 
            // 关闭连接
            $conn->close();
        ?>
    </div>
</body>
</html>
