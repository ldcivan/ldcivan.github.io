<?php
	session_start();
	header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 12px;
	margin-top: 12px;
}
-->
</style>
<?php
	if(!isset($_SESSION['user']) or empty($_SESSION['user'])){
		include_once 'login.php';
	}else{
?>
<script>open('main.php','chat','width=1000,height=800,fullscreen=1,location=0,menubar=yes');</script>
<?php
	}
?>
</html>