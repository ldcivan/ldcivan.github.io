<?php
	define('PATH',dirname($_SERVER['SCRIPT_NAME']));				//聊天室目录
	define('CHAT_NAME','Pro-Ivan反馈区');			//聊天室名称
	define("MESS", "mess.txt");					//聊天信息	
	define("PERSON", "person.txt");				//在线人名单
	define("RETIME",3);							//刷新时间
	define("LINE",20);							//公共窗口显示的行数
	define("PRLINE",5);							//私聊窗口显示的行数
	define("MAX",50);							//聊天室人数限制
	define("MAXTIME",60000000);					//最大不发言时间，单位是毫秒
	define("WELCOME","<font color=blue>欢迎来到".CHAT_NAME."。您提交反馈后，请不要点击退出聊天室而是请直接关闭页面，否则您将无法看到我们的回复。我们将尽快回复您的需求。</font>");		//欢迎语
?>