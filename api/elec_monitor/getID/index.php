<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>宿舍电费查询</title>
	<style>
		label {
			display: block;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<h1>宿舍电费查询</h1>
	<form>
		<label>您所在的校区：
			<select id="part">
			    <option value="0">请选择</option>
				<option value="1">西土城</option>
				<option value="2">沙河</option>
			</select>
		</label>
		<label>请选择宿舍楼：
			<select id="partment">
			    <option value="0">请选择</option>
			</select>
		</label>
		<label>请选择楼层：
			<select id="floor">
			    <option value="0">请选择</option>
			</select>
		</label>
		<label>请选择宿舍：
			<select id="drom">
			    <option value="0">请选择</option>
			</select>
		</label>
		<button type="button" onclick="query()">查询</button>
	</form>
	<p id="result"></p>
	
	<script>
	    function query() {
            var part = document.getElementById("part").value;
            var partment = document.getElementById("partment").value;
            var floor = document.getElementById("floor").value;
            var drom = document.getElementById("drom").value;
        
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "query.php", false);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send("action=query&part=" + part + "&partment=" + partment + "&floor=" + floor + "&drom=" + drom);
        }
        
        function updatePartment() {
            var part = document.getElementById("part").value;
            var partment = document.getElementById("partment").value;
            var floor = document.getElementById("floor").value;
            var drom = document.getElementById("drom").value;
        
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updatePartment.php", false);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("partment").innerHTML = xhr.responseText;
                }
            };
            xhr.send("part=" + part);
        }
        
        function updateFloor() {
            var part = document.getElementById("part").value;
            var partment = document.getElementById("partment").value;
            var floor = document.getElementById("floor").value;
            var drom = document.getElementById("drom").value;
        
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updateFloor.php", false);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("floor").innerHTML = xhr.responseText;
                }
            };
            xhr.send("action=query&part=" + part + "&partment=" + partment);
        }
        
        function updateDrom() {
            var part = document.getElementById("part").value;
            var partment = document.getElementById("partment").value;
            var floor = document.getElementById("floor").value;
            var drom = document.getElementById("drom").value;
        
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updateDrom.php", false);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("drom").innerHTML = xhr.responseText;
                }
            };
            xhr.send("action=query&part=" + part + "&partment=" + partment + "&floor=" + floor);
        }
        
        document.getElementById("part").addEventListener("change", updatePartment);
		document.getElementById("partment").addEventListener("change", updateFloor);
		document.getElementById("floor").addEventListener("change", updateDrom);
	</script>
</body>
</html>
