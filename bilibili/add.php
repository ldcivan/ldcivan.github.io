<!--
<form class="mdui-textfield mdui-textfield-floating-label" action="" method="post" style="margin-right:23px;">
  <div class="mdui-panel-item-header" style="pointer-events:none;">
	<div class="mdui-panel-item-title"><b style="color:black;font-size:1.5rem;">添加器</b></div>
	<div class="mdui-panel-item-summary"></div>
  </div>
  <i class="mdui-icon material-icons">account_circle</i>
  <label class="mdui-textfield-label">请输入目标uid</label>
  <input class="mdui-textfield-input" type="text" name="new_uid" id="new_uid"/>
  <div class="mdui-textfield-helper">暂不支持昵称嗷~</div>
  <input id="add" class="mdui-btn mdui-color-theme mdui-text-color-white-text" type="submit" name="sub" value=" 添 加 " style="display:none;" />
</form>
<button class="mdui-btn mdui-color-theme mdui-text-color-white-text" onclick="document.getElementById('add').click()" style="margin-right:24px;float:right;"> 添 加 </button><br>
-->
<?php
    session_start();  // 启动会话

    $limit = 60;  // 间隔阈值
    $currentTime = time();  // 当前时间戳
    
    if (isset($_SESSION['lastAccessTime'])) {
        $lastAccessTime = $_SESSION['lastAccessTime'];
    
        if ($currentTime - $lastAccessTime < $limit) {
            // 访问频率超过限制，执行相应的操作，比如拒绝访问或提示用户稍后再试
            exit('<script>alert("访问频率过高，请等待2分钟后再试！");window.open("'.$_SERVER['HTTP_REFERER'].'", "_self");</script>');
        }
    }
    
    
    require '/www/wwwroot/pro-ivan.cn/comment/email.class.php';
    if(empty($_POST['new_uid'])) exit('<script>alert("空值，请输入合法uid");window.open("/bilibili", "_self");</script>');
    if(!empty($_POST['new_uid'])){
        if(intval($_POST['new_uid']) == 0){
            $key = str_replace('uid:','',$_POST['new_uid']);
            $key = str_replace('UID:','',$key);
            if(intval($key) != 0) $new_uid = intval($key);
            else{
                $key = str_replace('https://','',$_POST['new_uid']);
                $key = str_replace('http://','',$key);
                preg_match('/\/(\d+)/',$key,$key_trans);
                if(intval($key_trans[1]) == 0) exit ("<script>alert('你可能输入的不是合法的uid或up主页链接')</script><meta http-equiv='refresh' content='0;url=./'>");
                else $new_uid = intval($key_trans[1]);
            }
        }
        else $new_uid = intval($_POST['new_uid']);
        //$new_uid = intval($_POST['new_uid']);
        //if($new_uid == 0) exit('<script>alert("uid应该是一个整数！");window.open("/bilibili", "_self");</script>');
        
        //echo ('<script>alert("提交了uid：'.$new_uid.'")</script>');
        //echo ("提交了uid：".$new_uid);

        $url = 'https://api.bilibili.com/x/web-interface/card?mid='.$new_uid;
        
        function check_url($url)
        {
        	$httpcode = 0;
            $ch = curl_init();
            $timeout = 3; // 设置超时的时间[单位：秒]
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch,CURLOPT_URL,$url);
            $jsondata = explode("\r\n\r\n", curl_exec($ch), 2)[1];
            # 获取状态码赋值
            $info = json_decode($jsondata,true);// 把JSON字符串转成PHP数组
            return $info;
        }
        //echo(check_url($url));
        $check_result = check_url($url);
        if($check_result['code'] !== 0) exit('<script>alert("无法拉取该uid对应页面！请检查uid或稍后再试……(code:'.$check_result['code'].')");window.open("/bilibili", "_self");</script>');
        if($check_result['data']['card']['fans'] < 500) exit('<script>alert("过低的粉丝量'.$check_result['data']['card']['fans'].'，请尽量观测粉丝数500以上的up主！");window.open("/bilibili", "_self");</script>');

        $json_string = file_get_contents("/www/wwwroot/pro-ivan.cn/bfanscount/.config");// 从文件中读取数据到PHP变量
        $data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
        if(!in_array($new_uid, $data)){
            $data[]=$new_uid;
            sort($data);
            $json_strings = json_encode($data);
            //echo $json_strings;
            file_put_contents("/www/wwwroot/pro-ivan.cn/bfanscount/.config",$json_strings);//写入
            
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
              $smtp->debug  = FALSE; //是否显示发送的调试信息
              $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
            }
            $subtime=date("Y-m-d H:i:s");
            $mailto='2531667489@qq.com'; //收件人
            $subject="新增观测对象"; //邮件主题
            $body="<b><font size=2.5>New_UID <a href='https://space.bilibili.com/" .$new_uid ."'>". $new_uid ."</a></font></b>"; //邮件内容
            sendmailto($mailto,$subject,$body);
            
            $_SESSION['lastAccessTime'] = $currentTime;  // 更新最后访问时间
            echo('<script>alert("验证成功，已经写入uid '.$new_uid.'(昵称：'.$check_result['data']['card']['name'].')，将在下一次观测中使用");window.open("/bilibili", "_self");</script>');
        }
        else {
            exit('<script>alert("uid已在观测列表！");window.open("/bilibili/?uid='.$new_uid.'", "_self");</script>');
        }
    }
?>