<?php
    date_default_timezone_set("Asia/Shanghai");
    $title = $_POST["channel0Title"]; //You have to get the form data
    $subtime=date("Y-m-d H:i:s");
    $file = fopen('chouka.txt', 'a'); //Open your .txt file
    //ftruncate($file, 0); //Clear the file to 0bit
    $content = $title. PHP_EOL."  Time.   ". $subtime. "(UTC+8)". PHP_EOL. "---------". PHP_EOL;
    fwrite($file , $content); //Now lets write it in there
    fclose($file ); //Finally close our .txt
    header("refresh:0;url=/index.html");
    
?>
