<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Personal Main Page</title>
  <link rel='stylesheet' href='/webprj/ecnu_mind/Public/jsLib/jquery/Combox/css.css'>
  <link rel='stylesheet' href='/webprj/ecnu_mind/Public/jsLib/jquery/Combox/form.css'>
  <link rel='Stylesheet' type='text/css' href='/webprj/ecnu_mind/Public/jsLib/jquery/Jcrop/jquery.Jcrop.min.css'>
  <script src='/webprj/ecnu_mind/Public/jsLib/jquery/Jcrop/Jcrop.js'></script>
  <script src='/webprj/ecnu_mind/Public/jsLib/jquery/Jcrop/jquery.Jcrop.min.js'></script>
  <script src='/webprj/ecnu_mind/Public/js/home/InitPersonalInfo.js'></script>
  <script type="text/javascript" src="/webprj/ecnu_mind/Public/js/home/hoverTag.js"> </script>
</head>

<body>
	<div class='title_box'>
	  <div style="display:inline-block;width:15px;height:15px;">
	    <img style="width:15px;height:15px;margin-left:-10px;" src ="/webprj/ecnu_mind/Public/img/icon/base.png">
	  </div>
	    基础信息编辑
	</div>
	<div id='ChangePage' class='Two-box clearfix'>
	  <div class='Page-box clearfix' id='Page1'>
	    <div class='choice1'>
	      <button id='btn_edit' class='btn_change'>←编辑照片</button>
	    </div>
	    <div class='head'>
	      <p>Infomation</p>
	    </div>
	    <div class='form-box'>
	      <form id='form_base'>            
	    	
	    	<div class='form-group'>
              <label class='label1' for='name'>姓名</label>
              <input type='text' name='name' class='form-control' id='name' placeholder='请输入真实姓名'>
              <label for='checkName'></label>
            </div>
            <div class='form-tip' id='name-tip' style='display:none'></div>
            
            <div class='form-group'>
              <label class='label1' for='Email'>电子邮件</label>
               <input type='text' name='email' class='form-control' id='Email' placeholder='example@qq.com'>
            </div>
            <div class='form-tip' id='Email-tip' style='display:none'></div>         
            
            <div class='form-group'>
              <label class='label1' for='address'>地址</label>
              <input type='text' name='address' class='form-control' id='address' placeholder='请输入你在学校的联系地址'>
            </div>
            <div class='form-tip' id='address-tip' style='display:none'></div>
            
            <div class='form-group'>
              <label class='label1' for='phone'>联系电话</label>
              <input type='text' name='phone' class='form-control' id='phone' placeholder='请输入手机号码'>
            </div>
            <div class='form-tip' id='phone-tip' style='display:none'></div>
            
            <div class='form-group' style='text-align:center;font-size: 15px;font-weight: 700;color: rgba(120,120,120,0.9)'>
	          <label class='label1'>性别</label>
	          <input type='radio' class='sexbox' id='male' value='男' name='gender'>
	          <span>汉纸</span>
	          <input type='radio' class='sexbox' id='female' value='女' name='gender'>
	          <span>妹纸</span>
            </div>
            
            <div class='form-group'>
              <label class='label1' for="schooling_system">学制</label>
			    <select id="schooling_system" name="schooling_system" class='form-control'>
			      <option selected = "selected">请选择学制</option>
				  <option value="全日制本科">全日制本科</option>
				  <option value="专业型硕士">专业型硕士</option>
				  <option value="学术型硕士">学术型硕士</option>
				  <option value="博士">博士（含硕博连读）</option>
			    </select>
            </div>
            <div class='form-tip' id='schooling_system-tip' style='display:none'></div>
            
            <div class='form-group'>
              <label class='label1' for="campus">校区</label>
			    <select id="campus" name="campus" class='form-control'>
			      <option selected = "selected">请选择校区</option>
				  <option value="中山北路校区">中山北路校区</option>
				  <option value="闵行校区">闵行校区</option>
			    </select>
            </div>
            <div class='form-tip' id='campus-tip' style='display:none'></div>
                     
            <div class='form-tip' id='combobox-tip' style='display:none'></div>
            
            <div class='form-group' style='height:190px'>
              <label class='label1' for='brief'>个人简介</label>
              <textarea type='text' name='brief' class='form-control' id='brief' placeholder='请在100字内简单介绍一下自己吧。可以说明一下自己擅长哪些技术~当然也可以谈谈兴趣爱好~'></textarea>
            </div>
            <div class='form-tip' id='brief-tip' style='display:none'></div>
            
            <button type='submit' class='btn'>提交修改</button>
	      </form>
	    </div>
	    
	    <div class="help">
	      <p style="text-align: center; color: #bb0000; font-weight: 600;">个人信息维护说明</p>
	      <p style="color: #333;"><span>※</span> 目前暂不提供学号、学院、系别、专业等信息的修改</p>
	      <p style="color: #333;"><span>※</span> 如果因特殊原因（比如转系），需要对不可修改的信息进行更正，请联系管理员，我们会尽快处理</p>
	      <p style="color: #333;"><span>※</span> 如果本页的信息填写不完整，可能会导致在竞赛报名时生成的报名信息不完整</p>
	      <p style="color: #333;"><span>※</span> 如果您对个人信息的内容有更多的建议或者意见，请联系管理员^_^</p>
	    </div>
	  </div>
	  
	  
	  <div class='Page-box clearfix' id='Page2'>
	    
	    <div class='choice2'>
	      <button id='btn_photo' class='btn_change'>编辑个人信息→</button>
	    </div>
	    
	    <div class='head' style='left: 23%;'>
	      <p>Photo</p>
	    </div>
	    
	    <div class='form-box'>
	      <div class='Old'>
	        <p>当前使用</p>
	        <div class='photo' style='width: 120px;height: 120px;left: 82px;top: 167px;'>
	          <img src='/webprj/ecnu_mind/Public/img/photo/face.png' alt='照片载入失败'>
	        </div>	        
	      </div>
	      
	      <div class='New'>
	        <form id='upload_form' enctype='multipart/form-data' method='post' action='upload.php' onsubmit='return checkForm()'>
	          <!-- hidden crop params -->
	          <input type='hidden' id='x1' name='x1'>
	          <input type='hidden' id='y1' name='y1'>
	          <input type='hidden' id='x2' name='x2'>
	          <input type='hidden' id='y2' name='y2'>
	          <input type='file' name='image_file' id='image_file' onchange='fileSelectHandler();'>
	          <button id='btn_upload' class='btn_change' style='position: absolute;left: -1px;z-index: 0;'>选择照片</button>
	          <span style='position: relative;left: 160px;top: 20px;font-size: 10px'>请注意图片大小不要超过200*200(100kb)</span>
	          <div class='photo_error'></div>
	          
	          <div class='photo-edit'>
	            <img id='preview'>
	            <br>
	            <p style='position: relative;color:#ffd800'>可以拖动鼠标对图片裁剪</p>
	            <input type='submit' class='btn_change' value='确定上传'>
	          </div>          
	        </form>
	        
	      </div>
	    </div>

	  </div>
	</div>
	<script type="text/javascript">
      Jcrop();
      InitPersonalInfo();
	</script>
</body>
</html>