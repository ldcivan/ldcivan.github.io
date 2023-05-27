<?php
    date_default_timezone_set("Asia/Shanghai");
    $title = $_POST["channel0Title"]; //You have to get the form data
    $gain = $_POST["channel0Gain"];
    $subtime=date("Y-m-d H:i:s");
    $file = fopen('./comment.txt', 'a'); //Open your .txt file
    //ftruncate($file, 0); //Clear the file to 0bit
    $content =  $title. PHP_EOL. $gain. PHP_EOL. "-". PHP_EOL;
    fwrite($file , $content); //Now lets write it in there
    fclose($file ); //Finally close our .txt
    print('<br>留档成功!!如有更新我们将尽快邮件通知您!');
    echo '<br>点击<a href=';
    echo $_SERVER["HTTP_REFERER"];
    echo '>此处</a>以返回';
    //die(header("Location: ".$_SERVER["HTTP_REFERER"]));
?>