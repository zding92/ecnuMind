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
        	var model_url = "/webprj/ecnu_mind/index.php/Admin/Home";
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
						    	<a href="/webprj/ecnu_mind/index.php/Home/Index/logout"><img alt="Exit" src="/webprj/ecnu_mind/Public/img/icon/exit.png" title="退出登录"></a>
						    </li>
					    </ul>
				    </li>
			    </ul>
		   </div>
		    <div class="Part_inner clearfix">
		       <div class="nav">
		           <p>功能列表</p>
		           <a href="#HistoryItem" id="btn_history" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/home.png" alt="error"></div>历史项目</a>		           		           		           
		           <a href="#CurrentComp" id="btn_CurrentComp" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/ability.png" alt="error"></div>当前比赛</a>          
		           <a href="#CompControl" id="btn_CompControl" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/prjinfo.png" alt="error"></div>比赛管理</a>
		           <a href="#UserControl" id="btn_UserControl" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/find.png" alt="error"></div>用户管理</a>
		           <a href="#help" id="btn_help" class="clickble"><div class="icon"><img src="/webprj/ecnu_mind/Public/img/icon/help.png" alt="error"></div>安全设置</a>
		       </div>
		       <div class="info_container">
		       </div>	
		       <div class="homeBottom">
		       		联系我们|智库团队版权所有 ©2015-2016
			   </div>	       
		    </div>
	    </div>
	    
		<div class='messagePopOut' style='display:none'>
         	<div class='messagePopText'>
         		
         	</div>
         	<div class='messagePopButton'>
         		OK
         	</div>        	
         </div>
	    <script src="/webprj/ecnu_mind/Public/js/Admin/Admin.js"></script>
    </body>

</html>