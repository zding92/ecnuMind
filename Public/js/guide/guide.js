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

function Check_Ajax(action,items,value)
{
    var check_result;
    $.ajax({
        url: app_url + "/home/home/checkForm", //请求验证页面 
        type: "GET", //请求方式
        async: false,
        data: "action=" + action + "&" + "value" + "=" + value,
        success: function (call) {
            check_result = call;     
        }
    });
    return check_result;
}

function Checkform_Combobox(){
    var call = Check_Ajax("combobox", "combobox", $("#academy").val()+'|'+$("#department").val()+'|'+$("#major").val());
    switch(call)
    {
        case 'academy':
            $(".stepGuideError").text('请填写正确学院/系别（应与选择框中的待选项完全一致）');
            break;
        case 'department':
            $(".stepGuideError").text('请填写正确系别（应与选择框中的待选项完全一致）');
            break;
        case 'major':
        	$(".stepGuideError").text('请填写正确专业（应与选择框中的待选项完全一致）');
            break;
        case 'legal':
        	$(".stepGuideError").text('');
            break;
        default: break;
   
    }
}


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
	b1.inputEl.value = academy == 'null' ? null : academy;
	b1.formEl.value = academy == 'null' ? null : academy;
	b2.formEl.name = 'department';
	b2.formEl.id = 'department';
	b2.inputEl.value = department == 'null' ? null : department;
	b2.formEl.value = department == 'null' ? null : department;
	b3.formEl.name = 'major';
	b3.formEl.id = 'major';
	b3.formEl.value = major == 'null' ? null : major;
	b3.inputEl.value = major == 'null' ? null : major;

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
	
	$('.prev').click(function(){				
		if (stepGuideInProgress >1){
						
			//清空提示信息
			$('.stepGuideError').text('');
			
			//点击下一步，进入下一个步骤
			stepGuideInProgress--;
			
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
				}
				else {//如果form的stepGuide属性不为当前的stepGuide
					$(this).css('display','none');
				}
			});
		}
	});
	
	$('.next').click(function(){
		if (stepGuideInProgress <= stepGuideNum){
			if ($(this).parent().find(":text,select").val() !== ''){//如果表单项如果完整填写
				// 当院系专全部填完时，统一验证。
				if ($(this).parent().attr('stepGuide') != '7' &&
						$(this).parent().attr('stepGuide') != '8') {
					if ($(this).parent().attr('stepGuide') != '9') {
				
						var name = $(this).parent().find(":text").attr('name');
						if (name == 'studentid' && 
									$(this).parent().find(":text").val() == myStudentid) {
								allowSlide();
						} 
						else if (name == 'email' &&
									$(this).parent().find(":text").val() == myEmail) {
								allowSlide();
						} 
						else if (name == 'phone' &&
									$(this).parent().find(":text").val() == myPhone) {
								allowSlide();
						} 			
						else submitItem($(this).parent());
					
					} else {
						submitItem($("[stepGuide='7'],[stepGuide='8'],[stepGuide='9']"));
					}			
				} else allowSlide();			
			}
			else{//如果表单项如果没有完整填写
				$('.stepGuideError').text('请完整填写后再提交哦~');
			}
		}
	});	
	
	function submitItem($form) {
		$.ajax({
			url: app_url + "/home/guide/submitItem", //请求验证页面 
	        type: "POST", //请求方式
	        async: false,
	        contentType: "application/x-www-form-urlencoded; charset=utf-8",
	        data: $form.serialize() + '&step='+stepGuideInProgress,
	        success: function (call) {
	        	if (call == 'success')
	        		allowSlide();
	        	else 
	        		$('.stepGuideError').text(call);;   
	        }
		})
	}
	
	function allowSlide() {
		if (stepGuideInProgress < stepGuideNum) {
			//清空提示信息
			$('.stepGuideError').text('');
			
			//点击下一步，进入下一个步骤
			stepGuideInProgress++;
			
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
			location = app_url + '/home/home/home';
		}
	}
	
})




