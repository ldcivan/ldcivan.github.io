<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?90415f833f988b0bccfb250d70f115f6";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<?php
$json_id = $_GET["json_id"];
if (!$_GET["json_id"]){
    Header("Location: ./resource/common/ERR.html");
}else{Header("Location: ./resource/common/daily_info.html?json_id=".$json_id);}
?>
