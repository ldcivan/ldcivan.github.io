<!doctype html>
<html lang="zh-cmn-Hans">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,follow"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
		<meta name="renderer" content="webkit" />
		<meta name="force-rendering" content="webkit" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="stylesheet" href="/mdui/css/mdui.css" />
		<link rel="stylesheet" href="/new-js/index.css">
		<!--<script type="text/javascript" src="/passport/passcheck.php"></script>-->
		<title>Pro-Ivan数字库-神必下载站</title>
		<meta name="keywords" content="动漫图片,动漫资讯,动漫,二次元,漫画,动画,游戏,Cosplay,ACG,番剧,视频分享,壁纸,神曲,热门动漫,热门番剧">
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
			<img src="/Ivan.svg" style="max-width: 100%; max-height: 100%;">
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
				<li class="mdui-list-item mdui-ripple" onclick="alert('you are here')">
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
				<li class="mdui-list-item mdui-ripple" onclick="advertising()">
					<i class="mdui-list-item-icon mdui-icon material-icons">web</i>
					<div class="mdui-list-item-content">友链&推介</div>
				</li>
			</ul>
		</div>
		<div class="mdui-dialog" id="announcement">
			<div class="mdui-dialog-title">公告</div>
			<div class="mdui-dialog-content">
				<div id="GG"></div>
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
				<a id="title" href="/new.html" class="mdui-typo-headline">Pro-Ivan数字库-神必下载站</a>
				<div class="mdui-toolbar-spacer"></div>
				<a href="javascript:;" class="mdui-btn mdui-btn-icon" onclick="AddFavorite('http://pro-ivan.cn','Pro-Ivan')">
					<i class="mdui-icon material-icons" mdui-tooltip="{content: '收藏本页'}">star</i>
				</a>
			</div>
		</div>
		<div id="body" class="mdui-container-fluid">
		    <div class="mdui-panel" style="margin-top:70px">
		        <div class="mdui-panel-item">
		            <div class="mdui-panel-item-header" style="pointer-events:none;">
						<div class="mdui-panel-item-title"><b>下载目录</b></div>
						<div class="mdui-panel-item-summary"><button class="mdui-btn mdui-float-right mdui-color-theme mdui-text-color-white-text" style="pointer-events:auto;" onclick="window.open('/new.html', '_self')">返回主页</button></div>
					</div>
    		        <div class="mdui-panel-item-body" style="height:auto!important;">

