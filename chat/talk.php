<?php
	session_start();
	header("Content-Type:text/html; charset=utf-8");
	header("CACHE-CONTROL:NO-CACHE");
	include_once 'config.php';
	include_once 'func.php';
?>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 12px;
	margin-top: 12px;
	background-color:#e5eefa;
}
-->
</style>
<script language="javascript" src="main.js"></script>
<script language="javascript" src="xmlhttprequest.js"></script>
<!--<body onLoad="javascript:top.bottomFrame.talk.cont.focus();" oncontextmenu=self.event.returnValue=false>-->
<body onLoad="javascript:top.bottomFrame.talk.cont.focus();" oncontextmenu=self.event.returnValue=false>
<table border="0" cellpadding="0" cellspacing="0">
<form id="talk" name="talk" action="talk.php?action=send">
	<tr>
		<td height="12" colspan="6"></td>
	</tr>
	<tr>
		<td height="25"  colspan="2">表情：
<select id="face" name="face" size="1">
	
</select>
		</td>
		<td>字体颜色：
<select name="color" size="1" id="select">
	<option value="000000">默认颜色</option>
	<option style="color:#FF0000" value="FF0000">红色</option>
	<option style="color:#0000FF" value="0000ff">蓝色</option>
	<option style="color:#ff00ff" value="ff00ff">粉色</option>
	<option style="color:#009900" value="009900">绿色</option>
	<option style="color:#009999" value="009999">青色</option>
	<option style="color:#990099" value="990099">紫色</option>
	<option style="color:#990000" value="990000">褐色</option>
	<option style="color:#000099" value="000099">深蓝</option>
	<option style="color:#ff9900" value="ff9900">金色</option>
	<option style="color:#999999" value="999999">灰色</option>
</select></td>
		<td>是否滚屏：<input id="rollscreen1" name="rollscreen1" type="checkbox"  onClick="changeroll(talk)" /></td>
		<!--<td><input type="button" value="退出聊天室" onClick="alert('再见~');top.window.close()" style=" border:1px #e5eefa solid;"/> </td>-->
        <td><input type="button" value="退出聊天室" onClick="logout()" style=" border:1px #e5eefa solid;"/> </td>
		<td><iframe id="tail" frameborder="0" src="tail.php" style="display:none;"></iframe></td>
	</tr>
	<tr class="6" height="10">
		<td><div id='itail' style="display:none;"><script> timer = window.setTimeout("logout()",<?php echo MAXTIME;?>);  </script></div></td></tr>
	<tr>
		<td><input id="user" name="user" type="text" size="5" value="<?php echo $_SESSION['user'];?>" readonly=""  style=" text-align:right;"/>
		对：</td>
		<td>
          <div id="obtobt">
            <select id="obt" name="obt">
            <?php
                foreach($_SESSION['per'] as $value){
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }
            ?>
            </select>
          </div>
		</td>
	<td colspan="3">说：
	  <textarea name="cont" cols="50" id="cont"></textarea></td>
	<td><input type="submit" style=" border:1px #e5eefa solid;" value="发言" onClick="return tk(talk,<?php echo MAXTIME;?>)"/></td>
	</tr>
</form>	
</table>
</body>
