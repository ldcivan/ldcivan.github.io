<?php
 session_start();
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>躲避鸡巴猫</title>
<style> 
    /*排行表css*/
    table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
    }
    
    th, td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
        overflow: hidden;
        white-space: nowrap; 
        text-overflow: ellipsis;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    tr:hover {
        background-color: #ddd;
    }
</style>
<style>
    html, body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      position: fixed;
      overflow: hidden;
    }
    
    #status {
        color:white;
        z-index:5000;
        position:fixed;
    }
    
    #set {
      position: fixed;
      top: 50%;
      left: 50%;
      padding: 10px;
      transform: translate(-50%, -50%);
      text-align: center;
      background-color: white;
      border: 2px solid black;
      font-size: 1.3vw; 
    }
    
    #end_bar {
      position: sticky;
      top: 0;
      padding-bottom: 10px;
      background-color: #fff;
    }
    
    #rank_table{
      max-width: 100%;
    }
    
    #scoreboard {
      position: fixed;
      top: 50%;
      left: 50%;
      padding: 10px;
      transform: translate(-50%, -50%);
      text-align: center;
      background-color: white;
      border: 2px solid black;
      z-index: 5000;
      max-height: 75%;
      font-size: 1.5vw;
      overflow: auto;
    }
    
    #close_rank {
      position: fixed;
      top: 10px;
      right: 10px;
    }
    
    button {
      background-color: #03A9F4;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 1.5vw;
      margin: 4px 2px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    button:hover {
      background-color: #0288D1;
    }
    
    input[type=text] {
      background-color: #f2f2f2;
      border: none;
      border-bottom: 2px solid #ccc;
      padding: 6px 8px;
      box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
      border-radius: 5px;
      outline: none;
      box-shadow: 0 0 5px #2196F3;
      border-bottom-color: #2196F3;
      width: 50%;
    }
    
    input[type=range] {
      -webkit-appearance: none;
      width: 30%;
      height: 10px;
      margin: 10px 0;
      background-color: #ddd;
      border-radius: 5px;
      outline: none;
    }
    
    input[type=range]::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      background-color: #03A9F4;
      border-radius: 50%;
      cursor: pointer;
    }
    
    .rank_btn {
        background-color: #808080;
    }
    
    .rank_btn:hover {
        background-color: #404040;
    }
    
    @media only screen and (max-width: 650px) {
      /* Adjust font sizes for screens up to 480 pixels wide */
        #set {
          font-size: 1.25vw;
          width: 70%;
        }
        
        #scoreboard {
          font-size: 1.25vw;
          width: 70%;
        }
        
        .popup{
            width: 70%;
        }
        
        h1 {
            font-size: 5vw;
            margin-block-start: 0.5em;
            margin-block-end: 0.5em;
        }
        h3 {
            font-size: 3.5vw;
            margin-block-start: 0.33em;
            margin-block-end: 0.33em;
        }
        button {
            font-size: 1.25vw;
        }
        th, td {
            font-size: 8px;
        }
    }
    @media only screen and (max-width: 380px) {
        #scoreboard {
            width: 290px;
        }
        th, td {
            font-size: 6px;
        }
    }
    @media only screen and (max-width: 330px) {
        #set{
            width: 240px;
        }
    }
    @media only screen and (min-height: 1024px) {
      /* Adjust font sizes for screens up to 480 pixels wide */
        body {
          font-size: 2vw;
        }
        
        #scoreboard {
          font-size: 2vw;
        }
    }
    @media only screen and (max-height: 560px) {
        body {
            font-size: 1.5vw;
        }
        #menu_img {
            width: 80px;
        }
        h1 {
            font-size: 2vw;
            margin-block-start: 0.33em;
            margin-block-end: 0.33em;
        }
        h3 {
            font-size: 1.7vw;
            margin-block-start: 0.33em;
            margin-block-end: 0.33em;
        }
        button {
            font-size: 1vw;
        }
    }
    @media only screen and (max-height: 410px) {
        body {
            font-size: 1.7vw;
        }
        #menu_img {
            width: 0px;
        }
        h1 {
            font-size: 2.6vw;
            margin-block-start: 0.33em;
            margin-block-end: 0.33em;
        }
        h3 {
            font-size: 2.0vw;
            margin-block-start: 0.33em;
            margin-block-end: 0.33em;
        }
        button {
            font-size: 1vw;
        }
    }
