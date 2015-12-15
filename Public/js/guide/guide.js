/**
 * 此js用于用户首次使用页面
 */



var question = ['您的真实姓名是？',
                '您的学号是？',
                '您的性别是？',
                '您常用的电子邮箱是？',
                '您的通信地址是？',
                '您的联系电话是？',
                '您来自哪个学院？',
                '您来自哪个系别？',
                '您来自哪个专业？',
                '您当前的年级？'];

document.onkeydown = function(e){ 
    var ev = document.all ? window.event : e;
    if(ev.keyCode==13) {
    	$("[stepGuide='"+stepGuideInProgress+"'] .next" ).trigger('click');
     }
}

$(document).ready(function(){
	Combobox();
	b3.transform();
	b1.formEl.name = 'academy';
	b1.formEl.id = 'academy';
	b2.formEl.name = 'department';
	b2.formEl.id = 'department';
	b3.formEl.name = 'major';
	b3.formEl.id = 'major';
	
	// 如果中断在学院/系别/专业三栏中，下次登录必然从学院开始
	if (stepGuideInProgress == 8 ||	 stepGuideInProgress == 9)
		stepGuideInProgress = 7;
	
	//初始化进度条
	$('.stepGuideInProgress').css('width',stepGuideInProgress*100/stepGuideNum+'%');
	
	//初始化问题
	$('.stepGuideInnerContainer h1').text(question[stepGuideInProgress-1]);
	
	//初始化显示的form
	$('.stepGuideInnerContainer').children("form").each(function(){
		$(this).submit(function(e){
			e.preventDefault();
		});
		
		if ($(this).attr('stepGuide') == stepGuideInProgress) {//如果form的stepGuide属性为当前的stepGuide
			$(this).children('.stepGuideText').focus();
			$(this).css('display','block');
		}
		else {//如果form的stepGuide属性不为当前的stepGuide
			$(this).css('display','none');
		}
	});
	
	//初始化显示第几步
	$('.stepNow').text(stepGuideInProgress);
	$('.stepAll').text(stepGuideNum);
	
//	$('.prev').click(function(){				
//		if (stepGuideInProgress >1){
//						
//			//清空提示信息
//			$('.stepGuideError').text('');
//			
//			//点击下一步，进入下一个步骤
//			stepGuideInProgress--;
//			
//			//显示第几步
//			$('.stepNow').text(stepGuideInProgress);
//			
//			//显示对应的问题
//			$('.stepGuideInnerContainer h1').text(question[stepGuideInProgress-1]);
//			
//			//进度条增加
//			$('.stepGuideInProgress').css('width',stepGuideInProgress*100/stepGuideNum+'%');
//			
//			//显示对应的form
//			$('.stepGuideInnerContainer').children("form").each(function(){
//				if ($(this).attr('stepGuide') == stepGuideInProgress) {//如果form的stepGuide属性为当前的stepGuide
//					$(this).css('display','block');
//				}
//				else {//如果form的stepGuide属性不为当前的stepGuide
//					$(this).css('display','none');
//				}
//			});
//		}
//	});
	
	$('.next').click(function(){
		if (stepGuideInProgress <= stepGuideNum){
			if ($(this).parent().find(":text,select").val() !== ''){//如果表单项如果完整填写
				if ($(this).parent().attr('stepGuide') == '8') {
					submitItem($("[stepGuide='7'],[stepGuide='8']"));
				} else if($(this).parent().attr('stepGuide') == '9'){
					submitItem($("[stepGuide='7'],[stepGuide='8'],[stepGuide='9']"));
				} else
					submitItem($(this).parent());
			}
			else{//如果表单项如果没有完整填写
				$('.stepGuideError').text('请完整填写后再提交哦~');
			}
		}
	});	
	
	function submitItem($form) {
		$.ajax({
			url: app_url + "/Custom/guide/submitItem", //请求验证页面 
	        type: "POST", //请求方式
	        contentType: "application/x-www-form-urlencoded; charset=utf-8",
	        data: $form.serialize() + '&step='+stepGuideInProgress,
	        success: function (call) {
	        	if (call == 'success' || call == 'legal')
	        		allowSlide();
	        	else 
	        		//$('.stepGuideError').text(call);;   
	        		switch (call){
		        		case 'username_exist' : myAlert('用户名重复');break;	        		
		        		case  'name_error' : myAlert('请输入正确的姓名');break;	
		        		case 'email_exist' : myAlert('此Email地址已经被注册');break;	
		        		case  'email_error' : myAlert('请输入正确的Email地址');break;	
		        		case 'phone_exist' : myAlert('此号码已经被注册');break;	
		        		case  'phone_error' : myAlert('请正确输入联系电话');break;	
		        		case 'gender_error' : myAlert('请正确输入性别');break;	
		        		case  'student_id_exist' : myAlert('此学号已经被注册');break;	
		        		case  'student_id_error' : myAlert('请正确输入学号');break;	
		                case 'academy' : myAlert('请填写正确学院/系别（应与选择框中的待选项完全一致）');break;	
		                case 'department' : myAlert('请填写正确系别（应与选择框中的待选项完全一致）');break;	
		                case 'major' : myAlert('请填写正确专业（应与选择框中的待选项完全一致）');break;	
		                default: break;
	        		}
	        		
	        }
		})
	}
	
	function allowSlide() {
		if (stepGuideInProgress < stepGuideNum) {
			//清空提示信息
			$('.stepGuideError').text('');
			
			//点击下一步，进入下一个步骤
			stepGuideInProgress++;
			
			//在学号页面时，弹出"学号一经确认不可修改"
			if (stepGuideInProgress == 2){
				myAlert("学号一经确认不可修改");
			}
			
			//显示第几步
			$('.stepNow').text(stepGuideInProgress);
			
			//显示对应的问题
			$('.stepGuideInnerContainer h1').text(question[stepGuideInProgress-1]);
			
			//进度条增加
			$('.stepGuideInProgress').css('width',stepGuideInProgress*100/stepGuideNum+'%');
			
			//显示对应的form
			$('.stepGuideInnerContainer').children("form").each(function(){
				if ($(this).attr('stepGuide') == stepGuideInProgress) {//如果form的stepGuide属性为当前的stepGuide
					$(this).css('display','block');
					$(this).children('.stepGuideText,.kitjs-form-suggestselect-input').focus();
				}
				else {//如果form的stepGuide属性不为当前的stepGuide
					$(this).css('display','none');
				}
			});
		} else {
			// 最后一步，跳转进入主页。
			location = 'user';
		}
	}
	
})





