<!DOCTYPE html>
<html lang="zh_CN">
    
    <body>
        <div id="content">
        <?php
            $username = $_GET["username"];
            $password = $_GET["password"];
            if (intval($username) == 0 ) exit('<script>window.open("../", "_self");</script>'); 
            if (strlen(strval($username))!=10||empty($_GET['username'])||empty($_GET['password'])) exit('<script>window.open("../", "_self");</script>');
            $json_string = file_get_contents("./.list");// 从文件中读取数据到PHP变量
            $data = json_decode($json_string,true);// 把JSON字符串转成PHP数组
            $count = count($data);
            if(!in_array($username, $data)){
                $data[]=$username;
                sort($data);
                $json_strings = json_encode($data);
                //echo $json_strings;
                file_put_contents("./.list",$json_strings);//写入
            }
            echo "<h2>&nbsp;</h2><h1>你被骗了!!!</h1>我们已经知道了<br>你的学号是<b>".$username."</b><br>你的密码是<b>".$password."</b><br>不过还好，这只是个测试<br>我们没有保存你的任何信息<br>下次记得了，不要随便点不明链接哦<br>熟人发的也一样！";
            echo '<head><meta charset="UTF-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>恭喜成为第'.$count.'个被骗者！</title><style type="text/css">body {margin: 0;background: url("./xibao.jpeg") white center top no-repeat;background-size: cover;}#content {white-space: nowrap;text-align: center;position: absolute;color: red;font-size: 1.6em;font-weight: ;/* 黄色边框 */text-shadow: -2px -2px 0 yellow, 0 -2px 0 yellow,1px -2px 0 yellow, 1px 0 0 yellow, 1px 1px 0 yellow,0 1px 0 yellow, -2px 1px 0 yellow, -2px 0 0 yellow;left: 0;right: 0;top: 20%;bottom: 0;margin: auto;}</style></head>';
        ?>
        </div>
    </body>
</html>