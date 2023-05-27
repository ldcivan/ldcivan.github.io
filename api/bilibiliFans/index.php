<?php
$uid = $_GET["uid"];
if($uid!=""){
header('Content-Type:application/json');
$str = file_get_contents('../../bfanscount/json/'.$uid.'.json');
echo $str;
}
else {
    echo "<meta charset='UTF-8'>";
    echo "使用GET方法传递 uid 到此处即可获取对应up的粉丝变动信息（json格式）";
}
exit()
?>