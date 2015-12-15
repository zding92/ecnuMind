<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="renderer" content="webkit">
  		<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="toTop" content="true"><!-- 用于添加返回顶部按钮-->
        <title>ECNU Inspiration</title>
        <link rel="shortcut icon" href="/Public/img/favicon.ico">
        <!-- <link rel="shortcut icon" href="favicon.ico"> -->
		<link rel="bookmark"  type="image/x-icon"  href="/Public/img/favicon.ico">
        <link rel="Stylesheet" type="text/css" href="/Public/css/nav.css" /> 
        <link rel="Stylesheet" type="text/css" href="/Public/jsLib/myAlert/myAlert.css"/>  
        <link rel="Stylesheet" type="text/css" href="/Public/css/homeHead.css"/>  
        <script src="/Public/jsLib/jquery/jquery.min.js"></script>
        <script src="/Public/jsLib/jquery_ui/jquery-ui.js"></script>
        <script src="/Public/jsLib/myAlert/myAlert.js"></script><!-- 此js用于弹出自定义的Alert -->
        <script src="/Public/jsLib/ToTop/toTop.js"></script><!-- 此js用于添加返回顶部按钮 -->
		
		<script type="text/javascript">
        	var public_url = "/Public";
        	var model_url = "/Custom/Home";
        	var app_url = "";
    		var starOnIcon = "/Public/jsLib/raty-2.7.0/lib/images/star-on.png"
    		var starOffIcon = "/Public/jsLib/raty-2.7.0/lib/images/star-off.png"
    		var starHalfIcon = "/Public/jsLib/raty-2.7.0/lib/images/star-half.png"
    		var toTopIcon = "/Public/jsLib/ToTop/1.png"
        </script>
        <!--<script src="/HtmlJS/Page.js"></script>-->
    </head>

    <body>
	    <div class="Part">
		   	<div class="homeHead">
			    <ul>
				    <li id="left-li">
					    <div class='homeHeadLogo'>
					    	<a href="/Home/Index/index"><img alt="Logo" src="/Public/img/LogoBulbSmall.png"></a>
					    </div>
					    <div class='homeHeadLogoText'>
					    	<h1>华师智库<span>Creation & Connection</span></h1>
					    </div>						    						    
				    </li>
				    <li id="right-li">
					    <ul id="sub-right-ul">
						    <li id="welcome-user">
						      <div class='welcomeText'>欢迎您！<span><?php echo ($name); ?></span></div>
						    </li>
						    <li id="exit-icon">
						    	<a href="/Home/Index/logout"><img alt="Exit" src="/Public/img/icon/exit.png" title="退出登录"></a>
						    </li>
					    </ul>
				    </li>
			    </ul>
		   </div>
		    <div class="Part_inner clearfix">
		       <div class="nav">
		           <p>功能列表</p>
		           <a href="#main" id="btn_main" class="clickble"><div class="icon"><img src="/Public/img/icon/home.png" alt="error"></div>个人首页</a>		                  		            
		           <a href="#ability" id="btn_ability" class="clickble"><div class="icon"><img src="/Public/img/icon/ability.png" alt="error"></div>个人能力</a>           
		           <a href="#projects" id="btn_pro" class="clickble"><div class="icon"><img src="/Public/img/icon/prjinfo.png" alt="error"></div>项目管理</a>
		           <a href="#find" id="btn_find" class="clickble"><div class="icon"><img src="/Public/img/icon/find.png" alt="error"></div>寻找队友</a>
		           <a href="#help" id="btn_help" class="clickble"><div class="icon"><img src="/Public/img/icon/help.png" alt="error"></div>发布求助</a>
		           		           <a href="#competitions" id="btn_comp" class="clickble"><div class="icon"><img src="/Public/img/icon/down.png" alt="error"></div>竞赛管理</a>		
		           <div class="comp_child nav_child">
		             <a href="#comp_apply" id="comp_apply" class="clickble"><div class="icon"><img src="/Public/img/icon/base.png" alt="error"></div>竞赛报名</a> 
		             <a href="#my_comp" id="my_comp" class="clickble"><div class="icon"><img src="/Public/img/icon/prjinfo.png" alt="error"></div>我的竞赛</a>
		           </div>
		           <a href="#information" id="btn_info" class="clickble"><div class="icon"><img src="/Public/img/icon/down.png" alt="error"></div>信息管理</a>    
		      		<div class="info_child nav_child">
		             <a href="#base_info" id="btn_base_info" class="clickble"><div class="icon"><img src="/Public/img/icon/base.png" alt="error"></div>基本信息</a>
		             <a href="#photo" id="btn_photo" class="clickble"><div class="icon"><img src="/Public/img/icon/myinfo.png" alt="error"></div>上传照片</a>
		             <a href="#safe" id="btn_safe" class="clickble"><div class="icon"><img src="/Public/img/icon/safe.png" alt="error"></div>安全设置</a>
		           </div>
		       </div>
		       <div class="info_container">
		       </div>		       
		    </div>
	    </div>
	    
	    
	    <div class="homeBottom">
		       		<p>联系我们</p>|智库团队版权所有 ©2015-2016
		</div>
		<div class='messagePopOut' style='display:none'>
         	<div class='messagePopText'>
         		
         	</div>
         	<div class='messagePopButton'>
         		OK
         	</div>        	
         </div>
	    <script src="/Public/js/home/User.js"></script>
    </body>

</html>