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
<body>
	<section class="section-wrap">
		<div class="section section-1">
			<div id="formbackground">  
			<img src="/webprj/ecnu_mind/Public/img/back_large.jpg" style="width: auto;height: auto" alt="图片载入失败">
			</div> 
			
			<div id="Part1">
			  <div id="logo">
			    <div id="logo_1">ECNU</div>
			    <div id="logo_2">华师</div>
			    <div id="logo_3">人才项目智库</div>
			  </div>
			
			  <div id="lgn_body" class="roundedRectangle"> 
			  <ul class="tabs">
			    <li>
			        <input type="radio" name="tabs" id="tab1" checked onclick="DisplayLogin()">
			        <label for="tab1" style="border-top-right-radius:0px">登录</label>
			    </li>
			    <li>
			        <input type="radio" name="tabs" id="tab2" onclick="DisplayRegister()">
			        <label for="tab2" style="border-top-left-radius:0px ">注册</label>
			    </li>
			</ul> 
			    <div style="height: 70px"></div>
			    
			    <form id="Login" style="visibility: visible">
			       <div style="margin-top: 30px">
			         <p><input id="login_user" type="text" name="user" style="text-align: left" placeholder="账号/学号/昵称" /></p>
			         <p><input id="login_pwd" type="password" name="pwd" style="text-align: left;margin-top: -1px;" placeholder="密码"/></p>
			       </div>
			       <input id="btn_lgn" class="button" type="button" value="登录" onmouseout="OutColor(this)" onmouseover="OverColor(this)" onmousedown="DownColor(this)" onmouseup="UpColor(this)" />
			       <br>
			       <div id="tips" style="height: 10px"></div>
			       <a href="http://www.qq.com" style="color: rgba(30,30,30,0.8);font-size: 12px;margin: -10px 0px 0px 90px;position: absolute">忘记密码？</a>
			    </form>
			    <form id="Register" method="post" style="visibility: hidden">
			       <div style="margin-top: 30px">
			         <p><input id="register_user" type="text" name="user" style="text-align: left;margin-top: -1px" placeholder="账号/学号/昵称"/></p>
			         <div id="chk_user_no" style="margin: 12px 0px 0px 5px;position: absolute"></div>
			         <div id="chk_user_yes" style="margin: -28px 0px 0px 320px;position: absolute"></div>
			         <p id="user_tips" style="font-family: '微软雅黑';letter-spacing: 1px;font-size: 14px;color: rgba(30, 30, 30, 0.7);margin-left: 30px;margin-top: 10px;position: absolute"></p>
			         <p><input id="register_pwd" type="password" name="pwd" style="text-align: left;margin-top: -1px" placeholder="密码"/></p>
			         <p><input id="register_pwdre" type="password" name="pwdrepeat" style="text-align: left;margin-top: -1px" placeholder="请重复输入密码"/></p>
			         <div id="chk_pwd_no" style="margin: 12px 0px 0px 5px;position: absolute"></div>
			         <div id="chk_pwd_yes" style="margin: -28px 0px 0px 320px;position: absolute"></div>
			         <p id="pwd_tips" style="font-family: '微软雅黑';letter-spacing: 1px;font-size: 14px;color: rgba(30, 30, 30, 0.7);margin-left: 30px;margin-top: 10px;position: absolute"></p>
			         <p id="safe_tips" style="font-family: '微软雅黑';font-weight: 900;letter-spacing: 1px;font-size: 14px;color: rgba(30, 30, 30, 0.7);margin-left: 120px;margin-top: 30px;position: absolute"></p>
			       </div>
			       <input id="btn_reg" class="button" type="button" value="注册" onmouseout="OutColor(this)" onmouseover="OverColor(this)" onmousedown="DownColor(this)" onmouseup="UpColor(this)" />
			    </form> 
			  </div>
			</div>
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
  		var home_url = '/webprj/ecnu_mind/index.php/custom/home/home';
  		var incomplete_url = '/webprj/ecnu_mind/index.php/custom/guide/guide';
    </script>
	<script src="/webprj/ecnu_mind/Public/js/index/Login.js"></script>
	<script src="/webprj/ecnu_mind/Public/js/index/Register.js"></script>
	<!-- <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>-->
	<script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.min.js"></script>
	<script src="/webprj/ecnu_mind/Public/js/index/IndexRoll.js"></script> <!-- 整体网页的上下滑动翻转，包括立即体验点击返回顶部 -->

</body>
</html>