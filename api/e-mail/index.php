<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?90415f833f988b0bccfb250d70f115f6";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

这是电邮公共api，请以POST或者GET的方式将mailto（收件人），subject（主题），body（正文）传递到此处<br>
<?php
require 'email.class.php';
if($_POST["mailto"])
    $mailto = $_POST["mailto"]; //收件人
else 
    $mailto = $_GET["mailto"];
if($_POST["subject"])
    $subject = $_POST["subject"]; //邮件主题
else 
    $subject = $_GET["subject"];
if($_POST["body"])
    $body = $_POST["body"]; //邮件内容
else 
    $body = $_GET["body"];



function sendmailto($mailto, $mailsub, $mailbd)
{
  //require_once ('email.class.php');
  //##########################################
  $smtpserver   = "ssl://smtp.ym.163.com"; //SMTP服务器
  $smtpserverport = 465; //SMTP服务器端口
  $smtpusermail  = "no-reply@pro-ivan.cn"; //SMTP服务器的用户邮箱
  $smtpemailto  = $mailto;
  $smtpuser    = "no-reply@pro-ivan.cn"; //SMTP服务器的用户帐号
  $smtppass    = "Ldc123456"; //SMTP服务器的用户密码
  $mailsubject  = $mailsub; //邮件主题
  $mailsubject  = "=?UTF-8?B?" . base64_encode($mailsubject) . "?="; //防止乱码
  $mailbody    = $mailbd; //邮件内容
  //$mailbody = "=?UTF-8?B?".base64_encode($mailbody)."?="; //防止乱码
  $mailtype    = "HTML"; //邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常
  ##########################################
  $smtp      = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
  $smtp->debug  = true; //是否显示发送的调试信息
  $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
}
if (($_SERVER['REQUEST_METHOD'] === "POST"||"GET") && ($_POST["mailto"]||$_GET["mailto"]) && ($_POST["body"]||$_GET["body"])) {
    echo ("<br>以下是发送任务日志：<br><pre>");
    sendmailto($mailto,$subject,$body."<br><hr><font size=2 color=#555>来自<a href='https://pro-ivan.com/api/e-mail/'>Pro-Ivan</a>提供的发送服务<br>Do not reply.</font>");
    echo ("</pre>");
    //echo "finish".date('时间：Y年m月d日  H:i');
    $file = fopen('./email.txt', 'a');
    $content = "已完成任务：将 " .$subject ."--" .$body ." 发送到 " .$mailto .PHP_EOL;
    fwrite($file , $content); //Now lets write it in there
    fclose($file);
    echo $content;
}
?>
            