<?php
require 'vendor/autoload.php';
 
use Upyun\Config;
use Upyun\Upyun;


$img=$_FILES['file'];
$platform=$_POST['platform'];
$author=$_POST['author'];
//你自己创建的服务的名称
$serviceName = 'pro-ivan-cloud';
//操作员账号
$operator = 'yujionako';
//操作员密码
$password = 'kggp4aWK2Bum5NHDL515hiYaiNb9afPL';
//要上传到哪个目录下
$directory = '/imgbed/upload_pic/';
//要上传的文件的绝对路径(请换成你电脑上一个图片文件的路径)
$uploadFilePath = $_FILES['file'];
//上传文件名，为什么上传文件名要叫key而不叫filename呢？因为对象存储其实就是一个key value
//的存储结构，你可以认为它就是个redis，key就是redis键名，value就是这个key对应的内容。
if (!empty($platform)||!empty($author)){
    $key = date('YmdHis',time()) .'-' .$platform .'@' .$author .'-' .$uniqid.'.'.$suffix[$count-1];
}
else{
    $key = date('YmdHis',time()) .'-' .$uniqid.'.'.$suffix[$count-1];
}
//又拍云默认域名在：云存储→选择一个服务并点配置→配置的第一项默认就是域名管理→滚动到最后就能看到默认域名
$defaultDomain = 'http://us.pro-ivan.com';
 
//在对象存储中，其实并没有实际意义上的"目录"(或者叫"文件夹")，整个文件夹和最后的key一起，组成的一个整体也是key
//举例：我要把文件存到"2020/06/02/test.jpg"，那么这整个就是一个key，而内容当然就是test.jpg这张图片的二进制数据了。
if($directory){
    //真正使用时，$directory可能是用户传过来的，在不知道用户是否写了右斜杠的情况下，统一先去掉再添加一个
    $key = rtrim($directory, '/') . '/' . $key;
}
 
//使用又拍云php-sdk上传文件非常方便，很new一个config对象
$serviceConfig = new Config($serviceName, $operator, $password);
// 15728640 = 15M，如果文件大于15M，则使用并行分块上传
if(filesize($uploadFilePath) > 15728640){
    /* uploadType有两个值
       - BLOCK : 串行分块上传
       - BLOCK_PARALLEL : 并行分块上传
    */
    //然后可对new出的config对象的属性继续设置参数(有哪些参数可直接查看Config类: vendor/upyun/sdk/src/Upyun/Config.php)
    //设置uploadType=BLOCK_PARALLEL表示使用并行分片上传
    $serviceConfig->uploadType = 'BLOCK_PARALLEL';
}
$client = new Upyun($serviceConfig);
$fp = fopen($uploadFilePath, 'rb');
$retArr = $client->write($key, $fp);
// var_dump($retArr);exit;
 
/*
 * 返回的$retArr的值
 * array(6) {
      'x-upyun-content-length' =>
      string(5) "47028"
      'x-upyun-height' =>
      string(3) "473"
      'x-upyun-content-type' =>
      string(9) "image/png"
      'x-upyun-file-type' =>
      string(3) "PNG"
      'x-upyun-width' =>
      string(3) "839"
      'x-upyun-frames' =>
      string(1) "1"
    }
 */
 
//我们随便拿一个元素来判断是否上传成功
if(isset($retArr['x-upyun-content-length'])){
    //在实际使用中，$key可能是用户传过来的，在不知道$key是否以斜杠开头的情况下，统一先去掉再自己添加一个
    echo $defaultDomain . '/' . ltrim($key);
}else{
    echo 'Upload failed.';
}
?>