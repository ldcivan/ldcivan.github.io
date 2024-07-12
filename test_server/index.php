<head><title>ServerTest</title></head>
<?php
    echo "PHP and Apache OK!<br><br>";
    include('test_mongodb.php');
    include('test_mysql.php');
    include('test_redis.php');
    include('test_sockets.php');
    include('test_ping.php');
?>