// 初始化玩家和子弹
var player1 = {
  name: "player1",
  element: document.getElementById("player1"),
  x: 0,
  y: 0,
  speed: 5,
  health: 100,
  attack: 10
};
var player2 = {
  name: "player2",
  element: document.getElementById("player2"),
  x: 400,
  y: 0,
  speed: 5,
  health: 100,
  attack: 10
};
var bullets1 = [];
var bullets2 = [];

// 玩家移动
function movePlayer(player, dx, dy) {
  var newX = player.x + dx * player.speed;
  var newY = player.y + dy * player.speed;
  if (newX >= 0 && newX <= 400 && newY >= 0 && newY <= 200) {
    player.x = newX;
    player.y = newY;
    player.element.style.left = player.x + "px";
    player.element.style.top = player.y + "px";
  }
}

// 玩家攻击
function attackPlayer(attacker, defender) {
  var damage = attacker.attack;
  defender.health -= damage;
  if (defender.health <= 0) {
    endGame(attacker.name + " wins!");
  }
}

// 发射子弹
function shootBullet(player) {
  var bullet = document.createElement("div");
  bullet.className = "bullet";
  bullet.style.left = player.x + 95 + "px";
  bullet.style.top = player.y + 95 + "px";
  player.element.appendChild(bullet);
  if (player.name === "player1") {
    bullets1.push(bullet);
  } else {
    bullets2.push(bullet);
  }
}

// 移动子弹
function moveBullet(player, bullets) {
  for (var i = 0; i < bullets.length; i++) {
    var bullet = bullets[i];
    var bulletX = parseInt(bullet.style.left);
    bullet.style.left = bulletX + player.speed + "px";
    if (bulletX >= 400) {
      player.element.removeChild(bullet);
      bullets.splice(i, 1);
      i--;
    } else {
      // 判断是否击中对方
      var defender = player === player1 ? player2 : player1;
      var bulletY = parseInt(bullet.style.top);
      if (bulletX + 10 >= defender.x && bulletX <= defender.x + 200 && bulletY + 10 >= defender.y && bulletY <= defender.y + 200) {
          
      }
    }
  }
}
       
