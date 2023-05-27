function  GetQueryString(name)
{
      var  reg = new  RegExp( "(^|&)" + name + "=([^&]*)(&|$)" );
      var  r = window.location.search.substr(1).match(reg);
      if (r!= null ) return   unescape(r[2]); return  null ;
}

var json_id = GetQueryString("json_id") 
// 读取json
var url = "./json/"+json_id+".json"/*json文件url，本地的就写本地的位置，如果是服务器的就写服务器的路径*/

var request = new XMLHttpRequest();

request.open("get", url);/*设置请求方法与路径*/

request.send(null);/*不发送数据到服务器*/

request.onload = function () {/*XHR对象获取到返回信息后执行*/

    if (request.status == 200) {/*返回状态为200，即为数据获取成功*/
    
        var data = JSON.parse(request.responseText);
        
        console.log(data);
        
        renderTimetable(data);
        renderTimeSet(data);
        renderNotice(data);
        renderTime(data);
        renderBigNotice(data);
        renderWeather(data);
        renderOther(data);
        setTimeout(function() {document.getElementById("flag").innerHTML = '<div id="done"></div>';}, 4000);
    }
    else{
        var path = window.location.pathname;
        var page = path.split("/").pop();
        if (page != "ERR.html")
            window.location.href="./ERR.html";
    }

}

// 设定时间
date = new Date()
var day = date.getDay(); //获取星期数0-6（0为周日）
var month = date .getMonth() + 1; //获取当前月份(0-11,0代表1月)
var date = date .getDate(); //获取当前日(1-31)
var cn_zh_day = ["日", "一", "二", "三", "四", "五", "六"] //星期数字汉字化



function renderTimetable (data) {
    document.getElementById("class1").innerHTML = data.timetable[day].class1;
    document.getElementById("class2").innerHTML = data.timetable[day].class2;
    document.getElementById("class3").innerHTML = data.timetable[day].class3;
    document.getElementById("class4").innerHTML = data.timetable[day].class4;
    document.getElementById("class5").innerHTML = data.timetable[day].class5;
    document.getElementById("class6").innerHTML = data.timetable[day].class6;
    document.getElementById("class7").innerHTML = data.timetable[day].class7;
    document.getElementById("class8").innerHTML = data.timetable[day].class8;
    document.getElementById("class9").innerHTML = data.timetable[day].class9;
    document.getElementById("class10").innerHTML = data.timetable[day].class10;
    document.getElementById("class11").innerHTML = data.timetable[day].class11;
    if (day == 0|day == 6) {
        document.getElementById("class0").innerHTML = "&nbsp;<br>&nbsp;";
    }
}

function renderTimeSet (data) {
    for (var i = 0; i < 12; i++){
        if (data.time_set[i]!=''){
            document.getElementById("time_set"+String(i)).innerHTML = data.time_set[i];
        }
    }
    if (data.time_set[5] == "0"){
        document.getElementById("time_set5").innerHTML = "&nbsp;";
        document.getElementById("class0").innerHTML = "&nbsp;<br>&nbsp;";
    }
}

function renderNotice (data) {
    if (data.notice[0]!="")
        document.getElementById("notice1").innerHTML = "1. " + data.notice[0];
    if (data.notice[1]!="")
        document.getElementById("notice2").innerHTML = "2. " + data.notice[1];
    if (data.notice[2]!="")
        document.getElementById("notice3").innerHTML = "3. " + data.notice[2];
    if (data.notice[3]!="")
        document.getElementById("notice4").innerHTML = "4. " + data.notice[3];
    if (data.notice[4]!="")
        document.getElementById("notice5").innerHTML = "5. " + data.notice[4];
}

function renderTime (data) {
    var time = month + "月" + date + "日 · 星期" + cn_zh_day[day]
    document.getElementById("time").innerHTML = time;
}

function renderBigNotice (data) {
    if (data.big_notice != 0)
        document.getElementById("big_notice").innerHTML = '<div class="box"><center style="font-size:28px;color:red;">'+data.big_info+'</center></div>';
}

