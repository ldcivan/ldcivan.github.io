document.write(`
    <script src="/new-js/bandev.js"></script>
    <script>
      devtoolsDetector.addListener(function (isOpen, detail) {
        console.log('isOpen', isOpen);

        if (isOpen) {
          document.head.innerHTML = "<meta charset='utf-8'>";
          document.body.className = "";
          document.body.innerHTML = "<div style='margin-left:15%;margin-right:15%;top:35%;position: fixed;'><img src='/Ivan.png' width=200px style='margin-left:-15px'><br><h1>你干嘛啊啊哈哟！！</h1><br><font color='grey'>Tips:后台有些东西不想让大家看到，所以没有需要的话就不要F12了</font></div>";
          debugger;
          window.open('/','_self');
        }
      });

      devtoolsDetector.launch();
    </script>
`);


webdriver = window.navigator.webdriver;
if(webdriver){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.abort(); 
    window.stop ? window.stop() : document.execCommand("Stop");
    alert('我在做网站的时候，你有在偷偷用Selenium爬我吧？(恼)')
    window.open('/', '_self')
} else {
    console.log('webdriver check 0K')
}

var UserAgent = 
{
    useragent:window.navigator.userAgent.toLowerCase(),
    android:function()
    {
        alert(this.useragent.indexOf("android"));
        return (this.useragent.indexOf("android") >=0);
    },
    iphone:function()
    {
        return (this.useragent.indexOf("iphone") >=0);
    },
    ipad:function()
    {
        return (this.useragent.indexOf("ipad") >=0);
    },
    mobile:function()
    {
    　　return (this.useragent.indexOf("andriod") >=0) || (this.useragent.indexOf("iphone") >=0) || (this.useragent.indexOf("ipad") >=0);
    }
}
if (UserAgent!='') console.log('UserAgent check 0K') 
else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.abort(); 
    window.stop ? window.stop() : document.execCommand("Stop");
    alert('你的UA咋是空的啊')
    window.open('/', '_self')
}

document.onkeydown = function() {
    var e = window.event || arguments[0];
    if (e.keyCode == 123) {
        alert("我求求你了，你也不管理这个网站F12干啥呀！");
        return false;
    }
     if ((e.ctrlKey) && (e.keyCode == 83)) { //ctrl+s
        alert("你存个html文件不怕我往里面藏病毒吗(恼)");
        return false;
    }
     if ((e.ctrlKey) && (e.keyCode == 85)) { //ctrl+s
        alert("要看源代码是吧？我那💩山有什么好看的！");
        return false;
    }
    if ((e.ctrlKey) && (e.keyCode == 73)) { //ctrl+s
        alert("F12不行用这个是吧，你干脆直接右上角工具里找到开发者工具点开来得了呗！");
        return false;
    }
}




document.oncontextmenu = function() {
    alert('你！不准使用右键！');
    return false;
}

var httpRequest = new XMLHttpRequest();//第一步：建立所需的对象
httpRequest.open('GET', '/gonggao/index.php', true);
httpRequest.send();//第三步：发送请求  将请求参数写在URL中
/**
 * 获取数据后的处理程序
 */
httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var gonggao = httpRequest.responseText;//获取到json字符串，还需解析
        document.getElementById('GG').innerHTML = gonggao
    }
};
function imgs() {
    window.open('/new-page1.php', '_self');
}
function about() {
    window.open('/new-about.html', '_self');
}
function comic() {
    window.open('/new-comic.php', '_self');
}
function img_bed() {
    window.open('/new-upload.html', '_self');
}
function little_game() {
    window.open('/game/', '_self');
}
function home() {
    window.open('/new.html', '_self');
}
function img_bed_files() {
    window.open('/upload_pic/', '_self');
}
function download() {
    window.open('/new-download.php', '_self');
}
function bfanscount() {
    window.open('/bilibili/', '_self');
}
function api() {
    window.open('/api/', '_blank');
}
function Kkltsit_hypnosis_saluky() {
    window.open('/mangahtml/manga1.html', '_blank');
}
function connect_jp_komota() {
    window.open('/mangahtml/manga2.html', '_blank');
}
function connect_cn_komota() {
    window.open('/mangahtml/manga3.html', '_blank');
}
function Fischl_saluky() {
    window.open('/mangahtml/manga4.html', '_blank');
}
function connect2_komota() {
    window.open('/mangahtml/manga5.html', '_blank');
}
function Noelle_saluky() {
    window.open('/mangahtml/manga6.html', '_blank');
}
function xiao_hirika_SilverLuke() {
    window.open('/mangahtml/manga7.html', '_blank');
}
function Nahida_saluky() {
    window.open('/mangahtml/manga8.html', '_blank');
}
function Hutao_Atelier30() {
    window.open('/mangahtml/manga9.html', '_blank');
}
function Closure_redash() {
    window.open('/mangahtml/manga10.html', '_blank');
}
function Myrtle_saluky() {
    window.open('/mangahtml/manga11.html', '_blank');
}
function Myrtle_saluky() {
    window.open('/mangahtml/manga11.html', '_blank');
}
function KankakuShadan_ShirabeShiki() {
    window.open('/mangahtml/manga12.html', '_blank');
}
function Lumine_saluky() {
    window.open('/mangahtml/manga13.html', '_blank');
}
function Rimama_Mana() {
    window.open('/mangahtml/manga14.html', '_blank');
}
function line_1() {
    //具体咋写，我不知道，域名跳转？
    alert('将跳转到pro-ivan.cn');
    //window.location.href="http://pro-ivan.cn";
}
function line_2() {
    //具体咋写，我不知道，域名跳转？
    alert('将跳转到www.pro-ivan.cn');
    //window.location.href="http://www.pro-ivan.cn";
}
function line_3() {
    //具体咋写，我不知道，域名跳转？
    alert('将跳转到pro-ivan.com');
    //window.location.href="http://pro-ivan.com";
}
function line_4() {
    //具体咋写，我不知道，域名跳转？
    alert('将跳转到www.pro-ivan.com');
    //window.location.href="http://www.pro-ivan.com";
}
function line_5() {
    //具体咋写，我不知道，域名跳转？
    alert('将跳转到xingye.pro-ivan.com');
    //window.location.href="http://xingye.pro-ivan.com";
}


function alert(content, timeout){
    if (!timeout) timeout =2500;
    mdui.snackbar({
      message: content,
      timeout: timeout
    });
}

// 动态添加meta资源https
if (window.location.protocol.split(":")[0] == 'https') {
	var meta = document.createElement('meta');
	meta.content = "upgrade-insecure-requests";
	meta.setAttribute('http-equiv', "Content-Security-Policy");
	document.getElementsByTagName('head')[0].appendChild(meta);
}

function closewin(){
    document.getElementById('float_win').style.visibility='hidden' ;
}

function rickroll(){
    window.location.href="https://vdse.bdstatic.com//192d9a98d782d9c74c96f09db9378d93.mp4";
}

// 全局错误处理函数
window.onerror = function(message, source, lineno, colno, error) {
  alert('加载异常，不影响使用则忽略此信息：' + message + ' in ' + lineno + ', ' + colno);
};

// 向新元素中添加文本 到顶端的快捷键
var newText = `<button class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme mdui-text-color-white-text" onclick="window.scrollTo({top: 0,behavior: 'smooth'});"><i class="mdui-icon material-icons">arrow_upward</i></button>`;
document.write(newText);

//节日祝福设置
var holidayWishes = [
  { date: "05-01", message: "祝元旦快乐！", cookieName: "new-year-wish-received" }, // 元旦
  { date: "02-10", message: "祝除夕快乐，希望来年也能多多支持！", cookieName: "chinese-new-year-eve-wish-received" }, // 春节
  { date: "02-11", message: "祝春节快乐！", cookieName: "chinese-new-year-wish-received" }, // 春节
  { date: "04-05", message: "祝清明节安康！", cookieName: "qingming-festival-wish-received" }, // 清明节
  { date: "05-01", message: "祝劳动节快乐！", cookieName: "labor-day-wish-received" }, // 劳动节
  { date: "05-04", message: "祝青年节快乐！", cookieName: "youth-day-wish-received" }, // 青年节
  { date: "06-01", message: "祝儿童节快乐！就算成年了也要保持童心哦~", cookieName: "childrens-day-wish-received" }, // 儿童节
  { date: "06-07", message: "祝各位学子高考顺利！", cookieName: "gaokao-wish-received" }, // 高考
  { date: "06-22", message: "祝端午节安康！", cookieName: "dragonboat-festival-wish-received" }, // 端午节
  { date: "09-28", message: "祝中秋节快乐！", cookieName: "mid-autumn-wish-received" }, // 中秋节
  { date: "10-01", message: "祝国庆节快乐！", cookieName: "national-day-wish-received" }, // 国庆节
  { date: "12-25", message: "祝圣诞节快乐！", cookieName: "christmas-wish-received" } // 圣诞节
];


