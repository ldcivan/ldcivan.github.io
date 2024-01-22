<?php
session_start();
//记录来自哪个界面
if(strpos($_SERVER['HTTP_REFERER'], "process.php") === false){
    $current_page = 'http';
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $current_page .= "s";
    }
    $current_page .= "://";
    if ($_SERVER['SERVER_PORT'] != '80') {
        $current_page .= $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
    } else {
        $current_page .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }
    $_SESSION['comeFrom'] = $current_page;
}
if (!isset($_SESSION['visited'])) {
  header("Location:/antiBot/");
  exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="/favicon.ico">
        <title>笨蛋芙宁娜-renard-Pro_Ivan的库-漫画</title>
    <script data-ad-client="ca-pub-7032143093958237" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="stylesheet" href="/new-js/index.css">
	<script type="text/javascript">

            var arr = new Array();//路径！！！！！！！！
            arr[0] = "00.jpg!w1250";
            arr[1] = "01.jpg!w1250";
            arr[2] = "02.jpg!w1250";
            arr[3] = "03.jpg!w1250";
            arr[4] = "04.jpg!w1250";
            arr[5] = "05.jpg!w1250";
            arr[6] = "06.jpg!w1250";
            arr[7] = "07.jpg!w1250";
            arr[8] = "08.jpg!w1250";
            arr[9] = "09.jpg!w1250";
            arr[10] = "10.jpg!w1250";
            arr[11] = "11.jpg!w1250";
            arr[12] = "12.jpg!w1250";
            arr[13] = "13.jpg!w1250";
            var index = 0;
	    function var2pass() {
            	document.getElementById('textfield').value = index+1;}
            function upNext(bigimg) {
            var action;
            var width = bigimg.width;
            var height = bigimg.height;
            bigimg.onmousemove = function () {
		action="null";
                if (window.event.offsetX < width / 2 && index != 0) {
                    action = 'left'
                    bigimg.style.cursor = 'url(/mangahtml/cur/left.cur),auto';//将鼠标指针更换成向左指向箭头
                } 
                else if (window.event.offsetX >= width / 2 && index != arr.length-1){//数字！！！！！！
                    bigimg.style.cursor = 'url(/mangahtml/cur/right.cur),auto';
                    action = 'right';
                }
		else {
		    bigimg.style.cursor = 'url(/mangahtml/cur/wrong.cur),auto';
		}
            }
            bigimg.onmouseup = function () {
                if (action=="left") {
                   if(index==0)
                       return ;
                   else
                       index--;
                }
                else if(action=="right") {
                  if(index == arr.length-1)//数字！！！！！！
                    return;
                  else
                      index ++ ;
                }
		else
		    return;
                this.src = 'http://us.pro-ivan.com/imgbed/manga/Foorina_renard/'+arr[index];//路径！！！！！！！！
		document.getElementById('textfield').value = index+1;
		document.getElementById('textfield2').value = index+1;
		document.getElementById('bigimg').scrollIntoView({ block: 'start', behavior: 'smooth' });

            }
        }
	function turnpage() {
    	    index = document.getElementById('textfield').value-1;
	    document.getElementById('textfield2').value = index+1;
	    bigimg.src = 'http://us.pro-ivan.com/imgbed/manga/Foorina_renard/'+arr[index];
	    document.getElementById('bigimg').scrollIntoView({ block: 'start', behavior: 'smooth' });}//路径！！！！！！！！
	function turnpage2() {
    	    index = document.getElementById('textfield2').value-1;
	    document.getElementById('textfield').value = index+1;
	    bigimg.src = 'http://us.pro-ivan.com/imgbed/manga/Foorina_renard/'+arr[index];
	    document.getElementById('bigimg').scrollIntoView({ block: 'start', behavior: 'smooth' });}//路径！！！！！！！！

        </script>

	<script type="text/javascript">
	function display_alert()
       {
            alert("评论成功!!请注意，您的评论可能不会立刻出现在下方栏框!")
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

    <body  bgcolor=#FAFAFA>
        <center>
	<h1>笨蛋芙宁娜-renard</h1>
	<font size="2" color="#000000">可能的话，请在<a href="https://www.pixiv.net/users/13710050">Pixiv</a>支持原作者@renard！</font><br><b style="color:red;">公开场合讨论本子并不光荣！<br>转载请保留作者信息！</b><br><br>

	<form>
		第
    		<input type="text" name="textfield" id="textfield" size="3" value="1" oninput="value=value.replace(/[^\d]/g,'')">页 共<div id="page1" style="display:inline-block; "></div>页<!--数字！！！-->
		<input type="button" name="button2" id="button2" value="翻页" onclick="javascript: void turnpage();" >
    	</form>
	<button onclick="window.location.href = '../new.html'">返回主页</button>   <button onclick="window.location.href = '../new-comic.php'">返回漫画主页</button><br><br>



        <div>
            <img src="" id = "bigimg" onmouseover="upNext(this)" width="75%" style="max-width: 960px;"><!--//路径！！！！！！！！-->
        </div><br>

	<form>
		第
    		<input type="text" name="textfield2" id="textfield2" size="3" value="1" oninput="value=value.replace(/[^\d]/g,'')">页 共<div id="page2" style="display:inline-block; "></div>页<!--数字！！！-->
		<input type="button" name="button3" id="button3" value="翻页" onclick="javascript: void turnpage2();" >
    	</form>
	<button onclick="window.location.href = '../new.html'">返回主页</button>   <button onclick="window.location.href = '../new-comic.php'">返回漫画主页</button><br>


	<HR style="FILTER:alpha(opacity=100,finishopacity=0,style=3)" width="80%" color=#C0C0C0 SIZE=3>

	<div id="ct1"><h3>留言板</h3></div>
	<form action="./comment/comment.php" method="post">
            昵称:<input type="text" name="channel0Title" placeholder="请输入昵称(小于25字)" required="required" maxlength="25"><br>
    	    评论:<input type="text" name="channel0Gain" placeholder="要讲文明哟~(小于200字)" required="required" maxlength="200"><br>
    	    电邮:<input type="text" name="contact" placeholder="或者其他联系方式（选填）" maxlength="200"><br>
            <input type="submit" id ="submitButton" value="发送" onclick="display_alert()">
        </form>

	<embed src="./comment/comment.txt" width="50%"/>

	<HR style="FILTER:alpha(opacity=100,finishopacity=0,style=3)" width="80%" color=#C0C0C0 SIZE=3><br>	

	<div id="main1" style="color:#FF7C00" onclick="document.all.child1.style.display=(document.all.child1.style.display =='none')?'':'none'" >
	可以……给口饭吃吗？(click me)</div>
	<div id="child1" style="display:none">
        <br>
	<img src="../sponsor/weixin.webp" alt="weixin" width="15%">
	<img src="../sponsor/alipay.webp" alt="alipay" width="15%"><br><br>
	<font size="3" color="#808080">服务器的运作需要一定的资金，如果您能赞助哪怕是一角一分钱，我们也会感到非常感谢的！</font>
	</div>
        <br><br>

        <img src="/Ivan.svg" alt="Ivan社徽" width="25%"><br>
        <font size="5" color="#000000">----Pro-Ivan数字库-漫画----</font><br>
        <font size="2" color="#C0C0C0">如出现异常，请 电邮至ldcivan@foxmail.com 或 前往<a href="https://space.bilibili.com/11022578"><font size="2" color="#808080">Bilibili</font></a>与我们联系</font><br>

        </center>
    <script>
        document.getElementById('page1').innerHTML = arr.length;
        document.getElementById('page2').innerHTML = arr.length;
        document.getElementById('bigimg').src = 'http://us.pro-ivan.com/imgbed/manga/Foorina_renard/' + arr[0];
    </script>
    </body>
</html>