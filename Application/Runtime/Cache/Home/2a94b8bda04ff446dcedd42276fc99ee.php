<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta name="renderer" content="webkit">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
	<meta name="renderer" content="webkit">
	<title>ECNU Inspiration</title>
	<link rel="shortcut icon" href="/Public/img/favicon.ico">
	<link rel="bookmark"  type="image/x-icon"  href="/Public/img/favicon.ico"/>
	<link href="/Public/css/IndexRoll.css" rel="stylesheet">
	<link href="/Public/css/jquery-ui.css" rel="stylesheet">
    <link rel="Stylesheet" type="text/css" href="/Public/css/HomePages.css" /> 
    <link rel="Stylesheet" type="text/css" href="/Public/css/IndexSection2.css" />
    <link rel="Stylesheet" type="text/css" href="/Public/css/IndexRedo.css" />  
    <!-- 点阵字使用的css -->
    <link rel="Stylesheet" type="text/css" href="/Public/jsLib/DotText/normalize.css" />
    <link rel="Stylesheet" type="text/css" href="/Public/jsLib/DotText/style.css" />
	<script src="/Public/jsLib/jquery/jquery.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="/Public/jsLib/tooltipster-master/css/tooltipster.css" />
	<link rel="stylesheet" type="text/css" href="/Public/jsLib/tooltipster-master/css/themes/tooltipster-noir.css" />
	<script type="text/javascript" src="/Public/jsLib/tooltipster-master/js/jquery.tooltipster.min.js"></script>
	
	<!--[if lte IE 8]>
	<style type="text/css">
		html,body{width:100%; height:100%; overflow:scroll}
		.section-btn{display:none;}
	</style>
	<![endif]-->
</head>
<body style="min-width:640px;min-height:320px;">
	<section class="section-wrap">
		<div class="section section-1">
		
		<!-- 点阵文字 -->    
		<div class="canvasContainer" style="height:70%;width:100%;margin:0 auto; position: relative;">
		    <img src="/Public/img/largeLogo.png" style="position:absolute; height:25%">
		    <h2 class="indexPage1H2">智库，连接每一颗渴望创造的心灵</h2>
			<canvas class="canvas" style="height:100%;width:100%;min-width:1024px;min-height:400px"></canvas>	<!-- 点阵文字 -->
		</div> 
				   
			<!-- 登陆行 -->
			<div class="wrapper">	
				<div class="container">
					<form class="form loginForm">
						<h2>WELCOME</h2>
						<input type="text" placeholder="用户名" name="user" id="login_user">
						<input type="password" placeholder="密码" name="pwd" id="login_pwd">
						<button id="login-button" class="button" type="button" value="登录">登录</button>
						<button id="switch-reg" class="button" type="button" >去注册</button>
						<div id="tips" style="height: 10px;color: red;margin-top: 10px;"></div>
					</form>
					<form class="form registerForm" style="display:none;margin-top: 30px;">
						<input type="text" placeholder="注册账号" name="reg_user" id="reg_user" autocomplete="off">
						<input type="password" placeholder="注册密码" name="reg_pwd" id="reg_pwd" autocomplete="off">
						<input type="password" placeholder="重复输入密码" name="repwd" id="reg_repwd">
						<button id="switch-login" class="button" type="button" >返回登录</button>
						<button id="register-button" class="button" type="button" >确认注册</button>
						<div id="tips" style="height: 10px;color: red;margin-top: 10px;"></div>
					</form>
				</div>				
				<ul class="bg-bubbles">
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>			
			</div>
		</div>
		
		<div class="section section-2">
			<div class="section2">
				<div class="sectionTitle">寻找项目的伙伴</div>
				<div class="sectionSubTitle">智库汇聚了众多拥有梦想、能力、激情的人，并且这个圈子不断随着智库项目的推进而发展壮大<br>无论想要怎样的团队都能在智库找到志同道合的人</div>
				<div class="shake"> <img alt="寻找项目的伙伴" src="/Public/img/Index/shake.jpg"></div>
			</div>
		</div>
		<div class="section section-3">
			<div class="section3" style="background:url(/Public/img/Index/opportunity.jpg); width:100%; height:100%">
				<div class="sectionTitle" style="color: #ffffff;">为你的项目找到更多的机会</div>
				<div class="sectionSubTitle" style="color: #ffffff;">智库内入驻了众多的比赛报名，你的项目可以通过智库脱颖而出<br>更有许许多多的HR以及投资人使用智库发觉你和你项目的潜力</div>
			</div>
		</div>
		<div class="section section-4">
			<div class="section4" style="background:url(/Public/img/Index/coworker.jpg); width:100%; height:100%">
				<div class="sectionTitle" style="color: #ffffff;">让更多的机会来找你</div>
				<div class="sectionSubTitle" style="color: #ffffff;">众多优秀的项目通过智库来寻找意向的合作者<br>你不再需要寻寻觅觅那些机会，而那些优秀的项目机会通过智库来找你</div>
			</div>
		</div>
		<div class="section section-5">
			<div class="section5">
				<div class="finalTitle">智库 - 每个人享有机会的热土</div>
				<div class="tryNow" id="toTop">立即体验</div>
			</div>
		</div>
	</section>
	<ul class="section-btn">
	  <li class="on"></li>
	  <li></li>
	  <li></li>
	  <li></li>
	  <li></li>
	</ul>
	
    <script> 
    	var login_url = '/Home/Index/login'; 
    	var register_url = '/Home/Index/registerCustom';
    	var public_url = '/Public';
  		var custom_url = '/custom/home/home';
  		var admin_url = '/Admin/home/home';
  		var incomplete_url = '/custom/guide/guide';
    </script>
	<script src="/Public/js/index/Login.js"></script>
	<script src="/Public/js/index/Register.js"></script>
	<!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>-->
	<script src="/Public/js/index/IndexRoll.js"></script> <!-- 整体网页的上下滑动翻转，包括立即体验点击返回顶部 -->
	<!-- 点阵字使用的js -->
	<script src="/Public/jsLib/DotText/index.js"></script> 
	<!-- 主页使用的js -->
	<script src="/Public/js/index/index.js"></script> 
</body>
</html>