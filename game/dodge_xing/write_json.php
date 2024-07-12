<?php
error_reporting(E_ERROR);
// 获取 POST 请求的数据
$data = file_get_contents('php://input');

// 将数据解码为 PHP 数组
$data = json_decode($data, true);

//反非法POST
session_start();
if (!isset($data["token"]) || $data["token"] !== $_SESSION["token"]) {http_response_code(403); exit("奶奶滴，小游戏也要作弊是吧".$data["token"].$_SESSION["token"]);}
//反异域名数据
if(!isset($_SERVER['HTTP_REFERER']) || parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) !== $_SERVER['HTTP_HOST']) {http_response_code(403); exit("奶奶滴，小游戏也要作弊是吧");}

// 读取 JSON 文件
$file = 'score.json';
$json = file_get_contents($file);
$scores = json_decode($json, true);

//检查是否有名字，无名字则退出；检查是否密度大于25，否则退出
if(empty($data['name'])) exit("空名字");

function strPosFuck($content) {   //检查名字中是否含有非法词语
    $fuck = file_get_contents('bannedword.txt');  // 读取关键字文本信息  
    $content = trim($content);    $fuckArr = explode("\n",$fuck);  // 把关键字转换为数组  
    for ($i=0; $i < count($fuckArr) ; $i++)   
    {  
    // $fuckArr[$i] = trim($fuckArr[$i]);  
    if ($fuckArr[$i] == "") {     
    continue;  //如果关键字为空就跳过本次循环   
    # code...   
    }    
    if (strpos($content, trim($fuckArr[$i])) != false || $content == trim($fuckArr[$i]))    
      {    
      return trim($fuckArr[$i]);  //如果匹配到关键字就返回关键字     
      # code...     
      }   
      }    return false;  // 如果没有匹配到关键字就返回 false 
}   
$key = strPosFuck($data['name']); 
if ($key) 
{  
$data['name'] = str_replace($key,"*",$data['name']);
echo ("违禁词:".$key);
} 

// 检查是否有重名的记录，如果有且分数更大，则覆盖旧的记录
$existing_score = null;
foreach ($scores as $index => $score) {
    if ($score['name'] === $data['name']) {
        $existing_score = $index;
        break;
    }
}
if ($existing_score !== null) {
    if ($scores[$existing_score]["score"] < $data["score"]){
        $scores[$existing_score] = $data;
    }
    else exit();
} else {
    // 添加新的记录
    $scores[] = $data;
}

// 将新的得分写入 JSON 文件
$json = json_encode($scores, JSON_PRETTY_PRINT);
file_put_contents($file, $json);

?>
