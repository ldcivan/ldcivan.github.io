<!doctype html>
<html lang="zh-cmn-Hans">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="0; url='../bilibili'">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
		<meta name="renderer" content="webkit" />
		<meta name="force-rendering" content="webkit" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="stylesheet" href="/mdui/css/mdui.css" />
		<link rel="stylesheet" href="/new-js/index.css">
		<title>Pro-Ivan数字库-哔哩哔哩粉丝量观测</title>
		<meta name="keywords" content="动漫图片 动漫资讯">
		<meta name="description" content="技术宅社团，什么活都整！">
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
	<body class="mdui-drawer-body-left mdui-theme-primary-light-blue mdui-theme-accent-light-blue">
		<div class="mdui-drawer" id="left-drawer" style="z-index:3000;">
			<img src="/Ivan.png" style="max-width: 100%; max-height: 100%;">
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
				<li class="mdui-list-item mdui-ripple" onclick="download()">
					<i class="mdui-list-item-icon mdui-icon material-icons">file_download</i>
					<div class="mdui-list-item-content">下载站</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="little_game()">
					<i class="mdui-list-item-icon mdui-icon material-icons">extension</i>
					<div class="mdui-list-item-content">小游戏</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="bfanscount()">
					<i class="mdui-list-item-icon mdui-icon material-icons">people</i>
					<div class="mdui-list-item-content">Bilibili粉丝量观测</div>
				</li>
				<li class="mdui-list-item mdui-ripple" onclick="api()">
					<i class="mdui-list-item-icon mdui-icon material-icons">leak_add</i>
					<div class="mdui-list-item-content">Api接口</div>
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
				<img src="/sponsor/weixin.webp" class="support-img" width="48%" />
				<img src="/sponsor/alipay.webp" class="support-img" width="48%" style="margin-left:2%;"/>
			</div>
			<div class="mdui-dialog-actions">
				<button class="mdui-btn mdui-ripple mdui-text-color-theme mdui-text-color-white" mdui-dialog-close >关闭</button>
			</div>
		</div>
		</div>
		<div class="mdui-appbar">
			<div class="mdui-toolbar mdui-color-theme" style="position:fixed;z-index:1000;margin-top:-75px;" mdui-headroom>
				<a href="javascript:;" mdui-drawer="{target: '#left-drawer'}" class="mdui-btn mdui-btn-icon">
					<i class="mdui-icon material-icons">menu</i>
				</a>
				<a href="/new.html" class="mdui-typo-headline">Pro-Ivan数字库-哔哩哔哩粉丝量监视</a>
				<div class="mdui-toolbar-spacer"></div>
				<a href="javascript:AddFavorite('http://pro-ivan.cn','Pro-Ivan');" class="mdui-btn mdui-btn-icon">
					<i class="mdui-icon material-icons" mdui-tooltip="{content: '收藏本页'}">star</i>
				</a>
			</div>
		</div>
		<div id="body">
		    <div class="mdui-panel" style="margin-top:70px">
		        <div class="mdui-panel-item">
		            <div class="mdui-panel-item-header" style="pointer-events:none;">
						<div class="mdui-panel-item-title"><b>搜索器</b></div>
						<div class="mdui-panel-item-summary"></div>
					</div>
					<div class="mdui-panel-item-body mdui-text-color-white-text" style="height:auto!important;">
                          <form class="mdui-textfield mdui-textfield-floating-label" action="" method="post" style="margin-right:23px;">
                              <i class="mdui-icon material-icons">account_circle</i>
                              <label class="mdui-textfield-label">目标uid或昵称</label>
                              <input class="mdui-textfield-input" type="text" name="key"/>
                              <div class="mdui-textfield-helper">注意区分大小写，搜索不到可在留言区要求添加监控对象<br>建议搜索uid以免目标改名造成的数据缺失</div>
                              <input id="search" class="mdui-btn mdui-color-theme mdui-text-color-white-text" type="submit" name="sub" value=" 查 找 " style="display:none;" />
                          </form>
                          <button class="mdui-btn mdui-color-theme mdui-text-color-white-text" onclick="document.getElementById('search').click()" style="margin-right:24px;float:right;"> 查 找 </button><br>
    		            <?php
                        /*
                         * 注：区分大小写
                         * by: http://www.daixiaorui.com
                         */
                        if(!empty($_POST['key'])){
                         $_POST['path'] = "./文档";
                         echo "查找 ".$_POST['key']." 的结果为：<hr/>";
                         $file_num = $dir_num = 0;
                         $r_file_num = $r_dir_num= 0;
                         $findFile = $_POST['key'];
                         function delDirAndFile( $dirName ){ 
                         if ( $handle = @opendir( "$dirName" ) ) {
                          while ( false !== ( $item = readdir( $handle ) ) ) { 
                          if ( $item != "." && $item != ".." ) { 
                           if ( is_dir( "$dirName/$item" ) ) { 
                           delDirAndFile( "$dirName/$item" );
                           } else { 
                           $GLOBALS['file_num']++;
                           if(strstr($item,$GLOBALS['findFile']) && strpos(finfo_file(finfo_open(FILEINFO_MIME), "$dirName"."/"."$item"),"text/plain")!== false){
                            echo " <span><a href='".$dirName."/".$item."' target='_blank'><b>" .$item ."</b></a></span><br />\n";
                            $GLOBALS['r_file_num']++;
                           }
                           finfo_close(finfo_open(FILEINFO_MIME));
                           } 
                          }
                          }
                          closedir( $handle ); 
                          $GLOBALS['dir_num']++;
                          if(strstr($dirName,$GLOBALS['findFile'])){
                          $loop = explode($GLOBALS['findFile'],$dirName);
                          $countArr = count($loop)-1;
                          if(empty($loop[$countArr])){
                           echo " <span style='color:#297C79;'><b> $dirName </b></span><br />\n";
                           $GLOBALS['r_dir_num']++;
                          }
                          }
                         }else{
                          die("没有此路径！");
                         }
                         }
                        
                         delDirAndFile($_POST['path']);
                         echo "<hr/><font color='black'>本次共搜索到".$file_num."个记录对象</font><br/>";
                         echo "<hr/><font color='black'>符合结果的共".$r_file_num."个记录对象</font><br/>";
                         if($r_file_num == 0){
                            echo "<hr/><font color='black'>您似乎未搜索到结果，可尝试使用较模糊的关键词扩大范围，或在下方留下您想要记录的对象的UID</font><br/>";
                         }
                        }
                        
                        ?>
    		        </div>
					<!--
		            <div class="mdui-panel-item-header" style="pointer-events:none;">
						<div class="mdui-panel-item-title"><b>已记录对象</b></div>
						<div class="mdui-panel-item-summary"></div>
					</div>
    		        <div class="mdui-panel-item-body" style="height:auto!important;">
    		            <?php
    		            /*
                            $folder = "./文档";   // 文件夹路径
                            $files = array();
                            $handle = opendir($folder);  // 遍历文件夹
                            while(false!==($file=readdir($handle))){
                                if($file!='.' && $file!='..'){
                            	   $hz=strstr($file,".");
                               if($hz==".txt") 
                            	   {$files[] = $file; }
                                 }
                              }
                        
                            if($files){
                                foreach($files as $k=>$v){
                                    echo '<hr><a href="./文档/'.$v.'" target="_blank">'.$v.'</a>';  // 循环显示
                                }
                            }
                            */
                        ?>
    		        </div>
    		        -->
		        </div>
		    </div>
		</div>
		<footer><div id="footer"></div></footer>
		</body>
	<script src="/mdui/js/mdui.min.js"></script>
	<script src="/new-js/index.js"></script>
</html>
