


<?php
//1、设置编码utf8
header("Content-Type: text/html; charset=UTF-8");
//2、获取文件信息
$shangchuan = $_FILES['file'];
if ($shangchuan['type'] != "image/jpg" && $shangchuan['type'] != "image/jpeg" && $shangchuan['type'] != "image/png" && $shangchuan['type'] != "image/gif") {
  //9、输出：失败
  echo '失败--类型不符，仅允许上传jpg，jpeg，png，gif';
  header("refresh:3;url=/new-upload.html");
  print('<br>正在返回上传页面<br>三秒后自动跳转...');
  die();
}
if ($shangchuan['size'] > 50000000) {
  //9、输出：失败
  echo '失败--大小不符，图片大小应小于50000000kb';
  header("refresh:3;url=/new-upload.html");
  print('<br>正在返回上传页面<br>三秒后自动跳转...');
  die();
}

$uniqid = md5(uniqid(microtime(true),true));
//增加放重复的md5码

//7、移动临时文件到上传的文件存放位置（核心代码）
copy($shangchuan['tmp_name'], '/www/wwwroot/pro-ivan.cn/upload_pic/' .$uniqid.'.'.$shangchuan['name']);
//8、输出：成功
echo '上传成功至<a href=/upload_pic/';
echo $uniqid.$shangchuan['name'];
echo '>此处</a>';
header("refresh:5;url=/new-upload.html");
print('<br>正在返回上传页面,如有需要请点击链接至上传目标以复制链接<br>五秒后自动跳转...');
?>