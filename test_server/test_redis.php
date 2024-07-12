<?php
    //连接本地的 Redis 服务
   $redis = new Redis();
   # 连接的IP 地址，端口号
   $redis->connect('127.0.0.1', 6379);   
   echo "Connection to server sucessfully" .PHP_EOL;
    //查看服务是否运行
   echo "<br/>Server is running: " .$redis->ping();
   echo "<br/>Redis Database OK!<br/><br>";
?>
