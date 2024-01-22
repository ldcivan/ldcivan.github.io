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
        <title>甘雨&刻晴!-まいたけ-Pro_Ivan的库-漫画</title>
    <script data-ad-client="ca-pub-7032143093958237" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link rel="stylesheet" href="/new-js/index.css">
	<script type="text/javascript">

            var arr = new Array();//路径！！！！！！！！
            arr[0] = "00.jpg";
            arr[1] = "01.jpg";
            arr[2] = "02.jpg";
            arr[3] = "03.jpg";
            arr[4] = "04.jpg";
            arr[5] = "05.jpg";
            arr[6] = "06.jpg";
            arr[7] = "07.jpg";
            arr[8] = "08.jpg";
            arr[9] = "09.jpg";
            arr[10] = "10.jpg";
            arr[11] = "11.jpg";
            arr[12] = "12.jpg";
            arr[13] = "13.jpg";
            arr[14] = "14.jpg";
            arr[15] = "15.jpg";
            arr[16] = "16.jpg";
            arr[17] = "17.jpg";
            arr[18] = "18.jpg";
            arr[19] = "19.jpg";
            arr[20] = "20.jpg";
            arr[21] = "21.jpg";
            arr[22] = "22.jpg";
            arr[23] = "23.jpg";
            arr[24] = "24.jpg";
            arr[25] = "25.jpg";
            arr[26] = "26.jpg";
            arr[27] = "27.jpg";
            arr[28] = "28.jpg";
            arr[29] = "29.jpg";
            arr[30] = "30.jpg";
            arr[31] = "31.jpg";
            arr[32] = "32.jpg";
            arr[33] = "33.jpg";
            arr[34] = "34.jpg";
            arr[35] = "35.jpg";
            arr[36] = "36.jpg";
            arr[37] = "37.jpg";
            arr[38] = "38.jpg";
            arr[39] = "39.jpg";
            arr[40] = "40.jpg";
            arr[41] = "41.jpg";
            arr[42] = "42.jpg";
            arr[43] = "43.jpg";
            arr[44] = "44.jpg";
            arr[45] = "45.jpg";
            arr[46] = "46.jpg";
            arr[47] = "47.jpg";
            arr[48] = "48.jpg";
            arr[49] = "49.jpg";
            arr[50] = "50.jpg";
            arr[51] = "51.jpg";
            arr[52] = "52.jpg";
            arr[53] = "53.jpg";
            arr[54] = "54.jpg";
            arr[55] = "55.jpg";
            arr[56] = "56.jpg";
            arr[57] = "57.jpg";
            arr[58] = "58.jpg";
            arr[59] = "59.jpg";
            arr[60] = "60.jpg";
            arr[61] = "61.jpg";
            arr[62] = "62.jpg";
            arr[63] = "63.jpg";
            arr[64] = "64.jpg";
            arr[65] = "65.jpg";
            arr[66] = "66.jpg";
            arr[67] = "67.jpg";
            arr[68] = "68.jpg";
            arr[69] = "69.jpg";
            arr[70] = "70.jpg";
            arr[71] = "71.jpg";
            arr[72] = "72.jpg";
            arr[73] = "73.jpg";
            arr[74] = "74.jpg";
            arr[75] = "75.jpg";
            arr[76] = "76.jpg";
            arr[77] = "77.jpg";
            arr[78] = "78.jpg";
            arr[79] = "79.jpg";
            arr[80] = "80.jpg";
            arr[81] = "81.jpg";
            arr[82] = "82.jpg";
            arr[83] = "83.jpg";
            arr[84] = "84.jpg";
            arr[85] = "85.jpg";
            arr[86] = "86.jpg";
            arr[87] = "87.jpg";
            arr[88] = "88.jpg";
            arr[89] = "89.jpg";
            arr[90] = "90.jpg";
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
                this.src = 'http://us.pro-ivan.com/imgbed/manga/KeqingGanyu_Maitake/'+arr[index];//路径！！！！！！！！
		document.getElementById('textfield').value = index+1;
		document.getElementById('textfield2').value = index+1;
		document.getElementById('bigimg').scrollIntoView({ block: 'start', behavior: 'smooth' });

            }
        }
	function turnpage() {
    	    index = document.getElementById('textfield').value-1;
	    document.getElementById('textfield2').value = index+1;
	    bigimg.src = 'http://us.pro-ivan.com/imgbed/manga/KeqingGanyu_Maitake/'+arr[index];
	    document.getElementById('bigimg').scrollIntoView({ block: 'start', behavior: 'smooth' });}//路径！！！！！！！！
	function turnpage2() {
    	    index = document.getElementById('textfield2').value-1;
	    document.getElementById('textfield').value = index+1;
	    bigimg.src = 'http://us.pro-ivan.com/imgbed/manga/KeqingGanyu_Maitake/'+arr[index];
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
	<h1>甘雨&刻晴!-まいたけ</h1>
	<font size="2" color="#000000">可能的话，请在Twitter支持原作者<a href="https://twitter.com/maitakenabe">@maitakenabe</a>！</font><br><b style="color:red;">转载请保留作者信息！</b><br><br>

	<form>
		第
    		<input type="text" name="textfield" id="textfield" size="3" value="1" oninput="value=value.replace(/[^\d]/g,'')">页 共<div id="page1" style="display:inline-block; "></div>页<!--数字！！！-->
		<input type="button" name="button2" id="button2" value="翻页" onclick="javascript: void turnpage();" >
    	</form>
	<button onclick="window.location.href = '../new.html'">返回主页</button>   <button onclick="window.location.href = '../new-comic.php'">返回漫画主页</button><br><br>



        <div>
            <img src="http://us.pro-ivan.com/imgbed/manga/KeqingGanyu_Maitake/00.jpg" id = "bigimg" onmouseover="upNext(this)" width="75%" style="max-width: 960px;"><!--//路径！！！！！！！！-->
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
    </script>
    </body>
</html>