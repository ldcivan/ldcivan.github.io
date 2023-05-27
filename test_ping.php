<?php
function pingAddress($address) {
    $status = -1;
    if (strcasecmp(PHP_OS, 'WINNT') === 0) {
        // Windows 服务器下
        $pingresult = exec("ping -n 1 {$address}", $outcome, $status);
    } elseif (strcasecmp(PHP_OS, 'Linux') === 0) {
        // Linux 服务器下
        $pingresult = exec("ping -c 1 {$address}", $outcome, $status);
    }
    if (0 == $status) {
        $status = "OK!";
    } else {
        $status = "Failed!";
    }
    return $status;
}


$address1 = "pro-ivan.com"; // 测试ping
$address2 = "us.pro-ivan.com";
$address3 = "chat.pro-ivan.com";

echo "Connection to Main Site: ".pingAddress($address1); // 返回true
echo "<br/>Connection to Image_bed: ".pingAddress($address2); 
echo "<br/>Connection to Chat_Bot: ".pingAddress($address3)."<br/>"; 
?>