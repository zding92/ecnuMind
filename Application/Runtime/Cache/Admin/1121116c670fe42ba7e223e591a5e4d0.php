<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta name="renderer" content="webkit">
  <meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>Safe</title>
  <link rel="Stylesheet" type="text/css" href="/Public/css/bootstrap/bootstrap.min.css" />
  <link rel="Stylesheet" type="text/css" href="/Public/css/Safe.css" />
  <link rel="Stylesheet" type="text/css" href="/Public/jsLib/myAlert/myAlert.css"/>
 
  <script src="/Public/jslib/jquery/jquery.min.js"></script>
  <script src="/Public/jslib/bootstrap/bootstrap.min.js"></script>
  <script src="/Public/jsLib/myAlert/myAlert.js"></script>
  
</head> 
<body >
	<div class="title_box">
		<div style="display:inline-block;width: 15px;height: 15px;margin:0px 10px auto;">
			<img style="width: 15px;height: 15px; margin-left: -10px;align-items: center;margin-bottom: 5px;" src="/Public/img/icon/safe.png">
		</div>
		更改密码
	</div>
	  <form class="form-horizontal">
    <fieldset style="padding:40px 100px">
      <div id="legend" class="">
        <legend class="h3">必填信息</legend>
      </div>

    <div class="control-group">
          <!-- Appended input-->
          <label class="control-label">请输入原密码</label>
          
          <div class="controls">
            <div class="input-append" style="positon:static">
              <input id="Safe_original_pwd" class="span2"  type="password">
              <span class="add-on">^_^</span>
            </div>
            <p class="help-block"></p>
          </div>
        </div>
        
    <div class="control-group">
          <!-- Appended input-->
          <label class="control-label">请输入新密码</label>
          
          <div class="controls">
            <div class="input-append" style="positon:static">
              <input id="Safe_new_pwd1" class="span2" type="password">
              <span class="add-on">^_^</span>
            </div>
            <p class="help-block"></p>
          </div>
        </div>
        
    <div class="control-group">
       <!-- Appended input-->
          <label class="control-label" >请再次输入新密码</label>
          
          <div class="controls">
            <div class="input-append" style="positon:static">
              <input id="Safe_new_pwd2" class="span2" type="password">
              <span class="add-on">^_^</span>
            </div>
            <p class="help-block"></p>
          </div>

        </div>
    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls" style="width:10%;height:100%;margin:0 auto">
            <button id="Safe_btn" class="button" type="button">提交</button>
          </div>
        </div>
    </fieldset>
  </form>
  
  <div class='messagePopOut' style='display:none'>
         	<div class='messagePopText'>
         		
         	</div>
         	<div class='messagePopButton'>
         		OK
         	</div>        	
   </div>	

<script>
	var PasswordChange_url = '/Admin/Home/PasswordChange'; 
</script>
<script src="/Public/js/home/ChangePassword.js"></script>
</body>
</html>