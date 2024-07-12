<!DOCTYPE html>
<html id="container">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="homo.ico" type ="image/x-icon">
	<title>恶臭数字论证器</title>
	<style>
		html{
			text-align: center;
			background: #114514;
			color: #E9E981;
			transition: 1s ease;
			font-family: sans-serif;
			word-break: break-all;
		}
		html[number=""]{
			background: #b3d0d0;
			color: #002b41;
		}
		head{
			display: block;
			text-align: center;
			padding:3em 0 2em;
		}
		title{
			display: block;
			font-weight: 700;
			font-size: 2em;
			margin: 0.67em;
			line-height: 45px;

		}
		meta[name="discription"]{
			display: block;
			margin:1em 0;
		}
		meta[name="discription"]:after{
			content: attr(content);
		}
		body{
			margin: 0;
			padding: 0 0 100px;
		}
		a{
			color:blue;
		}
		input{
			outline:0;
			font-size:20px;
			line-height: 26px;
			text-align: center;

			padding:8px 12px;
			border:0;
			width: 80%;
			max-width:300px;
			-webkit-appearance: none;
		}
		#echou{
			font-size:24px;
			font-family: "Comic Sans MS", script;
			padding:40px 10px 100px;

		}
	</style>
</head>
<body>
	<input id="xuedi" placeholder="输入任意数字">
	<div id="echou"></div>

	<article>
		<h2>仓库地址</h2>
		<p><a href="https://github.com/itorr/homo" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;color:#A0A0A0;" target="_blank">https://github.com/itorr/homo</a></p><br>
		<p>由Artoria2e5编写 由Pro-Ivan运行</p>
	</article>

	<script src="homo.js"></script>
	<script>
		xuedi.oninput=()=>{
			let number = xuedi.value.trim().match(/^-?[\de\.]+$/);

			number = number? +number : '';


			echou.innerHTML = number +' = <big>'+ homo(number) + '</big>';

			container.setAttribute('number',number);
		};

		xuedi.oninput();

		const load = (src,el) =>{
			el = document.createElement('script');
			el.src = src;
			document.body.appendChild(el);
		};

		setTimeout(()=>{
			load('//s4.cnzz.com/z_stat.php?id=1278706389&web_id=1278706389');
		},400);
	</script>
</body>
</html>