<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
	<meta name="renderer" content="webkit">
	<title>ECNU Inspiration</title>
	<link rel="shortcut icon" href="/webprj/ecnu_mind/Public/img/favicon.ico">
	<link rel="bookmark"  type="image/x-icon"  href="/webprj/ecnu_mind/Public/img/favicon.ico"/>
	<link href="/webprj/ecnu_mind/Public/css/IndexRoll.css" rel="stylesheet">
	<link href="/webprj/ecnu_mind/Public/css/jquery-ui.css" rel="stylesheet">
    <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/HomePages.css" /> 
    <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/IndexSection2.css" />
    <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/IndexRedo.css" />
    
    <!-- 点阵字使用的css -->
    <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/jsLib/DotText/normalize.css" />
    <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/jsLib/DotText/style.css" />
    
     
    <script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.js"></script>
    <script src="/webprj/ecnu_mind/Public/jsLib/jquery_ui/jquery-ui.js"></script>
	<script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.min.js"></script>
    <script src="/webprj/ecnu_mind/Public/js/index/HomeScript.js"></script>
	<!--[if lte IE 8]>
	<style type="text/css">
		html,body{width:100%; height:100%; overflow:scroll}
		.section-btn{display:none;}
	</style>
	<![endif]-->
</head>
<body style="min-width:1024px;min-height:768px;">
	<section class="section-wrap">
		<div class="section section-1">
		
		<!-- 点阵文字 -->    
		<div class="canvasContainer" style="height:60%;width:100%;margin:0 auto;">
		    <img src="/webprj/ecnu_mind/Public/img/largeLogo.png" style="position:absolute">
		    <h2 class="indexPage1H2">智库，每个人享有机会的乐土</h2>
			<canvas class="canvas" style="height:100%;width:100%"></canvas>
			
			<div class="help" style="display:none">?</div> 		
		<div class="ui">
		  <input class="ui-input" type="text" disabled="true"/>
		  <span class="ui-return">↵</span>
		</div>
		<div class="overlay">
		  <div class="tabs">
		    <div class="tabs-labels"><span class="tabs-label">Commands</span><span class="tabs-label">Info</span><span class="tabs-label">Share</span></div>
		
		    <div class="tabs-panels">
		      <ul class="tabs-panel commands">
		        <li class="commands-item"><span class="commands-item-title">Text</span><span class="commands-item-info" data-demo="Hello :)">Type anything</span><span class="commands-item-action">Demo</span></li>
		        <li class="commands-item"><span class="commands-item-title">Countdown</span><span class="commands-item-info" data-demo="#countdown 10">#countdown<span class="commands-item-mode">number</span></span><span class="commands-item-action">Demo</span></li>
		        <li class="commands-item"><span class="commands-item-title">Time</span><span class="commands-item-info" data-demo="#time">#time</span><span class="commands-item-action">Demo</span></li>
		        <li class="commands-item"><span class="commands-item-title">Rectangle</span><span class="commands-item-info" data-demo="#rectangle 30x15">#rectangle<span class="commands-item-mode">width x height</span></span><span class="commands-item-action">Demo</span></li>
		        <li class="commands-item"><span class="commands-item-title">Circle</span><span class="commands-item-info" data-demo="#circle 25">#circle<span class="commands-item-mode">diameter</span></span><span class="commands-item-action">Demo</span></li>		
		        <li class="commands-item commands-item--gap"><span class="commands-item-title">Animate</span><span class="commands-item-info" data-demo="The time is|#time|#countdown 3|#icon thumbs-up"><span class="commands-item-mode">command1</span>&nbsp;|<span class="commands-item-mode">command2</span></span><span class="commands-item-action">Demo</span></li>
		      </ul>		
		      <div class="tabs-panel ui-details">
		        <div class="ui-details-content">
		          <h1>Shape Shifter</h1>
		          <p>
		            An experiment by <a href="//www.kennethcachia.com" target="_blank">Kenneth Cachia<a/>.<br/>
		            <a href="//fortawesome.github.io/Font-Awesome/#icons-new" target="_blank">Font Awesome</a> is being used to render all #icons.
		          </p>		
		          <br/><p>Visit <a href="http://www.kennethcachia.com/shape-shifter/?a=#icon thumbs-up" target="_blank">Shape Shifter</a> to use icons.</p>
		        </div>
		      </div>		
		      <div class="tabs-panel ui-share">
		        <div class="ui-share-content">
		          <h1>Sharing</h1>
		          <p>Simply add <em>?a=</em> to the current URL to share any static or animated text. Examples:</p>
		          <p>
		            <a href="http://www.kennethcachia.com/shape-shifter?a=Hello" target="_blank">www.kennethcachia.com/shape-shifter?a=Hello</a><br/>
		            <a href="http://www.kennethcachia.com/shape-shifter?a=Hello|#countdown 3" target="_blank">www.kennethcachia.com/shape-shifter?a=Hello|#countdown 3</a>
		          </p>
		        </div>
		      </div>
		    </div>
		  </div>
		</div><!-- 点阵文字 -->
		</div> 
		
		
		    
		 
		   
			<!-- 登陆行 -->
			<div class="wrapper">	
				<div class="container">
					<h2>WELCOME</h2>
					<form class="form loginForm">
						<input type="text" placeholder="Username" name="user" id="login_user">
						<input type="password" placeholder="Password" name="pwd" id="login_pwd">
						<button id="login-button" class="button" type="button" value="登录">Login</button>
						<div id="registerTip" style="height: 10px;color: black;margin-left:135px;">没有账号？注册</div>
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
			</div><!-- wrapper -->
		</div>
		
		<div class="section section-2">
			<div class="section2">
				<div class="sectionTitle">寻找项目的伙伴</div>
				<div class="sectionSubTitle">智库汇聚了众多拥有梦想、能力、激情的人，并且这个圈子不断随着智库项目的推进而发展壮大<br>无论想要怎样的团队都能在智库找到志同道合的人</div>
				<div class="shake"> <img alt="寻找项目的伙伴" src="/webprj/ecnu_mind/Public/img/Index/shake.jpg"></div>
			</div>
		</div>
		<div class="section section-3">
			<div class="section3" style="background:url(/webprj/ecnu_mind/Public/img/Index/opportunity.jpg); width:100%; height:100%">
				<div class="sectionTitle" style="color: #ffffff;">为你的项目找到更多的机会</div>
				<div class="sectionSubTitle" style="color: #ffffff;">智库内入驻了众多的比赛报名，你的项目可以通过智库脱颖而出<br>更有许许多多的HR以及投资人使用智库发觉你和你项目的潜力</div>
			</div>
		</div>
		<div class="section section-4">
			<div class="section4" style="background:url(/webprj/ecnu_mind/Public/img/Index/coworker.jpg); width:100%; height:100%">
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
	<div class="arrow">&laquo;</div>
    <script> 
    	var login_url = '/webprj/ecnu_mind/index.php/Home/Index/login'; 
    	var register_url = '/webprj/ecnu_mind/index.php/Home/Index/registerCustom'
    	var public_url = '/webprj/ecnu_mind/Public';
  		var custom_url = '/webprj/ecnu_mind/index.php/custom/home/home';
  		var admin_url = '/webprj/ecnu_mind/index.php/Admin/home/home';
  		var incomplete_url = '/webprj/ecnu_mind/index.php/custom/guide/guide';
    </script>
	<script src="/webprj/ecnu_mind/Public/js/index/Login.js"></script>
	<script src="/webprj/ecnu_mind/Public/js/index/Register.js"></script>
	<!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>-->
	<script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.min.js"></script>
	<script src="/webprj/ecnu_mind/Public/js/index/IndexRoll.js"></script> <!-- 整体网页的上下滑动翻转，包括立即体验点击返回顶部 -->
	<script src="/webprj/ecnu_mind/Public/js/index/verify.js"></script>
	
	<!-- 点阵字使用的js -->
	<script src="/webprj/ecnu_mind/Public/jsLib/DotText/index.js"></script> 
	
	<!-- 主页使用的js -->
	<script src="/webprj/ecnu_mind/Public/js/index/index.js"></script> 
</body>
</html>