<?php
    //error_reporting(E_ERROR | E_PARSE);
	require_once './upload_pic/res/php-sdk/vendor/autoload.php';
	use Upyun\Upyun;
    use Upyun\Config;
    
    $operator = "yujionako";
    $serviceName = "pro-ivan-cloud";
    $password = "kggp4aWK2Bum5NHDL515hiYaiNb9afPL";
    //$upyun = new UpYun($serviceName, $operator, $password);
    $bucketConfig = new Config($serviceName, $operator, $password);
    $client = new Upyun($bucketConfig);
    function arr_sort($array,$key,$order="desc"){ //asc是升序 desc是降序
        $arr_nums=$arr=array();
        foreach($array as $k=>$v){
         $arr_nums[$k]=$v[$key];
        }
        if($order=='asc'){
         asort($arr_nums);
        }else{
         arsort($arr_nums);
        }
        foreach($arr_nums as $k=>$v){
         $arr[$k]=$array[$k];
        }
        //print_r($arr);
        return $arr;
    }
    
    echo "<hr>压缩包<br>";
    $path = "/compressedFiles/";
	try{
        $res = $client->read($path);
        // 打印上传结果
        //print_r($res);
        //asort($res["files"],$res["files"]["time"]);
        $res["files"] = arr_sort($res["files"],'time');
        //print_r($res);
        $length = count($res["files"]);
        //for ($i = 0; $i < $length; $i++) {
        foreach ($res["files"] as $i => $value){
            if($res["files"][$i]["type"]=="N"){
                print "<a href='//us.pro-ivan.com".$path.$res["files"][$i]["name"]."' target='_blank'>".$res["files"][$i]["name"]."</a><br>Update Time:".date("Y-m-d TH:i:s",$res["files"][$i]["time"])."<br>File Size:".number_format(($res["files"][$i]["size"]/1024),1)."kb<br>";
            }
        }
	}
	catch(Exception $e) {
	    echo '<br><hr><br>';
		echo '列表获取失败<br>code: (';
        echo $e->getCode();
        echo ") ".$e->getMessage();
        exit('<br>请联系管理员以获得支持');
    }
    
    echo "<hr>视频<br>";
    $path = "/video/";
	try{
        $res = $client->read($path);
        // 打印上传结果
        //print_r($res);
        //asort($res["files"],$res["files"]["time"]);
        $res["files"] = arr_sort($res["files"],'time');
        //print_r($res);
        $length = count($res["files"]);
        //for ($i = 0; $i < $length; $i++) {
        foreach ($res["files"] as $i => $value){
            if($res["files"][$i]["type"]=="N"){
                print "<a href='//us.pro-ivan.com".$path.$res["files"][$i]["name"]."' target='_blank'>".$res["files"][$i]["name"]."</a><br>Update Time:".date("Y-m-d TH:i:s",$res["files"][$i]["time"])."<br>File Size:".number_format(($res["files"][$i]["size"]/1024),1)."kb<br>";
            }
        }
	}
	catch(Exception $e) {
	    echo '<br><hr><br>';
		echo '列表获取失败<br>code: (';
        echo $e->getCode();
        echo ") ".$e->getMessage();
        exit('<br>请联系管理员以获得支持');
    }
    
    echo "<hr>文档<br>";
    $path = "/doc/";
	try{
        $res = $client->read($path);
        // 打印上传结果
        //print_r($res);
        //asort($res["files"],$res["files"]["time"]);
        $res["files"] = arr_sort($res["files"],'time');
        //print_r($res);
        $length = count($res["files"]);
        //for ($i = 0; $i < $length; $i++) {
        foreach ($res["files"] as $i => $value){
            if($res["files"][$i]["type"]=="N"){
                print "<a href='//us.pro-ivan.com".$path.$res["files"][$i]["name"]."' target='_blank'>".$res["files"][$i]["name"]."</a><br>Update Time:".date("Y-m-d TH:i:s",$res["files"][$i]["time"])."<br>File Size:".number_format(($res["files"][$i]["size"]/1024),1)."kb<br>";
            }
        }
	}
	catch(Exception $e) {
	    echo '<br><hr><br>';
		echo '列表获取失败<br>code: (';
        echo $e->getCode();
        echo ") ".$e->getMessage();
        exit('<br>请联系管理员以获得支持');
    }
?>

<?php
echo "<hr>个人FTP连接<br>";

// FTP服务器登录信息

$ftp_server = "2001:da8:215:8f02:c40a:3c0e:3883:3369";
$ftp_user = "admin";
$ftp_password = "020321";

// 连接FTP服务器
$conn_id = ftp_connect($ftp_server, 21, 90);

// 登录FTP服务器
if($conn_id) $login_result = ftp_login($conn_id, "{$ftp_user}", "{$ftp_password}");
else echo("FTP 连接失败！");

if (!$conn_id || !$login_result) {
    // 连接或登录失败
    echo "FTP 登录失败！";
} else {
    // 连接和登录成功

    // 获取当前文件夹路径
    $current_dir = ftp_pwd($conn_id);

    // 获取文件夹列表
    $file_list = ftp_nlist($conn_id, $current_dir);

    if (empty($file_list)) {
        // 文件夹列表为空
        echo "No files found!";
    } else {
        // 文件夹列表不为空
        echo "<ul>";

        foreach ($file_list as $file) {
            if (ftp_size($conn_id, $file) < 0) {
                // 文件夹
                echo "<li><a href=\"?dir={$file}\">{$file}</a></li>";
            } else {
                // 文件
                $file_name = basename($file);
                echo "<li><a href=\"{$file}\" download>{$file_name}</a></li>";
            }
        }

        echo "</ul>";
    }

    // 关闭FTP连接
    ftp_close($conn_id);
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
	<script>
	    function isInclude(name){
            var js= /php$/i.test(name);
            var es=document.getElementsByTagName(js?'script':'link');
            for(var i=0;i<es.length;i++) 
            if(es[i][js?'src':'href'].indexOf(name)!=-1)return true;
            return false;
        }
         
        //alert(isInclude("passcheck.php"));
        //if(!isInclude("passcheck.php")) window.open('/passport/passgive.php', '_self');
	</script>
</html>
