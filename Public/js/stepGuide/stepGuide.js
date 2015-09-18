/**
 * 此js用于用户首次使用页面
 */

//此变量为，总共需要几步完成整个stepGuide
var stepGuideNum = 8;
var question = ['您叫什么名字？',
                '您的学号是多少？',
                '请输入您的电子邮箱',
                '请输入您的通信地址',
                '请输入您的联系电话',
                '您的性别是？',
                '您来自哪个学院？',
                '您来自哪个系别、专业？'];

$(document).ready(function(){	
	//使文本框初始化时选中
	$('.stepGuideText').focus();
	
	//当前正进行到哪个stepGuide
	var stepGuideInProgress = 1;
	
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
	})
	
})