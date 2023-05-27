<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线反馈</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script language="javascript">
window.onload = function(){
	document.getElementById('lgbtn').onclick = function(){
		name = document.getElementById('user').value;
		name = name.replace(/\s*/,'');	//匹配空格^\s*和\s*$来匹配前导空格或结束空格。
		if(name == ''){
			alert('请输入昵称');
			form.user.focus();
			return false;
		}
		url = '<?php echo $_SERVER['SCRIPT_NAME']; ?>?user='+name+'&sex='+document.getElementById('sex').value;
		location=url;
	}
}
</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?90415f833f988b0bccfb250d70f115f6";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
	<div id="header"></div><br><br>
	<div id="inputdiv">
		<div id="namediv">
		  <input type="text" id="user" />
		</div>
		<div id="malediv">
	    <Input id="sex" name="sex" type="radio" checked="checked" value="1" /></div>
		
		<div id="btndiv"><button id="lgbtn">&nbsp;</button></div>
	</div>
	<div id="bottomdiv">因移动端可能弹不出反馈界面，请尽量使用电脑端进入<br>Pro-Ivan All Rights Reserved 2021</div>
<?php
	include_once 'config.php';
	include_once 'func.php';
	$user = $_GET['user'];
	$sex = $_GET['sex'];
	//判断是否有信息输入
	if(!is_null($user) and !empty($user)){	
		if(getRows(PERSON) >= MAX){
?>
<script language="javascript">
	alert('聊天室人数以达到上线');
</script>
<?php
			exit();
		}
		$boo = chklogin(PERSON,$user);
		if(true == $boo){
?>
<script language="javascript">
	alert('昵称被占用，请输入新昵称');
</script>
<?php
				exit();
		}
		if($_SERVER['REMOTE_ADDR'] != ''){
			$ip = $_SERVER['REMOTE_ADDR'];
		}else if($_SESSION['HTTP_HOST'] != ''){
			$ip = $_SERVER['HTTP_HOST'];
		}else{
			$ip = 'unknow';
		}
		$boo = addlogin(PERSON,$user,$ip,$sex);
		if($boo){
			$_SESSION['user'] = $user;
			$_SESSION['per'] = array('所有人');
			$allper = storeuser(PERSON);
			foreach($allper as $value){
				$tmparr = explode(',',$value);
				$_SESSION['per'][]=$tmparr[0];
			}
			$_SESSION['pubnum'] = getRows(MESS);
			$newline = '[<font color="pink">系统公告</font>]： <font color="#233sde">'.$user.'</font> 已登录&nbsp;[<font color=brown>'.date('H:i:s').'</font>]';
			$boo = addmess(MESS,$newline);
			if(!is_dir($priv)){
				mkdir('$priv');
			}
			$tmp = 'priv/'.$user;
			if(!file_exists($tmp)){
				file_put_contents($tmp,chr(13).chr(10));
			}
			if($boo){	
				echo "<script>window.open('main.php','chat','width=1000 height=600');</script>";
				//echo "<script>window.opener=null;window.close();</script>";
				$url = "http://pro-ivan.cn/"; 
				echo "<script language='javascript' type='text/javascript'>";
				echo "window.location.href='$url'";
				echo "</script>";
			}
		}
	}		
?>
</body>
</html>