<?php
	session_start();
	include_once 'config.php';
	include_once 'func.php';
	$user = $_SESSION['user'];
	deluser(PERSON,$user);
	$newline = '[<font color=pink>系统公告</font>] <font color=blue>'.$user.'</font> 已登出"&nbsp;[<font color=brown>'.date('H:i:s').'</font>]';
	addmess(MESS,$newline);
	unlink('priv/'.$user);
	session_destroy();
?>
<script>
window.close();
</script>