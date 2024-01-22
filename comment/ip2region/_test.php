<?php

require 'Ip2Region.php';

$ip2region = new Ip2Region();

$ip = $_GET['ip'] or '198.23.249.216';
echo PHP_EOL;
echo "查询IP：{$ip}" . PHP_EOL."<br>";
$info = $ip2region->btreeSearch($ip);
var_export($info);

echo PHP_EOL."<br>";
$info = $ip2region->memorySearch($ip);
var_export($info);
echo PHP_EOL."<br>";

// array (
//     'city_id' => 1713,
//     'region' => '中国|0|广东省|广州市|电信',
// )