</style>
<style>
/* 去除原生复选框的默认样式 */
input[type="checkbox"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  display: inline-block;
  width: 20px;
  height: 20px;
  border-radius: 4px;
  border: 1px solid #BDBDBD;
  outline: none;
  cursor: pointer;
  transition: all 0.3s ease;
}

input[type="checkbox"]::after {
  content: '\2713';
  display: block;
  text-align: center;
  line-height: 20px;
  color: #fff;
  font-size: 16px;
}

/* 鼠标移上去时的样式 */
input[type="checkbox"]:hover {
  border-color: #757575;
}

/* 复选框选中时的样式 */
input[type="checkbox"]:checked {
  background-color: #03A9F4;
  border-color: #03A9F4;
}

/* 复选框选中时的对勾图标 */
input[type="checkbox"]:checked::before {
  display: block;
  text-align: center;
  line-height: 20px;
  color: #fff;
  font-size: 16px;
}

/* 将复选框的位置垂直居中 */
input[type="checkbox"] + label {
  vertical-align: middle;
  margin-left: 8px;
}

/* 为label元素添加鼠标悬停样式 */
input[type="checkbox"] + label:hover {
  color: #03A9F4;
  cursor: pointer;
}

</style>
<style>
	/* 遮罩层样式 */
	.overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5);
		z-index: 0;
		opacity: 0; /* 初始时不可见 */
		transition: opacity 0.5s ease-in-out; /* 定义动画效果 */
		pointer-events: none;
	}

	/* 弹窗样式 */
	.popup {
		position: fixed;
		transform: translate(-50%, -50%);
		top: 50%;
		left: 50%;
		background-color: white;
		padding: 20px;
		border-radius: 5px;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
		z-index: 6000;
		opacity: 0; /* 初始时不可见 */
		transition: opacity 0.5s ease-in-out; /* 定义动画效果 */
		pointer-events: none;
	}

	/* 定义弹窗出现时的动画 */
	.popup.show {
		opacity: 1;
		z-index: 6000;
		pointer-events: all;
		animation: pop-in 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
	}

	/* 定义弹窗消失时的动画 */
	.popup.hide {
		opacity: 0;
		z-index: 0;
		pointer-events: none;
		animation: pop-out 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
	}/* 定义弹窗出现时的动画 */
	
	.overlay.show {
		opacity: 1;
		z-index: 5999;
		pointer-events: all;
		animation: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
	}

	/* 定义弹窗消失时的动画 */
	.overlay.hide {
		opacity: 0;
		z-index: 0;
		pointer-events: none;
		animation: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
	}

	/* 定义弹窗出现时的动画细节 */
	@keyframes pop-in {
		from {
			transform: translate(-50%, -50%) scale(0.5);
		}
		to {
			transform: translate(-50%, -50%) scale(1);
		}
	}

	/* 定义弹窗消失时的动画细节 */
	@keyframes pop-out {
		from {
			transform: translate(-50%, -50%) scale(1);
		}
		to {
			transform: translate(-50%, -50%) scale(0.5);
		}
	}
