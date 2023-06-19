<?php
        ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)');
        $part = $_POST["part"];
        $partment = $_POST["partment"];
        $floor = $_POST["floor"];
        $drom = $_POST["drom"];

        $url = "http://app.bupt.edu.cn/buptdf/wap/default/search";
        $data = array(
        'dromNumber'=>$drom
        );
        $options = array(
            'http' => array(
                'header'  => "content-type:application/json\r\nCookie: eai-sess=80gp61j42746jk0cv9oulhrm04",
                'method'  => 'POST',
                'content' => $data,
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $data = json_decode($result, true);
        $surplus = $data["d"]["data"]["surplus"];
        echo "您选择的宿舍电费余额为：" . $surplus;
?>
    