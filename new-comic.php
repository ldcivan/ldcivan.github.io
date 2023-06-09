<?php
session_start();
//记录来自哪个界面
if(strpos($_SERVER['HTTP_REFERER'], "process.php") == false){
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

<!doctype html>
<html lang="zh-cmn-Hans">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,follow"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
		<meta name="renderer" content="webkit" />
		<meta name="force-rendering" content="webkit" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="stylesheet" href="./mdui/css/mdui.css" />
		<link rel="stylesheet" href="./new-js/index.css">
		<script type="text/javascript" src="/passport/passcheck.php"></script>
		<title>Pro-Ivan数字库-漫画</title>
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
				<li class="mdui-list-item mdui-ripple" onclick="alert('you are here')">
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
		<div class="mdui-appbar">
			<div class="mdui-toolbar mdui-color-theme" style="position:fixed;z-index:1000;margin-top:-15px;" mdui-headroom>
				<a href="javascript:;" mdui-drawer="{target: '#left-drawer'}" class="mdui-btn mdui-btn-icon">
					<i class="mdui-icon material-icons">menu</i>
				</a>
				<a href="/new.html" class="mdui-typo-headline">Pro-Ivan数字库-漫画</a>
				<div class="mdui-toolbar-spacer"></div>
				<a href="javascript:;" class="mdui-btn mdui-btn-icon" onclick="AddFavorite('http://pro-ivan.cn','Pro-Ivan')">
					<i class="mdui-icon material-icons" mdui-tooltip="{content: '收藏本页'}">star</i>
				</a>
			</div>
		</div>
        <div id="body">
            <div class="mdui-toolbar"></div>
            <div id="tips">
                <h3><font color=#FF0000>在您阅读前请知晓</font></h3>
                <p><font color=#FF0000>内容不得商用 | 网页未做移动端适用<br>页面空白是因为加载缓慢 | 跳转/翻页无反应是因为图片未加载好</font></p>
                <h3>提示</h3>
                <p>此页面使用电脑浏览可能体验不佳，建议使用平板设备访问该页面</p>
                <p>本页面上次更新于 <span id='LastUpdate'><?php $filename = basename(__FILE__);$last_modified = date("Y-n-d H:i:s", filemtime($filename));echo $last_modified; ?></span></p>
            </div>
            <div>
                <div class="row">
                    <div class="mdui-col-sm-6">
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Kkltsit_hypnosis_saluky/1.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                      <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title">凯尔希的催眠时刻</div>
                                        <div class="mdui-card-primary-subtitle">Saluky</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Kkltsit_hypnosis_saluky()">阅读</button>
                                  </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/connect_jp_komota/CP00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title">Connect 日文原版</div>
                                        <div class="mdui-card-primary-subtitle">KOMOTA</div>
                                     </div>
                                </div>
                            </div>
                            <div class="mdui-card-actions">
                                <button class="mdui-btn mdui-ripple mdui-float-right" onclick="connect_jp_komota()">阅读</button>
                            </div>
                        </div>
                    </div>
                        <!--111-->
                    <div id="card-one">
                        <div class="mdui-card">
                            <div class="mdui-card-media">
                                <img src="http://us.pro-ivan.com/imgbed/manga/connect2_komota/EX.webp!w750"/>
                                <div class="mdui-card-media-covered">
                                  <div class="mdui-card-primary">
                                    <div class="mdui-card-primary-title">Connect·少女和触手编织爱情·后篇(官方简中)</div>
                                    <div class="mdui-card-primary-subtitle">KOMOTA</div>
                                  </div>
                                </div>
                              </div>
                              <div class="mdui-card-actions">
                                <button class="mdui-btn mdui-ripple mdui-float-right" onclick="connect2_komota()">阅读</button>
                              </div>
                            </div>
                        </div>
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/xiao_hirika_SilverLuke/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">睡眠ゲーム</div>
                                            <div class="mdui-card-primary-subtitle">SiviruLuke</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="xiao_hirika_SilverLuke()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Hutao_Atelier30/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">最喜欢胡桃姐姐了！</div>
                                            <div class="mdui-card-primary-subtitle">Atelier30</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Hutao_Atelier30()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Myrtle_saluky/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">最强先锋桃金娘</div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Myrtle_saluky()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Lumine_saluky/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">派蒙啊，加速时间吧！</div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Lumine_saluky()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                    </div>
                    <!--222-->
                    <div class="mdui-col-sm-6">
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/connect_cn_komota/CP00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                      <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title">Connect 中国特供</div>
                                        <div class="mdui-card-primary-subtitle">KOMOTA</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="connect_cn_komota()">阅读</button>
                                  </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Fischl_saluky/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">直面本心的堕落王女</div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Fischl_saluky()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Noelle_saluky/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">诺艾尔小姐无法拒绝！！！</div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Noelle_saluky()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Nahida_saluky/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">开门！教令院！</div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Nahida_saluky()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Closure_redash/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">可露希尔大减价</div>
                                            <div class="mdui-card-primary-subtitle">RedAsh</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Closure_redash()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/KankakuShadan_ShirabeShiki/00.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">低級ザコ淫魔の触手が不快なので感覚遮断魔法を展開しましたわっ!!</div>
                                            <div class="mdui-card-primary-subtitle">調四季</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="KankakuShadan_ShirabeShiki()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img src="http://us.pro-ivan.com/imgbed/manga/Rimama_Mana/1.webp!w750"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">有栖マナ和触手们的快乐生活</div>
                                            <div class="mdui-card-primary-subtitle">李妈妈リママ</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="Rimama_Mana()">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                    </div>
                </div>
            </div>

        </div>
    <br><center><div><div class='mdui-table-fluid mdui-table th' style='margin-left:1%;width:98%;'><br><form action='/mangahtml/comment/comment.php' method='post'><table class='mdui-table'><tbody><tr><th><label class='mdui-textfield-label'>昵称</label><input type='text' class='mdui-textfield-input' name='channel0Title' placeholder='请输入昵称(小于25字)' required='required' maxlength='25' style='width:98%;'><br><label class='mdui-textfield-label'>评论</label><input type='text' class='mdui-textfield-input' name='channel0Gain' placeholder='要讲文明哟~(小于200字)' required='required' maxlength='200' style='width:98%;'><br><label class='mdui-textfield-label'>电邮</label><input type='text' class='mdui-textfield-input' name='contact' placeholder='或者其他联系方式（选填）' maxlength='200' style='width:98%;'><br><center><input class='mdui-btn mdui-ripple mdui-btn-raised mdui-btn-dense mdui-color-theme' type='submit' id ='submitButton' value='发送' onclick=''></center></th></tr></tbody></table></form><br><embed src='/mangahtml/comment/comment.txt' width='90%'/></div></div><br><font size='2' color=#C0C0C0>©2022-2023 Powered by <a href='https://github.com/Tvogmbh/' target='_blank' style='display:inline-block;text-decoration: none;'><font size='2' color='#C0C0C0' target='_blank'>Tvogmbh</font></a>. Pro-ivan.cn 版权所有 · </font><a href='https://stats.uptimerobot.com/Oo6ykFNrDn' target='_blank' style='display:inline-block;text-decoration: none;'><font size='2' color=#C0C0C0>网站状态</font></a><br><font size='2' color=#C0C0C0>ICP证: </font><a href='http://beian.miit.gov.cn' style='display:inline-block;text-decoration:none;height:20px;line-height:20px;' target='_blank'><font size='2' color=#C0C0C0>京ICP备2022003448号-1/2</font></a><font size='2' color=#C0C0C0> · </font><a target='_blank' href='http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11011402012324' style='display:inline-block;text-decoration:none;height:20px;line-height:20px;'><img src='/beian.png' style='float:left;'/><font size='2' color=#C0C0C0>京公网安备 11011402012324号</font></a></center>
        <script src="./mdui/js/mdui.min.js"></script>
        <script src="./new-js/index.js"></script>
    	<script>
    	    function isInclude(name){
                var js= /php$/i.test(name);
                var es=document.getElementsByTagName(js?'script':'link');
                for(var i=0;i<es.length;i++) 
                if(es[i][js?'src':'href'].indexOf(name)!=-1)return true;
                return false;
            }
             
            //alert(isInclude("passcheck.php"));
            if(!isInclude("passcheck.php")) window.open('/passport/passgive.php', '_self');
    	</script>
        </body>
</html>