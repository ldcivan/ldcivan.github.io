<?php
require 'email.class.php';

$mailto = $_POST["mailto"]; //收件人
$subject = $_POST["subject"];; //邮件主题
$body = $_POST["body"];; //邮件内容

function sendmailto($mailto, $mailsub, $mailbd)
{
  //require_once ('email.class.php');
  //##########################################
  $smtpserver   = "ssl://smtp.ym.163.com"; //SMTP服务器
  $smtpserverport = 465; //SMTP服务器端口
  $smtpusermail  = "ldcivan@pro-ivan.cn"; //SMTP服务器的用户邮箱
  $smtpemailto  = $mailto;
  $smtpuser    = "ldcivan@pro-ivan.cn"; //SMTP服务器的用户帐号
  $smtppass    = "Ldc123456"; //SMTP服务器的用户密码
  $mailsubject  = $mailsub; //邮件主题
  $mailsubject  = "=?UTF-8?B?" . base64_encode($mailsubject) . "?="; //防止乱码
  $mailbody    = $mailbd; //邮件内容
  //$mailbody = "=?UTF-8?B?".base64_encode($mailbody)."?="; //防止乱码
  $mailtype    = "HTML"; //邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常
  ##########################################
  $smtp      = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
  $smtp->debug  = FALSE; //是否显示发送的调试信息
  $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    sendmailto($mailto,$subject,$body);
    //echo "finish".date('时间：Y年m月d日  H:i');
    $file = fopen('./email.txt', 'a');
    $content = "已将内容 " .$subject ."--" .$body ." 发送到 " .$mailto .PHP_EOL;
    fwrite($file , $content); //Now lets write it in there
    fclose($file);
    echo $content;
}
?>
            