</style>
<script src="./three.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/three/build/three.min.js"></script>-->
</head>
<body>
    <audio id="audio" src="./mp3/1.mp3"></audio>
    <div class="overlay" onclick="hidePopup();"></div>
    <div class="popup" onclick="">这是一个弹窗</div>
    <input type="hidden" id="token" value="<?php $_SESSION['token']=uniqid(); echo $_SESSION['token']; ?>">
    <div id="status">
        <div id="speed"></div>
        <div id="frame"></div>
    </div>
    <div id="scoreboard" style="display:none;"><h1>游戏结束</h1><h3>正在加载排行榜……</h3></div>
    <div id="set" style="">
      <h1 id="title">躲避机霸猫!!!</h1>
      <div id="menu_img_box"><img id="menu_img" src="./se1.jpg" width="120px"></div><br>
      玩家昵称：<input id="nameBox" type="text">
      <div id="speedBox">
          <label for="speed-slider">初始速度：</label>
          <input type="range" id="speed-slider" min="0" max="10" value="1" step="0.1">&nbsp;
          <e id="speed-value">当前值：1</e>
      </div>
      <div id="sensitivityBox">
          <label for="sensitivity-slider">操控敏感度：</label>
          <input type="range" id="sensitivity-slider" min="1" max="20" value="5" step="0.2">&nbsp;
          <e id="sensitivity-value">当前值：5</e>
      </div>
      <div id="densityBox">
          <label for="density-slider">障碍物密度：</label>
          <input type="range" id="density-slider" min="5" max="100" value="25" step="1">&nbsp;
          <e id="density-value">当前值：25</e>
      </div>
      <label id="speedupBox">
          障碍物流速是否随时间加速：<input type="checkbox" id="speedup" checked="checked"> 
      </label>
      <br>
      <label id="PCBox" style="display:none;">
          是否为PC端(这将影响流速)：<input type="checkbox" id="PC"> 
      </label>
      <br>
      <div id="">
          <button id="save_setting" onclick='setcookie();'>保存配置</button>
          <button id="delete_setting" onclick="confirm_delete();">删除配置</button>
          <button id="show_ranking" onclick="loadScores(false);">查排行榜</button>
      </div>
      <button id="start_btn" style="">开始游戏</button>
      <button id="restart_btn" style="display:none;" onclick="location.reload();">重新开始</button><br>
      <font onclick="alert('<b>本游戏由Pro-Ivan辅以ChatGPT开发<br>建议横屏游玩～游戏中你可按esc/双击屏幕以暂停<br>填写昵称后将在游戏结束时自动记录成绩<br>(游戏时间小于五秒或密度小于25不记录)<br>请不要填入不雅昵称，谢谢<br>注意，初始速度仅为相对值，实际值以开始游戏后左上角为准</b><br><br>点击任意区域以退出说明',120000)">点击以查看更多信息！</font>
    </div>

<script>
//帧率相关
let lastTime = 0;
let frames = 0;
let fps = 25;
let fpsContainer = document.getElementById('frame');
let fpsArray = [];
let averageFPS = 0;

const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

if (!isMobile) document.getElementById("PC").checked = "checked";

const token = document.getElementById('token').value; //token

let startTime = 0;
let endTime = 0;
let addupTime = 0;

// 创建游戏场景
let pausegame = true;
let endgame = true;
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

//障碍物贴图与玩家贴图
const textureLoader = new THREE.TextureLoader();
const obstacletexture = textureLoader.load('./se.jpg');
//const obstacletexture = textureLoader.load('./kun0.jpg');
const playertexture = textureLoader.load('./se1.jpg');


// 创建玩家
const playerGeometry = new THREE.BoxGeometry();
const playerMaterial = new THREE.MeshBasicMaterial({ color: 0xff0000, transparent: true, opacity: 0.5, wireframe: false, wireframeLinewidth: 8 });//开启透明效果&设置不透明度为0.5 
const player = new THREE.Mesh(playerGeometry, playerMaterial);
player.position.set(0, -2.5, -5);
scene.add(player);

// 创建障碍物
const obstacleGeometry = new THREE.BoxGeometry(1.5, 1.5, 1.5);
const obstacleMaterial = new THREE.MeshBasicMaterial({ color: 0xffffff, map: obstacletexture, transparent: true, opacity: 1.0, wireframe: false, wireframeLinewidth: 8});
const obstacleMesh = new THREE.Mesh(obstacleGeometry, obstacleMaterial);
scene.add(obstacleMesh);
const obstacles = [];

