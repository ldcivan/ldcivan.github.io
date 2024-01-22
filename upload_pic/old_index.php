<!doctype html>
<html lang="zh-cmn-Hans">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
		<meta name="renderer" content="webkit" />
		<meta name="force-rendering" content="webkit" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="/mdui/css/mdui.css" />
		<link rel="stylesheet" href="/new-js/index.css">
		<!--<script type="text/javascript" src="/passport/passcheck.php"></script>-->
		<title>Pro-Ivan数字库-图片查看</title>
		
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
		</div>
		<div class="mdui-appbar">
			<div class="mdui-toolbar mdui-color-theme" style="position:fixed;z-index:1000;margin-top:-75px;" mdui-headroom>
				<a href="javascript:;" mdui-drawer="{target: '#left-drawer'}" class="mdui-btn mdui-btn-icon">
					<i class="mdui-icon material-icons">menu</i>
				</a>
				<a href="/new.html" class="mdui-typo-headline">Pro-Ivan数字库-图片查看</a>
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
						<div class="mdui-panel-item-title"><b>按时间搜索已上传的图片</b></div>
						<div class="mdui-panel-item-summary"><button class="mdui-btn mdui-float-right mdui-color-theme mdui-text-color-white-text" style="pointer-events:auto;" onclick="window.open('/new-upload.html', '_self')">返回上传页面</button></div>
					</div>
    		        <div class="mdui-panel-item-body" style="height:auto!important;">
    		            20220902之后上传的图片可在此按时间查找<br>
    		            <i class="mdui-icon material-icons">search</i>
                              <select  class="mdui-select" mdui-select="{position: 'bottom'}" form="search_form" name="year" style="margin-left:5px">
                                  <option value="" selected>模糊搜索</option>
                                  <option value="2022">2022年</option>
                              </select>
                              <select  class="mdui-select" mdui-select="{position: 'bottom'}" form="search_form" name="month" style="margin-left:5px">
                                  <option value="" selected>模糊搜索</option>
                                  <option value="01">1月</option>
                                  <option value="02">2月</option>
                                  <option value="03">3月</option>
                                  <option value="04">4月</option>
                                  <option value="05">5月</option>
                                  <option value="06">6月</option>
                                  <option value="07">7月</option>
                                  <option value="08">8月</option>
                                  <option value="09">9月</option>
                                  <option value="10">10月</option>
                                  <option value="11">11月</option>
                                  <option value="12">12月</option>
                              </select>
                              <select  class="mdui-select" mdui-select="{position: 'bottom'}" form="search_form" name="day" style="margin-left:5px">
                                  <option value="" selected>模糊搜索</option>
                                  <option value="01">1日</option>
                                  <option value="02">2日</option>
                                  <option value="03">3日</option>
                                  <option value="04">4日</option>
                                  <option value="05">5日</option>
                                  <option value="06">6日</option>
                                  <option value="07">7日</option>
                                  <option value="08">8日</option>
                                  <option value="09">9日</option>
                                  <option value="10">10日</option>
                                  <option value="11">11日</option>
                                  <option value="12">12日</option>
                                  <option value="13">13日</option>
                                  <option value="14">14日</option>
                                  <option value="15">15日</option>
                                  <option value="16">16日</option>
                                  <option value="17">17日</option>
                                  <option value="18">18日</option>
                                  <option value="19">19日</option>
                                  <option value="20">20日</option>
                                  <option value="21">21日</option>
                                  <option value="22">22日</option>
                                  <option value="23">23日</option>
                                  <option value="24">24日</option>
                                  <option value="25">25日</option>
                                  <option value="26">26日</option>
                                  <option value="27">27日</option>
                                  <option value="28">28日</option>
                                  <option value="29">29日</option>
                                  <option value="30">30日</option>
                                  <option value="31">31日</option>
                              </select>
    		            <form class="mdui-textfield mdui-textfield-floating-label" action="" method="post" style="margin-right:23px;" id="search_form">
                              <input id="search" class="mdui-btn mdui-color-theme mdui-text-color-white-text" type="submit" name="sub" value=" 查 找 " style="display:none;" />
                          </form>
                          <button class="mdui-btn mdui-color-theme mdui-text-color-white-text" onclick="document.getElementById('search').click()" style="margin-right:24px;float:right;"> 查 找 </button><br><br>
    		            <?php
                        /*
                         * 注：区分大小写
                         * by: http://www.daixiaorui.com
                         */
                        if(!empty($_POST['year'])||!empty($_POST['month'])||!empty($_POST['day'])){
                         $_POST['path'] = "//us.pro-ivan.com/imgbed/upload_pic/";
                         echo "查找的 ".$_POST['year'].$_POST['month'].$_POST['day']." 结果为：<hr/>";
                         $file_num = $dir_num = 0;
                         $r_file_num = $r_dir_num= 0;
                         $findFile = $_POST['year'].$_POST['month'].$_POST['day'];
                         function delDirAndFile( $dirName ){ 
                         if ( $handle = @opendir( "$dirName" ) ) {
                          while ( false !== ( $item = readdir( $handle ) ) ) { 
                          if ( $item != "." && $item != ".." ) { 
                           if ( is_dir( "$dirName/$item" ) ) { 
                           delDirAndFile( "$dirName/$item" );
                           } else { 
                           $GLOBALS['file_num']++;
                           if(strstr($item,$GLOBALS['findFile']) && strpos(finfo_file(finfo_open(FILEINFO_MIME), "$dirName"."/"."$item"),"image")!== false){
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
                         echo "<hr/><font color='black'>符合结果的共".$r_file_num."个记录对象</font><br/><hr/>";
                         if($r_file_num == 0){
                            echo "<hr/><font color='black'>您似乎未搜索到结果，可尝试模糊搜索扩大范围</font><hr/>";
                         }
                        }
                        else{
                            echo "<hr/><font color='black'>请至少确定一个选项</font><br/><hr/>";
                        }
                        ?>
                        <br>
                        <div class="mdui-panel-item-title"><b>所有已上传的图片</b></div>
    		            <?php
                            $folder = "./";   // 文件夹路径
                            $files = array();
                            $handle = opendir($folder);  // 遍历文件夹
                            while(false!==($file=readdir($handle))){
                                if($file!='.' && $file!='..'){
                            	   $hz=strstr($file,".");
                               if($hz==".gif" or $hz==".jpg" or $hz==".JPG"or $hz==".JPEG"or $hz==".jpeg" or $hz==".PNG"or $hz==".png"or $hz==".GIF") 
                            	   {$files[] = $file; }
                                 }
                              }
                        
                            if($files){
                                foreach($files as $k=>$v){
                                    echo '<hr><a href="'.$v.'" target="_blank">'.$v.'</a>';  // 循环显示
                                }
                            }
                        ?>
    		        </div>
		        </div>
		    </div>
		</div>
		</body>
	<footer><div id="footer"></div></footer>
	<script src="/mdui/js/mdui.min.js"></script>
	<script src="/new-js/index.js"></script>
</html>
