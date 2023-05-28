<?php
/*
* Change the value of $password if you have set a password on the root userid
* Change NULL to port number to use DBMS other than the default using port 3306
*
*/
$user = 'root';
$password = 'Ldc123456'; //To be completed if you have set a password to root
$database = ''; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
echo 'Connection OK '. $mysqli->host_info.'<br>';
echo 'Server '.$mysqli->server_info.'<br>';
echo 'Initial charset: '.$mysqli->character_set_name().'<br>';
echo 'Mysql Database OK!<br><br/>';

$mysqli->close();
?>
