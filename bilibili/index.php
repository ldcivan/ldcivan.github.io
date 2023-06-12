<!doctype html>
<html lang="zh-cmn-Hans">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
		<meta name="renderer" content="webkit" />
		<meta name="force-rendering" content="webkit" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="stylesheet" href="/mdui/css/mdui.css" />
		<link rel="stylesheet" href="/new-js/index.css">
		<title>Pro-Ivan数字库-哔哩哔哩粉丝量观测</title>
		<meta name="keywords" content="动漫图片,动漫资讯,动漫,二次元,漫画,动画,游戏,Cosplay,ACG,番剧,视频分享,壁纸,神曲,热门动漫,热门番剧">
		<meta name="description" content="技术宅社团，什么活都整！">
		<style>
		    li:hover {
              cursor: pointer;
            }
		</style>
		<script>
		window.onload = function() {
		    setTimeout(function(){
        		if(document.getElementById('result_box')){
                    document.getElementById('result_box').scrollIntoView({ block: 'end', behavior: 'smooth' });
                }
                else if(document.getElementById('chart_box')){
                    document.getElementById('chart_box').scrollIntoView({ block: 'end', behavior: 'smooth' })
                }
		    }, 350);
		}
        </script>
		<script src="/new-js/echarts.min.js"></script>
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
				<li class="mdui-list-item mdui-ripple" onclick="alert('you are here')">
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
				<a href="javascript:;" mdui-drawer="{target: '#left-drawer'}" class="mdui-btn mdui-btn-icon" onclick="setTimeout(function() {if(typeof(myChart)!='undefined')myChart.resize();}, 301)">
					<i class="mdui-icon material-icons">menu</i>
				</a>
				<a href="/new.html" class="mdui-typo-headline">Pro-Ivan数字库-哔哩哔哩粉丝量观测</a>
				<div class="mdui-toolbar-spacer"></div>
				<a href="javascript:;" class="mdui-btn mdui-btn-icon" onclick="AddFavorite('http://pro-ivan.cn','Pro-Ivan')">
					<i class="mdui-icon material-icons" mdui-tooltip="{content: '收藏本页'}">star</i>
				</a>
			</div>
		</div>
		<div id="body">
		    <div class="mdui-panel" style="margin-top:70px">
		        <div class="mdui-table-fluid mdui-table th" style="width: 100%;margin: 0 auto;">
		            <img id="avatar" class="mdui-img-circle" src="https://i0.hdslb.com/bfs/new_dyn/fd1c764320edb7e7b45e765b6b8f896311022578.png" width=100px height=100px  referrerpolicy="no-referrer" crossorigin="anonymous" style="margin:10px 15px;float:left;">
		            <a id="go_home" href="//space.bilibili.com" class="mdui-btn mdui-btn-icon" style="float:right;margin:42px;" target="_blank">
    					<i class="mdui-icon material-icons" mdui-tooltip="{content: 'Up主页'}">home</i>
    				</a>
		            <div style="float:left;margin-left:5px;">
		                <h1 id="name" style="margin-left:10px;">请输入uid</h1>
		                <div class="mdui-typo" style="margin-bottom:15px;">
                          <blockquote>
                            <p id="sign" class="mdui-typo-body-2-opacity"><i class="mdui-list-item-icon mdui-icon material-icons">error</i>&nbsp;输入id才看得到观测记录哦~</p>
                          </blockquote>
                        </div>
		            </div>
		        </div><br>
		        <div id="base_info"></div><br>
		        <div id="chart_box" class="mdui-table-fluid mdui-table th" style="width: 100%;height: auto;margin: 0 auto;">
		            <div id="chart" style="height:95%;width:99%;margin-top:15px;"><h1><center>无法获取到粉丝数据</center></h1></div>
		        </div><br>
		        
		        <div id="search_box" class="mdui-table-fluid mdui-table th" style="width: 100%;height: auto;margin: 0 auto;">
		            <div id="" style="height:95%;width:99%;margin-top:15px;">
		                <div class="mdui-panel-item-body mdui-text-color-white-text" style="height:auto!important;">
                          <form class="mdui-textfield mdui-textfield-floating-label" action="" method="post" style="margin-right:23px;">
                              <div class="mdui-panel-item-header" style="pointer-events:none;">
        						<div class="mdui-panel-item-title"><b style="color:black;font-size:1.5rem;">搜索器</b></div>
        						<div class="mdui-panel-item-summary"></div>
        					  </div>
                              <i class="mdui-icon material-icons">account_circle</i>
                              <label class="mdui-textfield-label">请输入目标uid、链接或者昵称</label>
                              <input class="mdui-textfield-input" type="text" name="key"/>
                              <div class="mdui-textfield-helper">昵称可以是模糊搜索嗷~</div>
                              <input id="search" class="mdui-btn mdui-color-theme mdui-text-color-white-text" type="submit" name="sub" value=" 查 找 " style="display:none;" />
                          </form>
                          <button class="mdui-btn mdui-color-theme mdui-text-color-white-text" onclick="document.getElementById('search').click();" style="margin-right:24px;float:right;"> 查 找 </button><br>
    		        </div>
		            </div>
		        </div>
		        
		        
    		            <?php
                        /*
                         * 注：区分大小写
                         * by: http://www.daixiaorui.com
                         */
                        if(!empty($_POST['key'])){
                            if(intval($_POST['key']) == 0){
                                $key = str_replace('uid:','',$_POST['key']);
                                $key = str_replace('UID:','',$key);
                                if(intval($key) != 0) exit ('<meta http-equiv="refresh" content="0;url=./?uid='.$key.'">');
                                $key = str_replace('https://','',$_POST['key']);
                                $key = str_replace('http://','',$key);
                                preg_match('/\/(\d+)/',$key,$key_trans);
                                if(intval($key_trans[1]) == 0) {
                                    // 处理用户提交的搜索请求
                            		$query = $_POST['key'];
                            
                            		// 查找包含博主名称的 JSON 文件
                            		$files = glob('../bfanscount/up_info/*.json');
                            		$matches = array();
                            		foreach ($files as $file) {
                            			$data = json_decode(file_get_contents($file), true);
                            			if (isset($data['data']['card']['name']) && stripos($data['data']['card']['name'], $query) !== false) {
                            				$matches[] = array(
                            					'uid' => $data['data']['card']['mid'],
                            					'name' => $data['data']['card']['name']
                            				);
                            			}
                            		}
                            
                            		// 如果找到了匹配项，则将其列出
                            		//echo "<script>alert('".count($files)."')</script>";
                            		if (count($matches) > 0) {
                            			echo '<div id="result_box" class="mdui-table-fluid mdui-table th"><div class="mdui-panel-item-body mdui-text-color-black-text" style="height:auto!important;margin-top:23px;"><div class="mdui-panel-item-header" style="pointer-events:none;"><div class="mdui-panel-item-title" style="width:100%;"><b style="color:black;font-size:1.0rem;">按昵称搜索：'.$_POST['key'].'</b></div></div>';
                            			echo '<div class="mdui-typo" style="margin-bottom:15px;"><blockquote>';
                            			foreach ($matches as $match) {
                            			    $location = "'./?uid=".$match['uid']."'";
                            				echo '<li onclick="window.location.replace('.$location.')"><strong>' . htmlspecialchars($match['name']) . '</strong>（UID：' . $match['uid'] . '）</li>';
                            			}
                            			echo '(单击名称以跳转)</blockquote></div></div></div>';
                            		}
                            		else exit ("<script>alert('你可能输入的不是合法的uid或up主页链接，也不是up主的昵称')</script><meta http-equiv='refresh' content='0;url=./'>");
                                }
                                else exit ('<meta http-equiv="refresh" content="0;url=./?uid='.$key_trans[1].'">');
                            }
                            else{
                        		exit ('<meta http-equiv="refresh" content="0;url=./?uid='.$_POST['key'].'">');	
                        	}
                        }
                        ?>
		        
		        <div id="add_box" class="mdui-table-fluid mdui-table th" style="width: 100%;height: auto;margin: 0 auto;">
                    <div id="chart" style="height:95%;width:99%;margin-top:15px;">
                        <div class="mdui-panel-item-body mdui-text-color-white-text" style="height:auto!important;">
                    		<form class="mdui-textfield mdui-textfield-floating-label" action="./add.php" method="post" style="margin-right:23px;">
                              <div class="mdui-panel-item-header" style="pointer-events:none;">
                            	<div class="mdui-panel-item-title"><b style="color:black;font-size:1.5rem;">添加器(试运行)</b></div>
                            	<div class="mdui-panel-item-summary"></div>
                              </div>
                              <i class="mdui-icon material-icons">add_circle_outline</i>
                              <label class="mdui-textfield-label">请输入目标uid或链接</label>
                              <input class="mdui-textfield-input" type="text" name="new_uid" id="new_uid"/>
                              <div class="mdui-textfield-helper">暂不支持搜索昵称嗷~</div>
                              <input id="add" class="mdui-btn mdui-color-theme mdui-text-color-white-text" type="submit" name="sub" value=" 添 加 " style="display:none;" />
                            </form>
                            <button class="mdui-btn mdui-color-theme mdui-text-color-white-text" onclick="document.getElementById('add').click()" style="margin-right:24px;float:right;"> 添 加 </button><br>
                        </div>
                    </div>
                </div>
		    </div>
		</div>
		
    	    


		<footer><div id="footer"></div></footer>
		</body>
	<script src="/mdui/js/mdui.min.js"></script>
	<script src="/new-js/index.js"></script>
	
		<script type="text/javascript">

            <?php 
            //error_reporting(0);
            //$uid = basename($_GET["uid"]);
            //if($uid!="")
            //    echo 'var uid = '.$uid.';'.PHP_EOL;
            //else{
            //    echo 'var uid = -1;'.PHP_EOL;
            //    exit();
            //}

            //echo 'var rate1 = [';
            //for ($i=0;$i<sizeof($data)-1;$i++){ 
            //    if ($data[$i]["rate1"])
            //        echo $data[$i]["rate1"].',';
            //    else{
            //        if(in_array("rate1",$data[$i]))
            //            echo '0,';
            //        else
            //            echo 'null,';
            //    }
            //}
            //if($data[sizeof($data)-1]["rate1"])
            //    echo $data[sizeof($data)-1]["rate1"].'];'.PHP_EOL;
            //else
            //    echo 'null];'.PHP_EOL;
            //echo 'var rate7 = [';
            //for ($i=0;$i<sizeof($data)-1;$i++){ 
            //    if ($data[$i]["rate7"])
            //        echo $data[$i]["rate7"].',';
            //    else{
            //        if(in_array("rate7",$data[$i]))
            //            echo '0,';
            //        else
            //            echo 'null,';
            //    }
            //}
            //if($data[sizeof($data)-1]["rate7"])
            //    echo $data[sizeof($data)-1]["rate7"].'];'.PHP_EOL;
            //else
            //    echo 'null];'.PHP_EOL;
                
            //$json_string = file_get_contents("../bfanscount/up_info/".$uid.".json");
            
            //格式化json
            //$json_string = str_replace('`','\`',$json_string);
            //$json_string = str_replace('\\', '\\\\',$json_string);
            //$json_string = preg_replace('/(?<!\\\\)\\\\(?!u)/', '\\\\\\\\', $json_string);
        
            //echo "var baseinfo_str = `".$json_string."`;";
            ?>
            var uid = parseInt(new URLSearchParams(window.location.search).get('uid'));
            if (isNaN(uid)) {
              uid = -1;
              console.error('Invalid uid parameter');
            }
            else{
            var data =[];
            var time = [];
            var fans = [];
            var request = new XMLHttpRequest();
            request.open('GET', '../bfanscount/json/' + uid + '.json');
            request.responseType = 'json';
            request.onload = function() {
              if (request.readyState === 4 && request.status === 200) {
                data = request.response;
                for (var i = 0; i < data.length; i++) {
                  time.push(data[i].time);
                  fans.push(data[i].fans);
                }
                console.log('time:', time);
                console.log('fans:', fans);
              }
            };
            request.send();
            
            if(uid!==-1&&uid!=='')document.getElementById('name').innerHTML = "加载中";
            var baseinfo = {};
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../bfanscount/up_info/' + uid + '.json');
            xhr.responseType = 'json';
            xhr.onload = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                baseinfo = xhr.response;
                
                console.log(baseinfo);
                
                build(baseinfo, fans, time);
              } else if(!document.getElementById('result_box')) {
                console.log('Request failed.  Returned status of ' + xhr.status);
                alert("未记录的uid：" + uid);
                document.getElementById('name').innerHTML = "未记录该uid：" + uid;
              }
            };
            xhr.send();

            //格式化json
            //baseinfo_str = baseinfo_str.replaceAll(/'/g, '"');
            //baseinfo_str = json_string.replaceAll(/\\/ig, "\\\\");
            //alert(baseinfo_str, 500000)
            //baseinfo_str = baseinfo_str.replaceAll(/False/g, 'false');
            //baseinfo_str = baseinfo_str.replaceAll(/True/g, 'true');
            
            
            function build(baseinfo, fans, time){
            setTimeout(function(){
                var name = JSON.stringify(baseinfo.data.card.name).replaceAll('\"','');
                var avatar = JSON.stringify(baseinfo.data.card.face).replaceAll('\"','');
                var sign = ((JSON.stringify(baseinfo.data.card.sign).replaceAll('\"','')).replaceAll(/\\r|\\n/ig,"<br>")).replaceAll(/`/g, '\\`');
                document.getElementById('avatar').src = avatar+"@120w_120h_1c";
                document.getElementById('name').innerHTML = name;
                document.title = 'Pro-Ivan数字库-哔哩哔哩粉丝量观测-' + name;
                document.getElementById('sign').innerHTML = sign;
                document.getElementById('go_home').href = "https://space.bilibili.com/"+uid;
                document.getElementById('chart_box').style = "width: 100%;height: 450px;margin: 0 auto;";

      
            
            
            

    
                for(var i=0;i<time.length;i++){
                    fans[i]=`["${time[i]}",${fans[i]}]`;
                    //rate1[i]=`["${time[i]}",${rate1[i]}]`;
                    //if(rate7[i]!=null)
                    //    rate7[i]=`["${time[i]}",${(rate7[i]/7).toFixed(2)}]`;
                    //else
                    //    rate7[i]=`["${time[i]}",null]`;
                }
                fans = `[${fans}]`;fans = JSON.parse(fans);
                //rate1 = `[${rate1}]`;rate1 = JSON.parse(rate1);
                //rate7 = `[${rate7}]`;rate7 = JSON.parse(rate7);
                
                mintime = `"${JSON.stringify(time[0])}"`.substring(2,13)+"00:00:00";
                maxtime = `"${JSON.stringify(time[time.length-1])}"`.substring(2,13)+"23:59:59";
                
                function fans_dif(data, time){
                let result = [];
                
                // Loop through each record
                for (let i = 0; i < data.length; i++) {
                  let record = data[i];
                
                  // Find the record from one day ago
                  let dayAgo = null;
                  for (let j = i - 1; j >= 0; j--) {
                    let timeDiff = Math.abs(new Date(record[0]) - new Date(data[j][0]));
                    if (timeDiff >= time * 23.75 * 60 * 60 * 1000 && timeDiff <= time * 24.25 * 60 * 60 * 1000) {
                      dayAgo = data[j];
                      break;
                    }
                  }
                
                  // Calculate the fan difference
                  let fansDiff = null;
                  if (dayAgo !== null) {
                    fansDiff = record[1] - dayAgo[1];
                  }
                 
                 
                 
                  // Add the result to the output array
                  if (time != 1 && fansDiff != null) {fansDiff = (fansDiff/time).toFixed(2);}
                  result.push(
                     [record[0], fansDiff]
                  );
                }
                
                console.log(result);
                return result;
                }
                
                var rate1 = fans_dif(fans, 1);
                var rate7 = fans_dif(fans, 7);
                var rate14 = fans_dif(fans, 14);
                var rate30 = fans_dif(fans, 30);
                
                function formatNumber(num) { //防数字过长
                  if (num >= 100000) {
                    if (num >= 10000000) {
                        return (num / 10000).toFixed(0) + '万';
                    }
                    else{
                        return (num / 10000).toFixed(1) + '万';
                    }
                  } else {
                    return num;
                  }
                }
    
    
                document.getElementById('base_info').innerHTML = `<div class="mdui-row mdui-col-12 mdui-center mdui-valign" style="max-width:1200px;"><div class="mdui-table-fluid mdui-table mdui-col-xs-4" style="height:125px;margin-bottom:15px;"><div style="float:left;margin-left:5px;"><p id="" class="mdui-typo-body-2-opacity">粉丝总数量</p></div><div class="mdui-typo" style="margin-bottom:15px;float:right;bottom:0px;right:5px;position:absolute;"><h2 id="" style="margin-right:5px;"><b>${formatNumber(fans[fans.length-1][1])}</b></h2></div></div><div class="mdui-table-fluid mdui-table mdui-col-xs-4" style="height:125px;margin-left:15px;margin-bottom:15px;"><div style="float:left;margin-left:5px;"><p id="" class="mdui-typo-body-2-opacity">1日增长量</p></div><div class="mdui-typo" style="margin-bottom:15px;float:right;bottom:0px;right:5px;position:absolute;"><h2 id="" style="margin-right:5px;"><b>${formatNumber((rate1[rate1.length-1][1]))}</b></h2></div></div><div class="mdui-table-fluid mdui-table mdui-col-xs-4" style="height:125px;margin-left:15px;margin-bottom:15px;"><div style="float:left;margin-left:5px;"><p id="" class="mdui-typo-body-2-opacity">7日增长量</p></div><div class="mdui-typo" style="margin-bottom:15px;float:right;bottom:0px;right:5px;position:absolute;"><h2 id="" style="margin-right:5px;"><b>${formatNumber((rate7[rate7.length-1][1]*7).toFixed(0))}</b></h2></div></div></div>`;
                
                var chartDom = document.getElementById('chart');
                var option;
                var myChart = echarts.init(chartDom);
                option = {
                  title: {
                    left: 'center',
                    text: name+" 粉丝量变动"
                  },
                  tooltip: {
                    trigger: 'axis'
                  },
                  dataZoom: [
                    {
                      show: true,
                      realtime: true,
                      start: 40,
                      end: 100,
                      xAxisIndex: [0, 1]
                    },
                    {
                      type: 'inside',
                      realtime: true,
                      start: 40,
                      end: 100,
                      xAxisIndex: [0, 1],
                      zoomLock: false
                    }
                  ],
                  legend: {
                    data: ['粉丝数', '1日增长', '7日增长(每日)', '14日增长(每日)', '30日增长(每日)'],
                    height: "auto",
                    top: 35
                  },
                  xAxis: {
                    type: 'time',
                    min:mintime,
                    max:maxtime
                  },
                  yAxis: [
                    {
                        name:'粉丝计数',
                        type: 'value',
                        nameLocation: 'middle',
                        alignTicks: true,
                        scale: true,
                        axisLabel: {
                          inside: true
                        }
                    },
                    {
                        name:'粉丝变化量',
                        type: 'value',
                        nameLocation: 'middle',
                        alignTicks: true,
                        scale: false,
                        axisLabel: {
                          inside: true
                        }
                    }
                  ],
                  series: [
                  {
                    name: '粉丝数',
                    type: 'line',
                    //smooth: true,
                    data: fans,
                    showSymbol: false,
                    yAxisIndex: 0
                  },
                  {
                    name: '1日增长',
                    type: 'line',
                    //smooth: true,
                    data: rate1,
                    showSymbol: false,
                    areaStyle: {},
                    yAxisIndex: 1//对应右侧的y轴
                  },
                  {
                    name: '7日增长(每日)',
                    type: 'line',
                    //smooth: true,
                    data: rate7,
                    showSymbol: false,
                    areaStyle: {},
                    areaStyle: {
                        opacity: 1
                    },
                    yAxisIndex: 1//对应右侧的y轴
                  },
                  {
                    name: '14日增长(每日)',
                    type: 'line',
                    //smooth: true,
                    data: rate14,
                    showSymbol: false,
                    areaStyle: {},
                    areaStyle: {
                        opacity: 1
                    },
                    yAxisIndex: 1//对应右侧的y轴
                  },
                  {
                    name: '30日增长(每日)',
                    type: 'line',
                    //smooth: true,
                    data: rate30,
                    showSymbol: false,
                    areaStyle: {},
                    areaStyle: {
                        opacity: 1
                    },
                    yAxisIndex: 1//对应右侧的y轴
                  }
                  ]
                };
                option && myChart.setOption(option);
            }, 250);}
            window.onresize = function() {
                if(typeof(myChart)!="undefined"){
                    myChart.resize();}
            };
            }
		</script>
</html>
