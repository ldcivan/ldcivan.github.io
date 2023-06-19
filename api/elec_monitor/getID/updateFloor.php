<?php
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)');
$part = $_POST["part"];
$partment = $_POST["partment"];

$url = "http://app.bupt.edu.cn/buptdf/wap/default/floor";
$data = array(
'areaid'=>intval($part),
'partmentId'=>$partment
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
echo $result;
$data = json_decode($result, true);
$floorSelect = "";
for ($i = 0; $i < count($data["d"]["data"]); $i++) {
    $option = "<option value='" . $data["d"]["data"][$i]["floorId"] . "'>" . $data["d"]["data"][$i]["floorName"] . "</option>";
    $floorSelect .= $option;
}
echo $data;
echo $floorSelect;
?>