// 获取滑块元素
const densitySlider = document.getElementById('density-slider');

// 根据滑块值更新密度
let density = 25;
function updateDensity() {
  density = parseFloat(densitySlider.value);
  document.getElementById("density-value").innerHTML = "当前值：" + density;
  console.log("设置障碍物密度：" + density);
}

// 监听滑块值变化
densitySlider.addEventListener('input', updateDensity);

// 初始化敏感度
updateDensity();

//创建障碍物
function create_obstacle(){
    for (let i = 0; i < density; i++) {
      const obstacle = new THREE.Mesh(obstacleGeometry, obstacleMaterial);
      obstacle.position.set(
        Math.random() * 20 - 10,
        Math.random() * 20 - 10,
        Math.random() * 10 - 30
      );
      obstacles.push(obstacle);
      scene.add(obstacle);
    }
}

// 监听键盘事件，控制玩家移动
const keyboard = {};
document.addEventListener('keydown', e => keyboard[e.key] = true);
document.addEventListener('keyup', e => keyboard[e.key] = false);

// 监听触摸事件，控制玩家移动
let touchStartX = 0;
let touchStartY = 0;
let playerStartX = 0;
let playerStartY = 0;

// 获取滑块元素
const sensitivitySlider = document.getElementById('sensitivity-slider');

// 根据滑块值更新敏感度
let sensitivity = 5;
function updateSensitivity() {
  sensitivity = parseFloat(sensitivitySlider.value);
  document.getElementById("sensitivity-value").innerHTML = "当前值：" + sensitivity.toFixed(1);
  console.log("设置按键敏感度：" + sensitivity.toFixed(1));
}

// 监听滑块值变化
sensitivitySlider.addEventListener('input', updateSensitivity);

// 初始化敏感度
updateSensitivity();

//监听是否加速复选框变化
var speedupEnabled = document.getElementById("speedup");
function updateSpeedup() {
  speedupEnabled = document.getElementById("speedup");
  console.log("设置是否加速：" + speedupEnabled.checked);
}

// 监听是否加速复选框变化
speedupEnabled.addEventListener('input', updateSpeedup);

// 初始化是否加速复选框
updateSpeedup();

//监听PC变化
var PCEnabled = document.getElementById("PC");
function updatePC() {
  PCEnabled = document.getElementById("PC");
  console.log("设置操作平台：" + PCEnabled.checked);
}

// 监听PC变化
PCEnabled.addEventListener('input', updatePC);

// 初始化PC复选框
updatePC();


document.addEventListener('touchstart', e => {
touchStartX = e.touches[0].clientX;
touchStartY = e.touches[0].clientY;
playerStartX = player.position.x;
playerStartY = player.position.y;
});
document.addEventListener('touchmove', e => {
const touchX = e.touches[0].clientX;
const touchY = e.touches[0].clientY;
const deltaX = touchX - touchStartX;
const deltaY = touchY - touchStartY;


const screenAspectRatio = window.innerWidth / window.innerHeight;
const playerSize = 1;
const cameraDistance = playerSize / Math.tan(Math.PI * camera.fov / 360);
const playerX = playerStartX + sensitivity * deltaX * cameraDistance / window.innerHeight;
const playerY = playerStartY - sensitivity * deltaY * cameraDistance / window.innerHeight / screenAspectRatio;

const playerXX = Math.min(Math.max(playerX, -10), 10);
const playerYY = Math.min(Math.max(playerY, -10), 10);

player.position.set(playerXX, playerYY, player.position.z);
});


// 获取滑块元素
const speedSlider = document.getElementById('speed-slider');

// 根据滑块值更新速度
let obstacleSpeed = 0.5;
function updateSpeed() {
  const speed = parseFloat(speedSlider.value);
  obstacleSpeed = speed / 10;
  document.getElementById("speed-value").innerHTML = "当前值：" + speed.toFixed(1);
  console.log("设置初始速度：" + speed);
}

