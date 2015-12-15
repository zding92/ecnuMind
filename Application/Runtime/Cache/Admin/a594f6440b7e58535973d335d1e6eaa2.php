<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="renderer" content="webkit">
  		<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ECNU Inspiration</title>
        <link rel="shortcut icon" href="/Public/img/favicon.ico">
        <!-- <link rel="shortcut icon" href="favicon.ico"> -->
		<link rel="bookmark"  type="image/x-icon"  href="/Public/img/favicon.ico">
        <link rel="Stylesheet" type="text/css" href="/Public/css/nav.css" /> 
        <link rel="Stylesheet" type="text/css" href="/Public/css/radios.min.css" />
        <link rel="Stylesheet" type="text/css" href="/Public/jsLib/jquery_ui/jquery-ui.css"/> 
        <link rel="Stylesheet" type="text/css" href="/Public/jsLib/myAlert/myAlert.css"/>  
         <link rel="Stylesheet" type="text/css" href="/Public/css/homeHead.css"/>  
        <link href="/Public/css/icheck/flat/blue.css" rel="stylesheet">
        <link href="/Public/css/icheck/line/blue.css" rel="stylesheet">
        <script src="/Public/jsLib/jquery/Chart.js"></script>
        <script src="/Public/jsLib/jquery/modernizr.js"></script>
        <script src="/Public/jsLib/jquery/jquery.min.js"></script>
        <script src="/Public/jsLib/jquery_ui/jquery-ui.js"></script>
        <script src="/Public/jsLib/jquery/jquery.icheck.js"></script>
        <script src="/Public/jsLib/jquery/jquery.mixitup.min.js"></script>
        <script src="/Public/jsLib/raty-2.7.0/lib/jquery.raty.js"></script>
        <script src="/Public/jsLib/myAlert/myAlert.js"></script>

		<script type="text/javascript">
        	var public_url = "/Public";
        	var model_url = "/Admin/Home";
        	var app_url = "";
    		var starOnIcon = "/Public/jsLib/raty-2.7.0/lib/images/star-on.png"
    		var starOffIcon = "/Public/jsLib/raty-2.7.0/lib/images/star-off.png"
    		var starHalfIcon = "/Public/jsLib/raty-2.7.0/lib/images/star-half.png"	
        </script>
        <!--<script src="/HtmlJS/Page.js"></script>-->
    </head>

    <body>
	    <div class="Part">
		   	<div class="homeHead">
			    <ul>
				    <li id="left-li">
					    <div class='homeHeadLogo'>
					    	<a href="/Admin/Home/home"><img alt="Logo" src="/Public/img/LogoBulbSmall.png"></a>
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
						    	<a href="/Home/Index/logout"><img alt="Exit" src="/Public/img/icon/exit.png" title="退出登录"></a>
						    </li>
					    </ul>
				    </li>
			    </ul>
		   </div>
		    <div class="Part_inner clearfix">
		       <div class="nav">
		           <p>功能列表</p>
		           <a href="#HistoryItem" id="btn_history" class="clickble"><div class="icon"><img src="/Public/img/icon/home.png" alt="error"></div>历史项目</a>		           		           		           
		           <a href="#CurrentComp" id="btn_CurrentComp" class="clickble"><div class="icon"><img src="/Public/img/icon/ability.png" alt="error"></div>当前比赛</a>          
		           <a href="#CompControl" id="btn_CompControl" class="clickble"><div class="icon"><img src="/Public/img/icon/prjinfo.png" alt="error"></div>比赛管理</a>
		           <a href="#AbilityControl" id="btn_AbilityControl" class="clickble"><div class="icon"><img src="/Public/img/icon/base.png" alt="error"></div>能力管理</a>
		           <a href="#UserControl" id="btn_UserControl" class="clickble"><div class="icon"><img src="/Public/img/icon/find.png" alt="error"></div>用户管理</a>
		           <a href="#ChangePassWord" id="btn_ChangePassword" class="clickble"><div class="icon"><img src="/Public/img/icon/help.png" alt="error"></div>安全设置</a>
		           <a href="#Notification" id="btn_Notification" class="clickble"><div class="icon"><img src="/Public/img/icon/message.png" alt="error"></div>发送通知</a>
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
	    <script src="/Public/js/Admin/Admin.js"></script>
    </body>

</html>