/**
 * 此js用于用户首次使用页面
 */



var question = ['您的真实姓名是？',
                '您的学号是？',
                '您常用的电子邮箱是？',
                '您的通信地址是？',
                '您的联系电话是？',
                '您的性别是？',
                '您来自哪个学院？',
                '您来自哪个系别、专业？',
                '请简单介绍一下您'];

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
            $("#academy").prev().css({ 'outline-color': '#ff0000', 'border': '2px solid #ff0000' });
            $("#department").prev().removeAttr('style');
            $("#major").prev().removeAttr('style');
            $("#combobox-tip").html('请填写正确学院/系别（应与选择框中的待选项完全一致）');
            $("#combobox-tip").slideDown("fast");
            break;
        case 'department':
            $("#academy").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
            $("#department").prev().css({ 'outline-color': '#ff0000', 'border': '2px solid #ff0000' });
            $("#major").prev().removeAttr('style');
            $("#combobox-tip").html('请填写正确系别（应与选择框中的待选项完全一致）');
            $("#combobox-tip").slideDown("fast");
            break;
        case 'major':
            $("#academy").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
            $("#department").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });    
            $("#major").prev().css({ 'outline-color': '#ff0000', 'border': '2px solid #ff0000' });
            $("#combobox-tip").html('请填写正确专业（应与选择框中的待选项完全一致）');
            $("#combobox-tip").slideDown("fast");
            break;
        case 'legal':
            $("#academy").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
            $("#department").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
            $("#major").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
            $("#combobox-tip").slideUp("fast");
            $("#combobox-tip").html('');
            break;
        default: break;
   
    }
}

$(document).ready(function(){
	Combobox();
	b3.transform();
	b1.formEl.name = 'academy';
	b1.formEl.id = 'academy';
//	b1.inputEl.value = user_json.academy;
//	b1.formEl.value = user_json.academy;
	b2.formEl.name = 'department';
	b2.formEl.id = 'department';
//	b2.inputEl.value = user_json.department;
//	b2.formEl.value = user_json.department;
	b3.formEl.name = 'major';
	b3.formEl.id = 'major';
//	b3.formEl.value = user_json.major;
//	b3.inputEl.value = user_json.major;
	//使文本框初始化时选中
	$('.stepGuideText').focus();
	//初始化进度条
	$('.stepGuideInProgress').css('width',stepGuideInProgress*100/stepGuideNum+'%');
	
	//初始化问题
	$('.stepGuideInnerContainer h1').text(question[stepGuideInProgress-1]);
	
	//初始化显示的form
	$('.stepGuideInnerContainer').children("form").each(function(){
		if ($(this).attr('stepGuide') == stepGuideInProgress) {//如果form的stepGuide属性为当前的stepGuide
			$(this).css('display','block');
		}
		else {//如果form的stepGuide属性不为当前的stepGuide
			$(this).css('display','none');
		}
	});
	
	//初始化显示第几步
	$('.stepNow').text(stepGuideInProgress);
	$('.stepAll').text(stepGuideNum);
	
	$('.next').click(function(){				
		if (stepGuideInProgress<stepGuideNum){
			if ($(this).siblings(":text").val() !== ''){//如果表单项如果完整填写				
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
					}
					else {//如果form的stepGuide属性不为当前的stepGuide
						$(this).css('display','none');
					}
				});
			}
			else{//如果表单项如果没有完整填写
				$('.stepGuideError').text('请完整填写后再提交哦~');
			}
		}
	});	
})