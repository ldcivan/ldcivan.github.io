<title>日程API设置</title>

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
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((res)=>{showPosition(res)}, (err)=>{showError(err)},{timeout:1500});
            } else {
                alert("该浏览器不支持获取地理位置。");
            }
        }

        function showPosition(position) {
            document.getElementById("weather_lat").value = position.coords.latitude.toFixed(2)
            document.getElementById("weather_lon").value = position.coords.longitude.toFixed(2)
            alert(`已自动填入经纬度：${position.coords.longitude.toFixed(2)},${position.coords.latitude.toFixed(2)}`);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("用户拒绝对获取地理位置的请求。")
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("位置信息是不可用的，您可以尝试使用Firefox或自行查询经纬度。")
                    break;
                case error.TIMEOUT:
                    alert("请求用户地理位置超时，您可以尝试使用Firefox或自行查询经纬度。")
                    break;
                case error.UNKNOWN_ERROR:
                    alert("未知错误，您可以尝试使用Firefox或自行查询经纬度。")
                    break;
            }
        }
</script>

<style>
    body {
        margin:20 30 20 30;
    }
    .content {
        margin-left:20px;
    }
</style>
<?php
$arr = "notice";
$json_id = $_GET["json_id"];

if($_GET["json_id"]){
    if(is_file("./resource/common/json/".$json_id.".json")){
        echo "<h5>请注意：您正在编辑一个已经存在的配置文件，ID为<font color=red>".$json_id."</font><br>请确保这确实是您的配置，以免给他人造成不便</h5>";
        $json_string = file_get_contents("./resource/common/json/".$json_id.".json");// 从文件中读取数据到php变量
    }
    else{
        echo "<h5>请注意：您正在创建一个新的配置文件，ID为<font color=red>".$json_id."</font><br>预览前请先更新一次，否则预览无效</h5>";
        $isLegal = preg_match("/^[A-Za-z0-9]+$/",$_GET["json_id"]);
        if(!$isLegal){
            echo "<h5 style='color:red;'>您欲设置的ID似乎不是纯英文数字，这可能导致配置无法保存</h5>";
        }
        $json_string = file_get_contents("./resource/common/default.json");
    }
}
else{
    echo "<h5>请注意：您尚未指定json_id<br>如果您是首次配置，可在下方确认json_id处填写您心仪的ID号，并填入daily_info.js<br >您的ID应为纯数字并足够独特，以免与他人使用了相同ID</h5>";
    $json_string = file_get_contents("./resource/common/default.json");
}
$data = json_decode($json_string,true);// 把json字符串转成php数组
echo "<h3>通告(不用编号，按顺序写会自动编号)</h3><form method='post' action='./write.php'><div class='content'>";
try{
    for ($i = 0; $i < 5; $i++){
        echo "<input id= '".$i."' name='".$i."' type='text' style='width:80%;'; value='";
        print $data[$arr][$i];
        echo "'><button type='button' onclick='swapText(".($i - 1).",".$i.")'>上移</button><button type='button' onclick='swapText(".$i.",".($i + 1).")'>下移</button><button type='button' onclick='deleteText(".$i.")'>清空</button><br>";
    }
}
catch (Exception $e) {
    exit();
}
echo "</div><br><hr><h3>是否开启大字提示</h3><div class='content'><lable>开启<input id= 'big_notice' name='big_notice' type='checkbox' value='1'";
if($data["big_notice"] == 1) 
    echo "checked=checked";
echo "></lable><br><lable>内容<input id= 'big_info' name='big_info' type='text' value='";
echo $data["big_info"];
echo "' style='width:80%;'></div><br><br><hr><h3>课表(一列为一日，第一列为周日)</h3><div class='content'>";
try{
    for ($i = 1; $i < 12; $i++){
        for ($j = 0; $j < 7; $j++){
            echo "<input id= '".$j.$i."' name='".$j.$i."' type='text' style='width:14.2%;'; value='";
            print $data["timetable"][$j]["class".$i];
            echo "'>";
        }
        echo "<br>";
    }
}
catch (Exception $e) {
    exit();
}
echo "</div><h3>课表时间段设置(留空则使用默认时间;第六空为午休时间，填0则不设置午休)</h3><div class='content'>";
try{
    for ($i = 0; $i < 12; $i++){
        echo "<input id= 'time_set".$i."' name='time_set".$i."' type='text' style='width:12%;'; value='";
        print $data["time_set"][$i];
        echo "'>";
        if ($i==5) echo "<br>";
    }
}
catch (Exception $e) {
    exit();
}

echo "</div><br><hr><h3>是否开启天气提示</h3><div class='content'><lable>开启<input id= 'weather' name='weather' type='checkbox' value='1'";
if($data["weather"] == 1) 
    echo "checked=checked";
echo "></lable><br><lable>纬度<input id= 'weather_lat' name='weather_lat' type='text' value='";
echo $data["weather_lat"];
echo "' style='width:%;'></lable> <lable>经度<input id= 'weather_lon' name='weather_lon' type='text' value='";
echo $data["weather_lon"];
echo "' style='width:%;'></lable>";

echo "</div><br><br><hr><h3>杂项</h3><div class='content'>主标题：<input id= 'title' name='title' type='text' value='";
print $data["title"];
echo "'><br>备忘录标题：<input id= 'subtitle' name='subtitle' type='text' value='";
print $data["subtitle"];
echo "'><br>课表标题:<input id= 'timetable_name' name='timetable_name' type='text' value='";
print $data["timetable_name"];
echo "'><br>头像url(留空则使用默认头像)：<input id= 'head_img' name='head_img' type='text' value='";
print $data["head_img"];
echo "'><br>背景url(留空则使用默认背景)：<input id= 'bg_img' name='bg_img' type='text' value='";
print $data["bg_img"];
echo "'><br>可在<a href='http://www.pro-ivan.com/new-upload.html' target='_blank'>此处</a>上传头像或背景，并自行复制链接填入框体</div>";

echo "<hr>请确认好您的json_id是：<input id= 'json_id' name='json_id' type='text' value='";
echo $json_id;
echo "' style='width:30%;'><br>*若非第一次配置，请勿随意更改上面一栏以免保存错误";
echo "<br><br><button type='submit' style='width:70px;height:30px;'>确定更新</button></div></form><button style='width:70px;height:30px;margin-left:0px;width:70px;height:30px;' onclick='preview()'>查看效果</button><button style='width:70px;height:30px;margin-left:0px;width:70px;height:30px;' onclick='getLocation();'>获取定位</button>";
echo ('<script>function preview(){window.open("./resource/common/daily_info.html?json_id='.$json_id.'", "_blank", "scrollbars=yes,resizable=1,modal=false,alwaysRaised=yes,width=1000,height=980");}</script>');
exit ('
<script>
function swapText(currentIndex, targetIndex) {
    if (currentIndex == -1) currentIndex = 4;
    if (targetIndex == 5) targetIndex = 0;
  // 获取当前文本框和目标文本框的值
  const currentText = document.getElementById(currentIndex).value;
  const targetText = document.getElementById(targetIndex).value;

  // 交换文本框的值
  document.getElementById(currentIndex).value = targetText;
  document.getElementById(targetIndex).value = currentText;
}

function deleteText(Index) {
    if (Index == -1) Index = 4;
    if (Index == 5) Index = 0;

  // 交换文本框的值
  document.getElementById(Index).value = "";
}
</script>
')
?>