// 监听滑块值变化
speedSlider.addEventListener('input', updateSpeed);

// 初始化速度
updateSpeed();

//按esc暂停游戏
document.addEventListener('keydown', function(event) {
  if ((event.code === 'Escape' || event.code === 'Space') && startTime != 0) {
    pausegame = !pausegame;
    console.log('pausegame:', pausegame);
  }
});

//双击屏幕暂停游戏
let lastTouchEnd = 0;
document.addEventListener('touchstart', function (event) {
    const now = new Date().getTime();
    if (now - lastTouchEnd <= 250 && startTime != 0) {
        pausegame = !pausegame;
        console.log('pausegame:', pausegame);
        //event.preventDefault();
    }
    lastTouchEnd = now;
}, false);

async function uploadScore(name, score, ifpc, density){
    let data = { "name": name, "score": score, "density": density, "ifpc": ifpc, "token": token };
    
    fetch('write_json.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error(error));
}

// 获取成绩并显示排行榜
function loadScores(end) {
    // 发送一个GET请求，从服务器获取得分数据
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // 将JSON字符串转换为JavaScript对象
        var scores = JSON.parse(this.responseText);
        // 按得分从高到低排序
        scores.sort(function(a, b) {
          return b.score - a.score;
        });
        // 更新排行榜
        let scoreboard = document.getElementById("scoreboard");
        let table = "";
        if(end) table = "<div id='end_bar'><h1>🐱游戏结束🐱</h1><button class='rank_btn' onclick='loadScores(true);'>刷新排行</button><button class='rank_btn' onclick='location.reload();'>重新开始</button></div><div id='rank_table'><h3>排 行 榜</h3><table><thead><tr><th>NO.</th><th>昵称</th><th>极速</th><th>密度</th><th>是否为PC</th></tr></thead><tbody>";
        else {table = "<button id='close_rank' class='rank_btn' onclick='close_rank();'>×</button><div id='rank_table'><h3>排 行 榜</h3><table><thead><tr><th>NO.</th><th>昵称</th><th>极速</th><th>密度</th><th>是否为PC</th></tr></thead><tbody>";
            scoreboard.style = "";
        }
        for (var i = 0; i < Math.min(scores.length, 10); i++) {
            if(scores[i].density >= 25){
                if(scores[i].name == document.getElementById('nameBox').value) table = table + `<tr style="color:red;"><th>${(i+1)}</th><td>${scores[i].name}</td><td>${scores[i].score}</td><td>${scores[i].density}</td><td>${scores[i].ifpc}</td></tr>`;
                else table = table + `<tr><th>${(i+1)}</th><td>${scores[i].name}</td><td>${scores[i].score}</td><td>${scores[i].density}</td><td>${scores[i].ifpc}</td></tr>`;
            }
        }
        if(end && document.getElementById('nameBox').value == "") scoreboard.innerHTML = table + "</tbody></table><font color='red' size='3ew'>您未填写昵称，将不会记录你的成绩</font></div>";
        else scoreboard.innerHTML = table + "</tbody></table></div>";
      }
    };
    xhr.open("GET", "score.json", true);
    xhr.setRequestHeader('Cache-Control', 'no-cache');
    xhr.send();
    console.log("更新排行榜");
}

function close_rank(){
    document.getElementById('scoreboard').style='display:none';
}

function setcookie(hid){
    //json化参数
    var setting = {name: document.getElementById("nameBox").value, speed: document.getElementById("speed-slider").value, sensitivity: document.getElementById("sensitivity-slider").value, density: document.getElementById("density-slider").value, speedupEnabled: document.getElementById("speedup").checked, PC: document.getElementById("PC").checked};
    // 设置cookie
    var cookie_str = `setting=${JSON.stringify(setting)}; expires=${new Date(Date.now() + 24 * 60 * 60 * 1000).toUTCString()}; path=/;`;
    document.cookie = cookie_str;
    if(!hid) alert("已保存");
    console.log("设置cookie：" + cookie_str);
}

