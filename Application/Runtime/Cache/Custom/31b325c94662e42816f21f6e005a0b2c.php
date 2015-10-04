<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ECNU Inspiration</title>
        <link rel="shortcut icon" href="/webprj/ecnu_mind/Public/img/favicon.ico">
        <!-- <link rel="shortcut icon" href="favicon.ico"> -->
		<link rel="bookmark"  type="image/x-icon"  href="/webprj/ecnu_mind/Public/img/favicon.ico">
        <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/nav.css" /> 
        <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/Person.css" />
        <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/radios.min.css" />
        <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/jsLib/jquery_ui/jquery-ui.css"/> 
        <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/jsLib/myAlert/myAlert.css"/>  
         <link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/homeHead.css"/>  
        <link href="/webprj/ecnu_mind/Public/css/icheck/flat/blue.css" rel="stylesheet">
        <link href="/webprj/ecnu_mind/Public/css/icheck/line/blue.css" rel="stylesheet">
        <script src="/webprj/ecnu_mind/Public/jsLib/jquery/Chart.js"></script>
        <script src="/webprj/ecnu_mind/Public/jsLib/jquery/modernizr.js"></script>
        <script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.min.js"></script>
        <script src="/webprj/ecnu_mind/Public/jsLib/jquery_ui/jquery-ui.js"></script>
        <script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.icheck.js"></script>
        <script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.mixitup.min.js"></script>
        <script src="/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/jquery.raty.js"></script>
        <script src="/webprj/ecnu_mind/Public/jsLib/myAlert/myAlert.js"></script>

		<script type="text/javascript">
        	var public_url = "/webprj/ecnu_mind/Public";
        	var model_url = "/webprj/ecnu_mind/index.php/Custom/Home";
        	var app_url = "/webprj/ecnu_mind/index.php";
    		var starOnIcon = "/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/images/star-on.png"
    		var starOffIcon = "/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/images/star-off.png"
    		var starHalfIcon = "/webprj/ecnu_mind/Public/jsLib/raty-2.7.0/lib/images/star-half.png"	
        </script>
        <!--<script src="/HtmlJS/Page.js"></script>-->
    </head>

    <body>
	    <div class="Part">
		   	<div class="homeHead">
			    <ul>
				    <li id="left-li">
					    <div class='homeHeadLogo'>
					    	<a href="/webprj/ecnu_mind/index.php/Home/Home/home"><img alt="Logo" src="/webprj/ecnu_mind/Public/img/LogoBulbSmall.png"></a>
					    </div>
					    <div class='homeHeadLogoText'>
					    	<h1>华师智库<span>Creation & Connection</span></h1>
					    </div>						    						    
				    </li>
				    <li id="right-li">
					    <ul id="sub-right-ul">
						    <li id="welcome-user">
						    </li>
						    <li id="exit-icon">
						    	<a href="/webprj/ecnu_mind/index.php/Home/Index/logout""><img alt="Exit" src="/webprj/ecnu_mind/Public/img/icon/exit.png" title="退出登录"></a>
						    </li>
					    </ul>
				    </li>
			    </ul>
		   </div>
		    <div class="Part_inner clearfix">
		       <div class="nav">
		           <p>功能列表</p>
		           <a href="#main" id="btn_main" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/home.png" alt="error"></div>个人首页</a>		           
		           
		           
		           <a href="#information" id="btn_info" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/down.png" alt="error"></div>信息管理</a>
		           <div class="info_child nav_child">
		             <a href="#base_info" id="btn_base_info" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/base.png" alt="error"></div>基本信息</a>
		             <a href="#safe" id="btn_safe" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/safe.png" alt="error"></div>安全设置</a>
		           </div>
		           <a href="#ability" id="btn_ability" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/ability.png" alt="error"></div>个人能力</a>
		           <a href="#competitions" id="btn_comp" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/down.png" alt="error"></div>竞赛管理</a>
		           <div class="comp_child nav_child">
		             <a href="#comp_apply" id="comp_apply" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/base.png" alt="error"></div>竞赛报名</a> 
		             <a href="#my_comp" id="my_comp" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/prjinfo.png" alt="error"></div>我的竞赛</a>
		           </div>
		           
		           <a href="#projects" id="btn_pro" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/prjinfo.png" alt="error"></div>项目管理</a>
		           <a href="#find" id="btn_find" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/find.png" alt="error"></div>寻找队友</a>
		           <a href="#help" id="btn_help" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/help.png" alt="error"></div>发布求助</a>
		       </div>
		       <div class="info_container">
		       </div>		       
		    </div>
	    </div>
	    <div class="homeBottom">
		       		联系我们|智库团队版权所有 ©2015-2016
		</div>
		<div class='messagePopOut' style='display:none'>
         	<div class='messagePopText'>
         		
         	</div>
         	<div class='messagePopButton'>
         		OK
         	</div>        	
         </div>
	    <script src="/webprj/ecnu_mind/Public/js/home/User.js"></script>
    </body>

</html>