function renderWeather (data) {
    if (data.weather != 0){
        var API_key = "867b1c44403a43ffae21e0b100bd5691";
        //document.getElementById("weather").innerHTML = `<div class="box"><center style="">`
        var request_url = `https://devapi.qweather.com/v7/weather/3d?location=${data.weather_lon},${data.weather_lat}&key=${API_key}`;
        var request2 = new XMLHttpRequest();
        request2.open("get", request_url);/*设置请求方法与路径*/
        request2.send(null);/*不发送数据到服务器*/
        request2.onload = function () {/*XHR对象获取到返回信息后执行*/
            if (request2.status == 200) {/*返回状态为200，即为数据获取成功*/
                var weather_data = JSON.parse(request2.responseText);
                setTimeout(function(){document.getElementById("weather").innerHTML = document.getElementById("weather").innerHTML + `日间${weather_data.daily[0].textDay} ${weather_data.daily[0].windDirDay}${weather_data.daily[0].windScaleDay}级 -> 夜间${weather_data.daily[0].textNight} ${weather_data.daily[0].windDirNight}${weather_data.daily[0].windScaleNight}级<br>气温 ${weather_data.daily[0].tempMin}至${weather_data.daily[0].tempMax}摄氏度 湿度 ${weather_data.daily[0].humidity}% 预计降水量  ${weather_data.daily[0].precip}毫米`;},0);
            }
            else
                document.getElementById("weather").innerHTML = document.getElementById("weather").innerHTML + "Get Weather ERR";
        }
        var request_url3 = `https://devapi.qweather.com/v7/warning/now?location=${data.weather_lon},${data.weather_lat}&key=${API_key}`;
        var request3 = new XMLHttpRequest();
        request3.open("get", request_url3);/*设置请求方法与路径*/
        request3.send(null);/*不发送数据到服务器*/
        request3.onload = setTimeout(function () {/*XHR对象获取到返回信息后执行*/
            if (request3.status == 200) {/*返回状态为200，即为数据获取成功*/
                var weather_data3 = JSON.parse(request3.responseText);
                if (weather_data3 != []){
                    var color={"White":"白色","Blue":"蓝色","Green":"绿色","Yellow":"黄色","Orange":"橙色","Red":"红色","Black":"黑色","":"","undefined":""};
                    for(var i=0;i<weather_data3.warning.length;i++){
                        document.getElementById("weather").innerHTML = document.getElementById("weather").innerHTML + `<br>${i+1}.${weather_data3.warning[i].sender}:${weather_data3.warning[i].typeName}${color[weather_data3.warning[i].severityColor]}预警(${(weather_data3.warning[i].startTime).replace("+08:00","").replace("T"," ")}到${(weather_data3.warning[i].endTime).replace("+08:00","").replace("T"," ")}生效)`
                    }
                }
            }
            else
                document.getElementById("weather").innerHTML = document.getElementById("weather").innerHTML + "<br>Get Warning ERR";
        },1500);
        setTimeout(function() {document.getElementById("weather").innerHTML = '<div class="box"><center style="">'+ document.getElementById("weather").innerHTML+'</center></div>';}, 3000);
        
    }
}

function renderOther (data) {
    document.getElementById("title").innerHTML = data.title;
    document.getElementById("subtitle").innerHTML = data.subtitle;
    document.getElementById("timetable_name").innerHTML = data.timetable_name;
    if (data.bg_img != ""){
        var css='body {background: url("' + data.bg_img + '") white center top no-repeat;background-size: cover;}'
        function add_css(str_css) { //Copyright @ rainic.com
            try { //IE下可行
            var style = document.createStyleSheet();
            style.cssText = str_css;
            }
            catch (e) { //Firefox,Opera,Safari,Chrome下可行
            var style = document.createElement("style");
            style.type = "text/css";
            style.textContent = str_css;
            document.getElementsByTagName("HEAD").item(0).appendChild(style);
            }
        }
        add_css(css)
    }
    if (data.head_img != ""){
        document.getElementById("head_img").src = data.head_img
    }
}