function read_cookie(){
    // 读取cookie
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      while (cookie.charAt(0) == ' ') {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf("setting=") == 0) {
        var setting = cookie.substring("setting=".length, cookie.length);
        console.log("读取到已有的设置："+setting);
        var setting_str = JSON.parse(setting);
        document.getElementById("nameBox").value = setting_str["name"];
        document.getElementById("speed-slider").value = setting_str["speed"];
        updateSpeed();
        document.getElementById("sensitivity-slider").value = setting_str["sensitivity"];
        updateSensitivity();
        document.getElementById("density-slider").value = setting_str["density"];
        updateDensity();
        if(setting_str["speedupEnabled"]) document.getElementById("speedup").checked = "checked";
        else document.getElementById("speedup").checked = "";
        updateSpeedup();
        //if(setting_str["PC"]) document.getElementById("PC").checked = "checked";
        //else document.getElementById("PC").checked = "";
        //updatePC();
        break;
      }
    }
}

function confirm_delete(){
    alert("<center>确认删除配置？<br><button onclick='delete_cookie();'>确认</button>&nbsp;<button class='rank_btn' onclick='hidePopup();'>取消</button></center>", 120000)
}

function delete_cookie(){
    document.cookie = "setting=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
    document.getElementById("nameBox").value = "";
    document.getElementById("speed-slider").value = "1";
    updateSpeed();
    document.getElementById("sensitivity-slider").value = "5";
    updateSensitivity();
    document.getElementById("density-slider").value = "25";
    updateDensity();
    document.getElementById("speedup").checked = "checked";
    updateSpeedup();
    if(!isMobile) document.getElementById("PC").checked = "checked";
    else document.getElementById("PC").checked = "";
    updatePC();
    
    alert("已删除");
}

// 获取弹窗和遮罩层元素
const overlay = document.querySelector('.overlay');
const popup = document.querySelector('.popup');

// 显示弹窗
function alert(content, time) {
    console.log("开弹窗：" + content);
    popup.innerHTML = content;
	overlay.classList.add('show');
	popup.classList.add('show');
	if(!time) setTimeout(hidePopup, 2000); // 默认2秒后自动隐藏弹窗
	else setTimeout(hidePopup, time); // 自定义自动隐藏弹窗时间
}

// 隐藏弹窗
function hidePopup() {
	overlay.classList.remove('show');
	popup.classList.remove('show');
    console.log("关弹窗");
}

//监听滑块按动，避免调滑块时连续输出设置反馈
var rangeInputs = document.getElementsByTagName("input");
for (var i = 0; i < rangeInputs.length; i++) {
  if (rangeInputs[i].type === "range") {
    rangeInputs[i].addEventListener("mousedown", function() {
        console.groupCollapsed("设置中...");
    });
    rangeInputs[i].addEventListener("mouseup", function() {
        console.groupEnd();
        console.log("...设置完毕");
    });
  }
}

