<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="醒爷版本的通过点击/触摸播放声音并出现变化图案的互动内容。">
  <title>Xingtap</title>
  <link rel="apple-touch-icon" href="icon.png">
  <link href="css/css.css" rel="stylesheet">
  <link charset="UTF-8" href="shared/sp/css/common.css" rel="stylesheet">
  <link charset="utf-8" href="css/mikutap.css" rel="stylesheet">
  <script charset="utf-8" src="js/jquery.min.js" type="text/javascript"></script>
  <script charset="utf-8" src="js/pixi.min.js" type="text/javascript"></script>
  <script charset="utf-8" src="js/gsap.min.js" type="text/javascript"></script>
  <script charset="UTF-8" src="shared/js/common-2.min.js" type="text/javascript"></script>
  <script charset="utf-8" src="js/mikutap.js" type="text/javascript"></script>
        <script>
	var _hmt = _hmt || [];
	(function() {
 	 var hm = document.createElement("script");
 	 hm.src = "https://hm.baidu.com/hm.js?90415f833f988b0bccfb250d70f115f6";
 	 var s = document.getElementsByTagName("script")[0]; 
 	 s.parentNode.insertBefore(hm, s);
	})();
	</script>

	<script>
	var _hmt = _hmt || [];
	(function() {
  	var hm = document.createElement("script");
  	hm.src = "https://hm.baidu.com/hm.js?c5159aad9b86928a0939a65d7675e2df";
  	var s = document.getElementsByTagName("script")[0]; 
  	s.parentNode.insertBefore(hm, s);
	})();
	</script>
</head>

<body>
  <div id="view"></div>
  <div id="scene_top">
    <h1>Xingtap</h1>
    <h3>注意!我代碼很爛，加載可能稍慢。那是正常的。</h3><br>
    <div id="ng">
      <p class="atten">十分抱歉<br>您的浏览器并不支持本页面需要的特性</p>
    </div>
    <div class="ok">
      <p id="bt_start"><a href="">!開始!</a></p>
    </div>
    <p id="bt_about"><a href="">*關於*</a></p>
    <div class="ok">
      <p class="attention">※请打开声音并"享受"</p>
    </div>
     <div class="ok">
     <p class="tit"><strong>注意！此爲改編内容，本家: <a href="https://aidn.jp/mikutap"><font color="#F0F0F0">https://aidn.jp/mikutap</font></a></strong></p>
    </div>
  </div>
  <div id="scene_loading">
    <hr size="1" color="#fff"> </div>
  <div id="scene_main">
    <div class="set">
      <p class="attention">點擊 &amp; 拖動或按下任意按鍵!</p>
      <p id="bt_feedback"><a href="">反饋: 開啓</a></p>
      <p id="bt_backtrack"><a href="">背景音樂: 開啓</a></p>
    </div>
  </div>
  <div id="about_cover"></div>
  <div id="about">
    <div id="about_in">
      <p class="close"><span id="bt_close">×</span></p>
      <p class="con"> 聲音來源 <a href="https://space.bilibili.com/2100679/" target="_blank">Xing</a> </p>
      <p class="con"> 本家 <a href="https://aidn.jp" target="_blank">daniwell</a> (<a href="https://twitter.com/daniwell_aidn" target="_blank">twitter</a>) </p>
      <p class="link"> 本家的灵感来源 <a href="http://patatap.com/" target="_blank">Patatap</a><br>(令人赞叹的网页!)</p>
    </div>
  </div>
  <div id="bt_back">＜返回</div>
  <div id="bt_fs">□全屏顯示</div>
</body>

</html>
