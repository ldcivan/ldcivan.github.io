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
        <title>你是赛马娘 IF 训练员变成赛马娘的故事-琥珀ノカケラ (湯猫子)-Pro_Ivan的库-漫画</title>
    <script data-ad-client="ca-pub-7032143093958237" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="stylesheet" href="/new-js/index.css">
	<script type="text/javascript">

            var arr = new Array();//路径！！！！！！！！
            arr[0] = "00.png";
            arr[1] = "01.png";
            arr[2] = "02.png";
            arr[3] = "03.png";
            arr[4] = "04.png";
            arr[5] = "05.png";
            arr[6] = "06.png";
            arr[7] = "07.png";
            arr[8] = "08.png";
            arr[9] = "09.png";
            arr[10] = "10.png";
            arr[11] = "11.png";
            arr[12] = "12.png";
            arr[13] = "13.png";
            arr[14] = "14.png";
            arr[15] = "15.png";
            arr[16] = "16.png";
            arr[17] = "17.png";
            arr[18] = "18.png";
            arr[19] = "19.png";
            arr[20] = "20.png";
            arr[21] = "21.png";
            arr[22] = "22.png";
            arr[23] = "23.png";
            arr[24] = "24.png";
            arr[25] = "25.png";
            arr[26] = "26.png";
            arr[27] = "27.png";
            arr[28] = "28.png";
            arr[29] = "29.png";
            arr[30] = "30.png";
            arr[31] = "31.png";
            arr[32] = "32.png";
            arr[33] = "33.png";
            arr[34] = "34.png";
            arr[35] = "35.png";
            arr[36] = "36.png";
            arr[37] = "37.png";
            arr[38] = "38.png";
            arr[39] = "39.png";
            arr[40] = "40.png";
            arr[41] = "41.png";
            arr[42] = "42.png";
            arr[43] = "43.png";
            arr[44] = "44.png";
            arr[45] = "45.png";
            arr[46] = "46.png";
            arr[47] = "47.png";
            arr[48] = "48.png";
            arr[49] = "49.png";
            arr[50] = "50.png";
            arr[51] = "51.png";
            arr[52] = "52.png";
            arr[53] = "53.png";
            arr[54] = "54.png";
            arr[55] = "55.png";
            arr[56] = "56.png";
            arr[57] = "57.png";
            arr[58] = "58.png";
            arr[59] = "59.png";
            arr[60] = "60.png";
            arr[61] = "61.png";
            arr[62] = "62.png";
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
                this.src = 'http://us.pro-ivan.com/imgbed/manga/KimiwaUma_Yunyanko/'+arr[index];//路径！！！！！！！！
		document.getElementById('textfield').value = index+1;
		document.getElementById('textfield2').value = index+1;
		document.getElementById('bigimg').scrollIntoView({ block: 'start', behavior: 'smooth' });

            }
        }
	function turnpage() {
    	    index = document.getElementById('textfield').value-1;
	    document.getElementById('textfield2').value = index+1;
	    bigimg.src = 'http://us.pro-ivan.com/imgbed/manga/KimiwaUma_Yunyanko/'+arr[index];
	    document.getElementById('bigimg').scrollIntoView({ block: 'start', behavior: 'smooth' });}//路径！！！！！！！！
	function turnpage2() {
    	    index = document.getElementById('textfield2').value-1;
	    document.getElementById('textfield').value = index+1;
	    bigimg.src = 'http://us.pro-ivan.com/imgbed/manga/KimiwaUma_Yunyanko/'+arr[index];
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
	<h1>你是赛马娘 IF 训练员变成赛马娘的故事-琥珀ノカケラ (湯猫子)</h1>
	<font size="2" color="#000000">可能的话，请在<a href="https://www.dlsite.com/home/work/=/product_id/RJ01005865.html">DLsite</a>支持原作者！</font><br><b style="color:red;">转载请保留作者信息！</b><br><br>

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
        document.getElementById('bigimg').src = 'http://us.pro-ivan.com/imgbed/manga/KimiwaUma_Yunyanko/' + arr[0];
    </script>
    </body>
</html>