function animate() {
      let PCtime = 0.35; let PCtime2 = 10;
      if (PCEnabled.checked) {PCtime = 0.35; PCtime2 = 0.4;}
      if (keyboard['ArrowLeft'] && player.position.x > -10) player.position.x -= 0.005 * sensitivity;
      if (keyboard['ArrowRight'] && player.position.x < 10) player.position.x += 0.005 * sensitivity;
      if (keyboard['ArrowUp'] && player.position.y < 10) player.position.y += 0.005 * sensitivity;
      if (keyboard['ArrowDown'] && player.position.y > -10) player.position.y -= 0.005 * sensitivity;
      
      // 计算帧率
      let currentTime = performance.now();
      frames++;
      if (currentTime > lastTime + 1000) {
        fps = Math.round((frames * 1000) / (currentTime - lastTime));
        fpsContainer.innerHTML = `FPS: ${fps}`;
        
        //计算平均帧率
        fpsArray.push(fps);
        if (fpsArray.length > 5) {
          fpsArray.shift();
        }
        let sum = 0;
        for (let i = 0; i < fpsArray.length; i++) {
          sum += fpsArray[i];
        }
        averageFPS = Math.round(sum / fpsArray.length);
        
        frames = 0;
        lastTime = currentTime;
      }
      
      for (const obstacle of obstacles) {
        obstacle.position.z += obstacleSpeed*PCtime;
        if (obstacle.position.z > 0) {
          obstacle.position.set(
            Math.random() * 20 - 10,
            Math.random() * 20 - 10,
            Math.random() * -15 - 10 * Math.sqrt(obstacleSpeed * 10 * fps / 165)
          );
        }
        if (obstacle.position.distanceTo(player.position) < 1.25) { //游戏结束动作
          endgame = true;
          endTime = Date.now();
          addupTime = endTime - startTime + addupTime;
          startTime = 0;
          //随机播放结束音声
          var audio = document.getElementById("audio");
          var randomIndex = Math.floor(Math.random() * 4) + 1;
          audio.src = "./mp3/"+randomIndex+".mp3";
          audio.play();
          document.getElementById("scoreboard").style.display = "";
          if(addupTime >= 5000){
              if(Math.abs(averageFPS - fps)/averageFPS <= 0.2) {
                  uploadScore(document.getElementById('nameBox').value, (obstacleSpeed * 10 * fps / 165).toFixed(3), PCEnabled.checked, density);
              }
              else {alert("成绩计算异常：当前瞬时fps与平均fps偏移度过大，不计入成绩");}
          }
          else{alert("成绩计算异常：开始到结束的时间小于5秒，将不计入成绩");}
          console.log("游戏时间(毫秒)：" + addupTime + "\n极限速度：" + (obstacleSpeed * 10 * fps / 165).toFixed(3) + "\nfps偏移度：" + Math.abs(averageFPS - fps)+"/"+averageFPS+ "=" + (Math.abs(averageFPS - fps)/averageFPS));
          document.getElementById("scoreboard").innerHTML = "<h1>游戏结束</h1><h3>正在加载排行榜……</h3>";
          setTimeout(() => {
            loadScores(true);
          }, 1000);
          //alert('游戏结束，你的只因限速度是:' + (obstacleSpeed * 10).toFixed(3));
          //location.reload();
        }
      }
      if (speedupEnabled.checked && Date.now() - startTime >=1100) obstacleSpeed += (2.5 / (fps*fps)); // 每帧增加速度
      document.getElementById('speed').textContent = 'Speed: ' + (obstacleSpeed * 10 * fps / 165).toFixed(3);
      renderer.render(scene, camera);
      if(!pausegame && !endgame) requestAnimationFrame(animate); else if(pausegame) {addupTime = Date.now() - startTime; document.getElementById("set").style.display = "block";requestAnimationFrame(pause);} //保持gameloop，pause时停止
}
function pause() {if(pausegame) requestAnimationFrame(pause); else {document.getElementById("set").style.display = "none"; startTime = Date.now(); requestAnimationFrame(animate);}}//保持loop，解除pause继续
const startButton = document.getElementById('start_btn');
startButton.addEventListener('click', startGame);

function startGame() {
  setcookie(true);
  create_obstacle(); //开始后再渲染障碍
  //隐藏游戏中不需要用的组件
  //document.body.removeChild(set);
  document.getElementById("start_btn").style = "display: none;";
  document.getElementById("speedBox").style = "display: none;";
  document.getElementById("densityBox").style = "display: none;";
  document.getElementById("restart_btn").style.display = "";
  document.getElementById("title").innerHTML = "暂 停";
  document.getElementById("set").style.display = "none";
  // 在这里编写游戏开始的逻辑代码
  pausegame = false;
  endgame = false;
  startTime = Date.now();
  addupTime = 0;
  animate();
}
read_cookie();
</script>
</body>