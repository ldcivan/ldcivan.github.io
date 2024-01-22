<?php
    if($_COOKIE["ifbot"] == "by9X45eN7UMI0o75CR9t65eX7cvB88C98ny74bU8C74Xw577N9j"){
        echo ("//Checkpoint 1 Pass". PHP_EOL);
        if($_COOKIE["type"] == "0"){
            echo ("//Checkpoint 2 Pass (Code:0)". PHP_EOL);
            $delete = 2;
        }
        elseif ($_COOKIE["ifbottype"] == "x3X43W547897bM89I54c656drS6f5C6ju7v678f64bynUn8ONU98p") {
            echo ("//Checkpoint 2 Pass". PHP_EOL);
            $delete = 0;
        }
        else{
            echo ("//Checkpoint 2 Failed". PHP_EOL);
            $delete = 1;
        }
    }
    else{
        echo ("//Checkpoint 1 Failed". PHP_EOL);
            $delete = 1;
    }
    
    
    if($delete == 1){
        echo ("window.open('/ifbot/passgive.php', '_self');". PHP_EOL);
    }
    elseif($delete == 2){
        echo ("window.open('/building.php', '_self');". PHP_EOL);
    }
?>