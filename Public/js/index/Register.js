$(function(){
	$("#switch-reg").click(function(){
		$(".loginForm").slideUp(500,function(){
			$(".registerForm").slideDown(500);
		});
	});

	$("#switch-login").click(function(){
		$(".registerForm").slideUp(500,function(){
			$(".loginForm").slideDown(500);
		});
	});

	function handleReturn(call) {
		switch (call) {
		case 'username_exist':
			//alert("账号已存在！");
			indexShowTooltip('reg_user','账号已存在');
			break;
		case 'username_error':
			//alert("账号只能为4~20位的英文和数字！");
			$("#reg_user").val('');
			indexShowTooltip('reg_user','账号只能为4~20位的英文和数字');
			break;
		case 'repassword_error':
			//alert("两次密码输入的不一样！");
			$("#reg_pwd").val('');
			$("#reg_repwd").val('');
			indexShowTooltip('reg_repwd','两次密码输入的不一样');
			break;
		case 'password_error':
			$("#reg_pwd").val('');
			$("#reg_repwd").val('');
			indexShowTooltip('reg_repwd','密码只能为6~20位');
			break;
		case 'success':
			location = "guide";
		default:
			break;
		}
	}


	$("#register-button").click(function(){
		var regData =  "username=" + $("#reg_user").val() + 
								"&password=" + $("#reg_pwd").val() + 
								"&repassword=" + $("#reg_repwd").val(); 
		$.ajax({
			url: register_url,
			type: "POST",
			data: regData,
			success: function(result) {
				handleReturn(result);
			}
		})
	})	
})


/**
 * tooltip显示错误内容
 * @param selector 何处显示错误(id名称)
 * @param errorInfo 错误信息
 */
function indexShowTooltip(selector,errorInfo){
	$("#"+selector).attr("title",errorInfo);
	$("#"+selector).tooltipster({
		trigger: 'custom',
		theme: 'tooltipster-noir',
		position: 'right'
	});
	// show a tooltip (the 'callback' argument is optional)
	$("#"+selector).tooltipster('show',function(){
		setTimeout(function(){
			$("#"+selector).tooltipster('hide');
		},2000)
	});
}

