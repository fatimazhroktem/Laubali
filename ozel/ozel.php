<?php
require_once "../php/baglanti.php";
if(!$sessionManager->kontrol()){
	helper::yonlendir("../islemler/giris.php");
	die();
	}
$kBilgi = $sessionManager->kullaniciBilgi();	
$kullaniciLog->start($kBilgi["id"]);
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../resimler/anaresimler/icon2.png">
<title>Özel-Laubali</title>
<link rel="stylesheet" type="text/css" href="../css/all.css">
<link rel="stylesheet" type="text/css" href="ozel.css">
<link rel="stylesheet" type="text/css" href="../stil/darkmode.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@1,500&display=swap" rel="stylesheet">
</head>
<body>
	<style type="text/css">
	#gor1{
		background-image: url("../resimler/anaresimler/laubali.jpg");
	}
</style>
</head>
<body class="ozel">
	<header>
	<div class="gorsel" id="gor1">
	
</div>
</header>
	<div class="motto">
		
			</div><br>
			<button class="cyber-btn">
		<a href="../sayfalar/blog.php">Cyber</a>
		<span aria-hidden>_</span>
		<span aria-hidden class="cyber-btn_glitch">Cyber</span>
		<span aria-hidden class="cyber-btn_tag">R25</span>
	</button>
	<button class="cyber-btn">
		<a href="../sayfalar/blog.php">Buttons</a>
		<span aria-hidden>_</span>
		<span aria-hidden class="cyber-btn_glitch">Buttons</span>
		<span aria-hidden class="cyber-btn_tag">R25</span>
	</button>
	<div class="codes">
		<h1>HTML KODLARI<hr></h1>
		<p class="html">
			&lt;!DOCTYPE html&gt;<br>
	&lt;html lang="tr-TR"&gt;<br>
	&lt;head&gt;<br>
	&lt;meta http-equiv="content-type" content="text/html; charset=utf-8"&gt;<br>
	&lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;<br>
	&lt;link rel="stylesheet" type="text/css" href="ozel.css"&gt;<br>
	&lt;/head&gt;<br>
	&lt;body&gt;<br>

		&lt;button class="cyber-btn"&gt;<br>
			Cyber<br>
			&lt;span aria-hidden&gt;_&lt;/span&gt;<br>
			&lt;span aria-hidden class="cyber-btn_glitch"&gt;Cyber&lt;/span&gt;<br>
			&lt;span aria-hidden class="cyber-btn_tag"&gt;R25&lt;/span&gt;<br>
		&lt;/button&gt;<br>
		&lt;button class="cyber-btn"&gt;<br>
			Buttons<br>
			&lt;span aria-hidden&gt;_&lt;/span&gt;<br>
			&lt;span aria-hidden class="cyber-btn_glitch"&gt;Buttons&lt;/span&gt;<br>
			&lt;span aria-hidden class="cyber-btn_tag"&gt;R25&lt;/span&gt;<br>
		&lt;/button&gt;<br>
	&lt;/body&gt;<br>
	&lt;/html&gt;<br>
	<h1>CSS KODLARI<hr></h1>
		<p class="css">
				@font-face {
			font-family: Cyber;<br>
			src: url("https://assets.codepen.io/605876/Blender-Pro-Bold.otf");<br>
			font-display: swap;<br>
		}<br><br>
		*{<br>
			margin:0;<br>
			padding:0;<br>
			box-sizing: border-box;<br>
			outline: none;<br>
		}<br><br>
		body{<br>
			display: flex;<br>
			align-items: center;<br>
			flex-direction: column;<br>
			min-height: 100vh;<br>
			justify-content: center;<br>
			font-family: 'Cyber', 'sans-serif';<br>
			background: linear-gradient(90deg, #f5ed00 70%, #f5ed00 70%),#f5ed00;<br>
		}<br><br>
		body .cyber-btn+.cyber-btn{<br>
			margin-top: 2rem;<br>
		}<br><br>
		.cyber-btn{<br>
			--primary:<br>
			hsl(var(--primary-hue), 85%, calc(var(<br>
				--primary-lightness, 50) * 1%));<br>
			--shadow-primary: hsl(var(--shadow-primary-hue), 90%, 50%);<br>
			--primary-hue:0;<br>
			--primary-lightness:50;<br>
			--color: hsl(0, 0%, 100%);<br>
			--font-size:22px;<br>
			--shadow-primary-hue:180;<br>
			--label-size:9px;<br>
			--shadow-secondary-hue:60;<br>
			--shadow-secondary: hsl(var(--shadow-secondary-hue), 90%, 60%);<br>
			--clip:<br>
			polygon(0 0, 100% 0, 100% 100%, 95% 100%,<br>
				95% 90%, 85% 90%, 85% 100%, 8% 100%, 0 70%);<br>
			--border:4px;<br>
			--shimmy-distance:5;<br>
			--clip-one:	polygon(0 2%, 100% 2%, 100% 95%,<br>
				 95% 95%, 95% 90%, 85% 90%, 85% 95%, 8% 95%, 0 70%);<br>
			--clip-two: polygon(0 78%, 100% 78%, 100% 100%);<br>
			--clip-three: polygon(0 44%, 100% 44%, 100% 54%, <br>
				95% 54%, 95% 54%, 85% 54%, 85% 54%, 8% 54%, 0 54%);<br>
			--clip-four: polygon(0 0, 100% 0, 100% 0, <br>
				95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);<br>
			--clip-five: polygon(0 0, 100% 0, 100% 0, <br>
				95% 0, 95% 0, 85% 0, 85% 0, 8% 0, 0 0);<br>
			--clip-six: polygon(0 40%, 100% 40%, 100% 85%,<br> 
				95% 85%, 95% 85%, 85% 85%, 85% 85%, 8% 85%, 0 70%);<br>
			--clip-seven: polygon(0 63%, 100% 63%, 100% 80%, <br>
				95% 80%, 95% 80%, 85% 80%, 85% 80%, 8% <br>80%, 0 70%);
			font-family: 'Cyber', sans-serif;<br>
			color: var(--color);<br>
			cursor: pointer;<br>
			background: transparent;<br>
			text-transform: uppercase;<br>
			font-size: var(--font-size);<br>
			outline: transparent;<br>
			letter-spacing: 2px;<br>
			position: relative;<br>
			font-weight: 700;<br>
			border 0;<br>
			height: 40px;<br>
			width: 200px;<br>
			line-height: 0px;<br>
			transition: background 0.2s;<br>
		}<br><br>
		.cyber-btn:hover{<br>
			--primary: hsl(var(--primary-hue), 85%, calc(var(<br>
				--primary-lightness, 50) * 0.8%));<br>
		}<br><br>
		.cyber-btn:active{
			--primary: hsl(var(--primary-hue), 85%, calc(var(<br>
				--primary-lightness, 50) * 0.6%));<br>
		}<br>
		<br>
		.cyber-btn:after,<br>
		.cyber-btn:before{<br>
			content: "";<br>
			position: absolute;<br>
			top: 0;<br>
			left: 0;<br>
			right: 0;<br>
			bottom: 0;<br>
			clip-path: var(--clip);<br>
			z-index: -1;<br>
		}<br>
<br>
		.cyber-btn:before{<br>
			background: var(--shadow-primary);<br>
			transform: translate(var(--border), 0);<br>
		}<br>
		.cyber-btn:after{<br>
			background: var(--primary);<br>
		}<br>
<br>
		.cyber-btn_tag{<br>
			position: absolute;<br>
			padding: 1px 4px;<br>
			letter-spacing: 1px;<br>
			line-height: 1;<br>
			bottom: -5%;<br>
			right: 5%;<br>
			font-weight: normal;<br>
			color: hsl(0, 0%, 0%);<br>
			font-size: var(--label-size);<br>
		}<br>
<br>
		.cyber-btn_glitch{<br>
			position: absolute;<br>
			top: calc(var(--border) * -1);<br>
			left: calc(var(--border) * -1);<br>
			right: calc(var(--border) * -1);<br>
			bottom: calc(var(--border) * -1);<br>
			background: var(--shadow-primary);<br>
			text-shadow: 2px 2px var(--shadow-primary),<br>
			-2px -2px var(--shadow-secondary);<br>
			clip-path: var(--clip);<br>
			animation: glitch 2s infinite;<br>
			display: none;<br>
		}<br>
<br>
		.cyber-btn:hover .cyber-btn_glitch{<br>
			display: block;<br>
		}<br><br>
		.cyber-btn_glitch:before{<br>
			content: "";<br>
			position: absolute;<br>
			top: calc(var(--border) * 1);<br>
			left: calc(var(--border) * 1);<br>
			right: calc(var(--border) * 1);<br>
			bottom: calc(var(--border) * 1);<br>
			clip-path: var(--clip);<br>
			background: var(--primary);<br>
			z-index: -1;<br>
		}<br><br>
		.cyber-btn:nth-of-type(2){<br>
			--primary-hue:260;<br>
		}<br>
<br>
		@keyframes glitch {<br>
			0%{<br>
				clip-path: var(--clip-one);<br>
			}<br>
			2%,8%{<br>
				clip-path: var(--clip-two);<br>
				transform: translate(calc(var(--shimmy-distance) * -1%), 0);<br>
			}<br>
			6%{<br>
				clip-path: var(--clip-two);<br>
				transform: translate(calc(var(--shimmy-distance) * 1%), 0);<br>
			}<br>
			9%{<br>
				clip-path: var(--clip-two);<br>
				transform: translate(calc(var(--shimmy-distance) * 1%), 0);<br>
			}<br>
			10%{<br>
				clip-path: var(--clip-three);<br>
				transform: translate(calc(var(--shimmy-distance) * 1%), 0);<br>
			}<br>
			13%{<br>
				clip-path: var(--clip-three);<br>
				transform: translate(0, 0);<br>
			}<br>
			14%,21%{<br>
				clip-path: var(--clip-four);<br>
				transform: translate(calc(var(--shimmy-distance) * 1%), 0);<br>
			}<br>
			25%{<br>
				clip-path: var(--clip-five);<br>
				transform: translate(calc(var(--shimmy-distance) * 1%), 0);<br>
			}<br>
			30%{<br>
				clip-path: var(--clip-five);<br>
				transform: translate(calc(var(--shimmy-distance) * -1%), 0);<br>
			}<br>
			35%,45%{<br>
				clip-path: var(--clip-six);<br>
				transform: translate(calc(var(--shimmy-distance) * -1%));<br>
			}<br>
			40%{<br>
				clip-path: var(--clip-six);<br>
				transform: translate(calc(var(--shimmy-distance) * 1%));<br>
			}<br>
			50%{<br>
				clip-path: var(--clip-six);<br>
				transform: translate(0, 0);<br>
			}<br>
			55%{<br>
				clip-path: var(--clip-seven);<br>
				transform: translate(calc(var(--shimmy-distance) * 1%), 0);<br>
			}<br>
			60%{<br>
				clip-path: var(--clip-seven);<br>
				transform: translate(0, 0);<br>
			}<br>
			31%,61%,100%{<br>
				clip-path: var(--clip-four);<br>
			}<br>
		}
		</p><br><hr>
	</div>
</body>
</html>
