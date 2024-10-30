<?php
session_start();
//记录来自哪个界面
$current_page = $_SERVER['REQUEST_URI'];
$_SESSION['comeFrom'] = $current_page;

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
		<style>
            .r18-box {
              width: 3.0em;
              height: 1.4em;
              background-color: #CC0000; /* 默认背景颜色 */
              border-radius: 6px;
              display: inline-block;
              text-align: center;
              margin-left: 10px;
            }
            .r18-text {
              font-size: 14px;
              font-weight: bold;
              color: #FFFFFF; /* 默认文字颜色 */
            }
		</style>
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
        <div id="loading_b" class="mdui-dialog mdui-dialog-open" style="display: block;position: fixed;top: 0px;left: 0px;right: 0px;bottom: 0px;margin: auto;max-height:23%;pointer-events: none;">
	        <div class="mdui-dialog-title" style="pointer-events: none;">请知悉</div>
            <div class="mdui-dialog-content" style="pointer-events: none;">本页面内的图片可能不适合在公开场合浏览，请留意您所在的场合<br>我们不会承担您在社会层面上的死亡风险</div>
            <div class="mdui-dialog-actions" style="position: absolute; top: 0px; right: 20px;">
                <span onclick="document.getElementById('loading_b').className='mdui-dialog';
                document.getElementById('loading_l').className='mdui-overlay';" style="pointer-events: auto; cursor: pointer;color:gray;font-size:3.0em;">&times;</span>
            </div>
        </div>
        <div id="loading_l" class="mdui-overlay mdui-overlay-show" style="z-index: 3000;"></div>
		<div class="mdui-drawer" id="left-drawer" style="z-index:3000;">
			<img src="./Ivan.svg" style="max-width: 100%; max-height: 100%;">
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
				<a id="title" href="/new.html" class="mdui-typo-headline">Pro-Ivan数字库-漫画</a>
				<div class="mdui-toolbar-spacer"></div>
				<a href="javascript:;" class="mdui-btn mdui-btn-icon" onclick="AddFavorite('http://pro-ivan.cn','Pro-Ivan')">
					<i class="mdui-icon material-icons" mdui-tooltip="{content: '收藏本页'}">star</i>
				</a>
			</div>
		</div>
        <div id="body" class="mdui-container-fluid">
            <div class="mdui-toolbar"></div>
            <div id="tips">
                <h3><font color=#FF0000>在您阅读前请知晓</font></h3>
                <p><font color=#FF0000>内容不得商用 | 网页未做移动端适用<br>页面空白是因为加载缓慢 | 跳转/翻页无反应是因为图片未加载好</font></p>
                <h3>提示</h3>
                <p>此页面使用电脑浏览可能体验不佳，建议使用平板设备访问该页面</p>
                <p>本页面上次更新于 <span id='LastUpdate'><?php $filename = basename(__FILE__);$last_modified = date("Y-n-d H:i:s", filemtime($filename));echo $last_modified; ?></span></p>
            </div>
            <div class="mdui-container">
                <div class="mdui-row">
                    <div class="mdui-col-sm-6">
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Kkltsit_hypnosis_saluky/1.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                      <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title">凯尔希的催眠时刻<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                        <div class="mdui-card-primary-subtitle">Saluky</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga1.php', '_blank');">阅读</button>
                                  </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/connect_jp_komota/CP00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title">Connect 日文原版<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                        <div class="mdui-card-primary-subtitle">KOMOTA</div>
                                     </div>
                                </div>
                            </div>
                            <div class="mdui-card-actions">
                                <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga2.php', '_blank');">阅读</button>
                            </div>
                        </div>
                    </div>
                        <!--111-->
                    <div id="card-one" class="mdui-hoverable">
                        <div class="mdui-card">
                            <div class="mdui-card-media">
                                <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/connect2_komota/EX.webp!w750" src="/Ivanbg.png"/>
                                <div class="mdui-card-media-covered">
                                  <div class="mdui-card-primary">
                                    <div class="mdui-card-primary-title">Connect·少女和触手编织爱情·后篇(官方简中)<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                    <div class="mdui-card-primary-subtitle">KOMOTA</div>
                                  </div>
                                </div>
                              </div>
                              <div class="mdui-card-actions">
                                <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga5.php', '_blank');">阅读</button>
                              </div>
                            </div>
                        </div>
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/xiao_hirika_SilverLuke/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">睡眠ゲーム<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">SiviruLuke</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga7.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Hutao_Atelier30/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">最喜欢胡桃姐姐了！<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">Atelier30</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga9.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Myrtle_saluky/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">最强先锋桃金娘<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga11.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Lumine_saluky/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">派蒙啊，加速时间吧！<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga13.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Kaiko_no_shojo_to_Sleeplan/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">虫ノ少女ト(与虫之少女系列)</div>
                                            <div class="mdui-card-primary-subtitle">Sleeplan</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga15.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/YuushaChan_HoshinaMeito/00.jpg!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">勇者ちゃんの冒険は終わってしまった!<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">星名めいと</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga17.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/KeqingGanyu_Maitake/34.jpg!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">甘雨&刻晴!</div>
                                            <div class="mdui-card-primary-subtitle">まいたけ</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga17.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Foorina_renard/13.jpg!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">笨蛋芙宁娜<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">renard</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga21.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                    </div>
                    <!--222-->
                    <div class="mdui-col-sm-6">
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/connect_cn_komota/CP00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                      <div class="mdui-card-primary">
                                        <div class="mdui-card-primary-title">Connect 中国特供</div>
                                        <div class="mdui-card-primary-subtitle">KOMOTA</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga3.php', '_blank');">阅读</button>
                                  </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Fischl_saluky/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">直面本心的堕落王女<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga4.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Noelle_saluky/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">诺艾尔小姐无法拒绝！！！<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga6.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Nahida_saluky/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">开门！教令院！<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">Saluky</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga8.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Closure_redash/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">可露希尔大减价<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">RedAsh</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga10.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/KankakuShadan_ShirabeShiki/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">低級ザコ淫魔の触手が不快なので感覚遮断魔法を展開しましたわっ!!<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">調四季</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga12.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Rimama_Mana/1.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">有栖マナ和触手们的快乐生活<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">李妈妈リママ</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga14.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/Shizuku_Sishui/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">雫るるの婚后粉丝交际<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">四水</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga16.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/YuushaChanEX_HoshinaMeito/00.webp!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">勇者酱的EX结局!<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">星名めいと</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga18.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/KimiwaUma_Yunyanko/00.png!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">你是赛马娘 IF 训练员变成赛马娘的故事</div>
                                            <div class="mdui-card-primary-subtitle">琥珀ノカケラ(湯猫子)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga20.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                        <div id="card-one" class="mdui-hoverable">
                            <div class="mdui-card">
                                <div class="mdui-card-media">
                                    <img class="lazy" data-src="http://us.pro-ivan.com/imgbed/manga/reed_animarcat/00.png!w750" src="/Ivanbg.png"/>
                                    <div class="mdui-card-media-covered">
                                        <div class="mdui-card-primary">
                                            <div class="mdui-card-primary-title">~極秘ファイル：寄生時間~<div id="r18-box" class="r18-box"><span id="level-text" class="level-text">R-18</span></div></div>
                                            <div class="mdui-card-primary-subtitle">今沢</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdui-card-actions">
                                    <button class="mdui-btn mdui-ripple mdui-float-right" onclick="window.open('/mangahtml/manga22.php', '_blank');">阅读</button>
                                </div>
                            </div>
                        </div>
                        <!--111-->
                    </div>
                </div>
            </div>

        </div>
        <footer><div id="footer"></div></footer>
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
        <script>
        document.querySelectorAll('.lazy').forEach(function(el) {
            const src = el.getAttribute('data-src').replace('w750', 'info');
            
            fetch(src, {
              method: 'GET',
              mode: 'cors'
            })
                .then(response => response.json())
                .then(data => {
                    const ratio = data.height / data.width;
                    
                    // 计算新的高度
                    const newHeight = el.offsetWidth * ratio;
                    
                    // 计算padding值
                    const paddingTop = (newHeight - el.offsetHeight + parseFloat(getComputedStyle(el).paddingTop)) / 2;
                    const paddingBottom = (newHeight - el.offsetHeight + parseFloat(getComputedStyle(el).paddingBottom)) / 2;
                    
                    // 设置新的高度和填充
                    el.style.paddingTop = paddingTop + 'px';
                    el.style.paddingBottom = paddingBottom + 'px';
                })
                .catch(error => console.error('Error fetching image info:', error));
        });
        </script>
        <script>
        // 获取所有带有 "lazy" 类名的图片元素
        const lazyImages = document.querySelectorAll('.lazy');
    
        // 创建 Intersection Observer 实例
        const observer = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
            // 如果图片进入视窗范围并且停留超过1000ms
            //console.log(entry.intersectionRatio)
            if (entry.intersectionRatio >= 0) {
              const img = entry.target;
    
              // 停留 1000ms 后加载图片
              const timeoutId = setTimeout(() => {
                img.onload = function() {
                    img.classList.remove('lazy');
                    img.classList.add('shown');
                    observer.unobserve(img);
                    img.style.paddingTop = '0';
                    img.style.paddingBottom = '0';
                };
                img.src = img.dataset.src;
                //console.log('load')
              }, 1000);
    
              // 如果图片在 1000ms 内脱离视窗，则取消加载
              const cancelTimeout = () => {
                clearTimeout(timeoutId);
                //console.log('cancel')
              };
    
              // 监听图片脱离视窗事件
              const visibilityObserver = new IntersectionObserver(([visibilityEntry]) => {
                if (visibilityEntry.intersectionRatio < 0.025) {
                  cancelTimeout();
                }
              });
    
              visibilityObserver.observe(img);
    
              // 监听图片加载完成事件
              img.addEventListener('load', () => {
                cancelTimeout();
              });
            }
          });
        });
    
        // 遍历所有图片元素并开始观察
        lazyImages.forEach(image => {
          observer.observe(image);
        });
        </script>
        </body>
</html>