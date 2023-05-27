<!doctype html>
<html lang="zh-cmn-Hans">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
		<meta name="renderer" content="webkit" />
		<meta name="force-rendering" content="webkit" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="./mdui/css/mdui.css" />
		<link rel="stylesheet" href="./new-js/index.css">
		<title>Pro-Ivan数字库-建设中</title>
		<script type="text/javascript">  
            function disptime(){  
                var today=new Date();
                var yy=today.getYear()+1900;
                var MM=today.getMonth()+1;
                var dd=today.getDate();
                var hh=today.getHours();  
                var mm=today.getMinutes();  
                var ss = today.getSeconds();  
                document.getElementById("myclock").innerHTML="<h5>现在是"+yy+"年"+MM+"月"+dd+"日 "+hh+":"+mm+":"+ss+",欢迎您来到本页面！</h5>"  
                 
            }   
            //setInterval（）方法可以按照指定的周期调用函数或计算表达式  
            var mytime = setInterval("disptime()",1000);  
        </script>  
		<script type="text/javascript">
            function AddFavorite(url,title){
             var ua = navigator.userAgent.toLowerCase();
             if(ua.indexOf("msie 8")>-1){
              external.AddToFavoritesBar(url,title,"");//IE8
              }else{
              try {
              window.external.addFavorite(url, title);
              } catch(e) {
              try {
              window.sidebar.addPanel(title, url, "");//firefox
              } catch(e) {
              alert("加入收藏失败，请使用Ctrl+D或手动进行添加");
              }
              }
              }
              return false;
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
	<body class="mdui-drawer-body-left mdui-theme-primary-light-blue">
		<div class="mdui-drawer" id="left-drawer" style="z-index:3000;">
			<img src="./Ivan.png" style="max-width: 100%; max-height: 100%;">
			<ul class="mdui-list">
				<li class="mdui-list-item mdui-ripple" onclick="home()">
					<i class="mdui-list-item-icon mdui-icon material-icons">home</i>
					<div class="mdui-list-item-content">主页</div>
				</li>
				<li class="mdui-list-item mdui-ripple" mdui-dialog="{target: '#announcement'}">
					<i class="mdui-list-item-icon mdui-icon material-icons">message</i>
					<div class="mdui-list-item-content">公告</div>
				</li>
				<li class="mdui-list-item mdui-ripple" mdui-dialog="{target: '#support'}">
					<i class="mdui-list-item-icon mdui-icon material-icons">account_balance_wallet</i>
					<div class="mdui-list-item-content">支持我们</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="imgs()">
					<i class="mdui-list-item-icon mdui-icon material-icons">image</i>
					<div class="mdui-list-item-content">图库</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="comic()">
					<i class="mdui-list-item-icon mdui-icon material-icons">book</i>
					<div class="mdui-list-item-content">漫画</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="img_bed()">
					<i class="mdui-list-item-icon mdui-icon material-icons">cloud_queue</i>
					<div class="mdui-list-item-content">图床</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="little_game()">
					<i class="mdui-list-item-icon mdui-icon material-icons">extension</i>
					<div class="mdui-list-item-content">小游戏</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="bfanscount()">
					<i class="mdui-list-item-icon mdui-icon material-icons">people</i>
					<div class="mdui-list-item-content">Bilibili粉丝量监视</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="about()">
					<i class="mdui-list-item-icon mdui-icon material-icons">face</i>
					<div class="mdui-list-item-content">关于我们</div>
				</li>
			</ul>
		</div>
		<div class="mdui-dialog" id="announcement">
			<div class="mdui-dialog-title">公告</div>
			<div class="mdui-dialog-content">
				<div id="GG"></div>
				<hr>
				Tip：当加载过慢时，您可以切换线路:
				<br>
        <div id="btn-s-5">
			<button class="mdui-btn mdui-ripple mdui-color-theme mdui-text-color-white" onclick="line_1()">线路1</button>
			<button class="mdui-btn mdui-ripple mdui-color-theme mdui-text-color-white" onclick="line_2()">线路2</button>
			<button class="mdui-btn mdui-ripple mdui-color-theme mdui-text-color-white" onclick="line_3()">线路3</button>
			<button class="mdui-btn mdui-ripple mdui-color-theme mdui-text-color-white" onclick="line_4()">线路4</button>
			<button class="mdui-btn mdui-ripple mdui-color-theme mdui-text-color-white" onclick="line_5()">线路5</button>
        </div>
			</div>
			<div class="mdui-dialog-actions">
				<button class="mdui-btn mdui-ripple mdui-text-color-theme mdui-text-color-white" mdui-dialog-close >关闭</button>
			</div>
		</div>
		<div class="mdui-dialog" id="support">
			<div class="mdui-dialog-title">支持我们</div>
			<div class="mdui-dialog-content">
                如果您有能力，还请多多支持我们！
				<br>
				<img src="/sponsor/weixin.jpg" class="support-img" width="48%" />
				<img src="/sponsor/alipay.jpg" class="support-img" width="48%" style="margin-left:2%;"/>
			</div>
			<div class="mdui-dialog-actions">
				<button class="mdui-btn mdui-ripple mdui-text-color-theme mdui-text-color-white" mdui-dialog-close >关闭</button>
			</div>
		</div>
		<div class="mdui-appbar">
			<div class="mdui-toolbar mdui-color-theme" style="position:fixed;z-index:1000;margin-top:-15px;" mdui-headroom>
				<a href="javascript:;" mdui-drawer="{target: '#left-drawer'}" class="mdui-btn mdui-btn-icon">
					<i class="mdui-icon material-icons">menu</i>
				</a>
				<a href="/new.html" class="mdui-typo-headline">Pro-Ivan数字库-建设中</a>
				<div class="mdui-toolbar-spacer"></div>
				<a href="javascript:AddFavorite('http://pro-ivan.cn','Pro-Ivan');" class="mdui-btn mdui-btn-icon">
					<i class="mdui-icon material-icons" mdui-tooltip="{content: '收藏本页'}">star</i>
				</a>
			</div>
		</div>
		<div id="body">
		   <div class="mdui-toolbar"></div>
		   <p style="margin-left:40px;">Now building... Coming soon</p>
		</div>
		</body>
	<footer><div id="footer"></div></footer>
	<script src="./mdui/js/mdui.min.js"></script>
	<script src="./new-js/index.js"></script>
</html>
<!--


       $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
      $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$  
      $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$  
       $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$  
           $$$$$$$$ 
           $$$$$$$$ 
           $$$$$$$$  $$$$$$          $$$$$$$$$$      $$$$$$$        $$$$$
           $$$$$$$$   $$$$$$        $$$$$$$$$$$$     $$$$$$$$       $$$$$ 
           $$$$$$$$   $$$$$$        $$$$$$  $$$$$    $$$$$$$$$      $$$$$        
           $$$$$$$$    $$$$$$      $$$$$$    $$$$$   $$$$$$$$$$$    $$$$$
           $$$$$$$$     $$$$$$    $$$$$$      $$$$$  $$$$$ $$$$$$   $$$$$        
           $$$$$$$$      $$$$$$  $$$$$$$$$$$$$$$$$$$ $$$$$  $$$$$$  $$$$$       
           $$$$$$$$       $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$    $$$$$ $$$$$  
           $$$$$$$$       $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     $$$$$$$$$$
           $$$$$$$$        $$$$$$$$$$            $$$$$$$$$      $$$$$$$$$ 
           $$$$$$$$         $$$$$$$$              $$$$$$$$        $$$$$$$
           $$$$$$$$          $$$$$$                $$$$$$$         $$$$$$ 
           $$$$$$$$ 
           $$$$$$$$                                                        
           $$$$$$$$   $$$$$$$  $$$$$$$$    $$$$$$   $$$$$$$  $$$$     $$$$$$  $$$$$$$$$       
           $$$$$$$$   $$$$$$$$ $$$$$$$$$  $$$ $$$$ $$$$$$$$ $$$$$$   $$$  $$  $$$$$$$$$       
           $$$$$$$$   $$$  $$$ $$$   $$$ $$$   $$$    $$$   $$ $$$  $$$       $  $$$  $       
           $$$$$$$$   $$$$$$$$ $$$$$$$$$ $$$   $$$    $$$  $$   $$  $$$    $     $$$          
           $$$$$$$$   $$$$$$$  $$$$$$$    $$$ $$$$ $  $$$ $$$$$$$$$  $$$  $$     $$$         
           $$$$$$$$   $$$   $$ $$$ $$$$$  $$$$$$$  $$$$$$ $$    $$$  $$$$$$$     $$$             
           $$$$$$$$   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$         
        $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
       $$$$$$$$$$$$$$$   
        $$$$$$$$$$$$$ 

WELCOME to BACKSTAGE! MY FRIEND!!!

Pro-Ivan All Right Reserve · ROID: 20211114s10001s41369525-cn



-->