function checkForHolidayWishes() {
  var today = new Date();
  var monthDayStr = today.toLocaleDateString("zh-CN", { month: "2-digit", day: "2-digit" }).replace('/', '-');

  for (var i = 0; i < holidayWishes.length; i++) {
    var holiday = holidayWishes[i];
    var alreadyReceived = localStorage.getItem(holiday.cookieName) || false;

    if (monthDayStr === holiday.date && !alreadyReceived) {
      alert(holiday.message, 8000);
      console.log("假期祝福已送出~")
      localStorage.setItem(holiday.cookieName, true);
    }
    else if(monthDayStr === holiday.date && alreadyReceived) console.log("已经送过祝福了~");
  }
}

checkForHolidayWishes();


if(document.getElementById("footer")!=null){
document.getElementById('footer').innerHTML = "<br><HR style='FILTER:alpha(opacity=100,finishopacity=0,style=3)' width='90%' color=#C0C0C0 SIZE=3><div><h3 id='留言板'>留言板</h3><div class='mdui-table-fluid mdui-table th' style='margin-left:1%;width:98%;'><br><form action='/comment/comment.php' method='post'><table class='mdui-table'><tbody><tr><th><label class='mdui-textfield-label'>昵称</label><input type='text' class='mdui-textfield-input' name='name' placeholder='请输入昵称(小于25字)' required='required' maxlength='25' style='width:98%;'><br><label class='mdui-textfield-label'>评论</label><input type='text' class='mdui-textfield-input' name='comment' placeholder='要讲文明哟~(小于200字)' required='required' maxlength='200' style='width:98%;'><br><label class='mdui-textfield-label'>电邮</label><input type='text' class='mdui-textfield-input' name='contact' placeholder='或者其他联系方式（选填）' maxlength='200' style='width:98%;'><br><center><input class='mdui-btn mdui-ripple mdui-btn-raised mdui-btn-dense mdui-color-theme' type='submit' id ='submitButton' value='发送' onclick=''></center></th></tr></tbody></table></form><br><embed src='/comment/comment.txt' width='90%'/></div></div><br><div style='margin-bottom:15px;'><font size='2' color=#C0C0C0>©2022-2023 Powered by <a href='https://github.com/Tvogmbh/' target='_blank' style='display:inline-block;text-decoration: none;'><font size='2' color='#C0C0C0' target='_blank'>Tvogmbh</font></a> · Pro-Ivan Studio 版权所有</font><br><a href='https://stats.uptimerobot.com/Oo6ykFNrDn' target='_blank' style='display:inline-block;text-decoration: none;'><font size='2' color=#C0C0C0>站点在线状态</font></a><font size='2' color=#C0C0C0> · </font><a href='/test_server/' target='_blank' style='display:inline-block;text-decoration: none;'><font size='2' color=#C0C0C0>网站服务状态</font></a><br><a href='http://beian.miit.gov.cn' style='display:inline-block;text-decoration:none;height:20px;line-height:20px;' target='_blank'><font size='2' color=#C0C0C0>京ICP备2022003448号-1/2</font></a><font size='2' color=#C0C0C0> · </font><a target='_blank' href='http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11011402012324' style='display:inline-block;text-decoration:none;height:20px;line-height:20px;'><img src='/beian.png' style='float:left;'/><font size='2' color=#C0C0C0>京公网安备 11011402012324号</font></a></div>";
}