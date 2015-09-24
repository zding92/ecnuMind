<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>【华师智库】完善个人信息</title>	
	<link rel='stylesheet' href='/webprj/ecnu_mind/Public/jsLib/jquery/Combox/css.css'>
  	<link rel='stylesheet' href='/webprj/ecnu_mind/Public/jsLib/jquery/Combox/form.css'>
  	<link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/css/guide.css"/>
  	<link rel="Stylesheet" type="text/css" href="/webprj/ecnu_mind/Public/jsLib/myAlert/myAlert.css"/> 
	<script src="/webprj/ecnu_mind/Public/jsLib/jquery/jquery.min.js"></script> 
	<script src='/webprj/ecnu_mind/Public/JSON/ComboxData.js'></script>
    <script src='/webprj/ecnu_mind/Public/jsLib/jquery/Combox/Combox.js'></script>
    <script src="/webprj/ecnu_mind/Public/jsLib/myAlert/myAlert.js"></script>
    <script type="text/javascript">
   		var app_url = "/webprj/ecnu_mind/index.php";
    </script>
</head>
<body>
	<div class='stepGuideHeader'>
		<h1>
			欢迎使用华师智库
			<span>在这里，让你的想法闪耀</span>
		</h1>
	</div>
	<div class='stepGuideContainer'>
		<div class='stepGuideInnerContainer'>
			<h1>您叫什么名字？</h1>
			<form stepGuide='1' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<input type='text' class='stepGuideText' name='name' value='<?php echo ($name); ?>'>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='2' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<input type='text' class='stepGuideText'  name='student_id' value='<?php echo ($student_id); ?>'>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='3' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<select class='stepGuideText'  name='gender'>
					<option label=""></option>
					<option label="男" <?php echo ($gender == '男' ? 'selected = "selected"' : ''); ?>>男</option>
					<option label="女" <?php echo ($gender == '女' ? 'selected = "selected"' : ''); ?>>女</option>
				</select>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='4' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<input type='text' class='stepGuideText'  name=email value='<?php echo ($email); ?>'>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='5' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<input type='text' class='stepGuideText'  name='address' value='<?php echo ($address); ?>'>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='6' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<input type='text' class='stepGuideText'  name='phone' value='<?php echo ($phone); ?>'>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='7' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<select class='kitjs-form-suggestselect stepGuideSelect1' style='margin-bottom: 10px;' id='academy'  name='academy'></select>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='8' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<select class='kitjs-form-suggestselect' style='margin-bottom: 10px;' id='department'  name='department'></select>				
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='9' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<select class='kitjs-form-suggestselect' style='margin-bottom: 10px;' id='major'  name='major'></select>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			<form stepGuide='10' class='stepGuideForm'>
				<input type='button' class='prev' value='←'>
				<select class='stepGuideText'  name='grade'>
					<option label=""></option>
					<option label="大一" <?php echo ($grade == '大一' ? 'selected = "selected"' : ''); ?>>大一</option>
					<option label="大二" <?php echo ($grade == '大二' ? 'selected = "selected"' : ''); ?>>大二</option>
					<option label="大三" <?php echo ($grade == '大三' ? 'selected = "selected"' : ''); ?>>大三</option>
					<option label="大四" <?php echo ($grade == '大四' ? 'selected = "selected"' : ''); ?>>大四</option>
					<option label="研一" <?php echo ($grade == '研一' ? 'selected = "selected"' : ''); ?>>研一</option>
					<option label="研二" <?php echo ($grade == '研二' ? 'selected = "selected"' : ''); ?>>研二</option>
					<option label="研三" <?php echo ($grade == '研三' ? 'selected = "selected"' : ''); ?>>研三</option>
					<option label="博士" <?php echo ($grade == '博士' ? 'selected = "selected"' : ''); ?>>博士</option>
				</select>
				<input type='button' class='stepGuideSubmit next' value='→'>				
			</form>
			
			<div class='stepGuideProgress'>
					<div class='stepGuideInProgress'> </div>
			</div>
			<div class='stepGuideInfo'>
				<span class='stepGuideError'></span>
				<span class='showStepNum'>
				<span class='stepNow'></span>/
				<span class='stepAll'></span>
				</span>
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
	<script>
		// 唯一值，不可重复
		var myStudentId = '<?php echo ($student_id); ?>';
		var myEmail = '<?php echo ($email); ?>';
		var myPhone = '<?php echo ($phone); ?>';
		//此变量为，总共需要几步完成整个stepGuide
		var stepGuideNum = <?php echo ($stepGuideNum); ?>;
		//当前正进行到哪个stepGuide
		var stepGuideInProgress = <?php echo ($complete_steps); ?>;
		var schoolJSON = eval('(' + '<?php echo ($schoolJSON); ?>' + ')');
		var academy = '<?php echo ($academy == '' ? null : $academy); ?>';
		var department = '<?php echo ($department == '' ? null : $department); ?>';
		var major = '<?php echo ($major == '' ? null : $major); ?>';
	</script>
	<script src="/webprj/ecnu_mind/Public/js/guide/guide.js"></script> 
</body>
</html>