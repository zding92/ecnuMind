var btn = document.getElementById('btn_lgn');  
var tips = document.getElementById('tips');  
var user = document.getElementById('login_user');  
var password = document.getElementById('login_pwd');
var sendstr = "username=" + user.value + "&password=" + password.value;
$(document).ready(function () {	
    
    function handleReturn(call) {
    	switch (call) {
		case 'custom_login':
			//tips.innerHTML = '<font color="green">登录成功，跳转中...</font>';
            location = "user"; // 登录成功后指定跳转页面  
			break;
		case 'admin_login':
			//tips.innerHTML = '<font color="green">登录成功，跳转中...</font>';
            location = "admin"; // 登录成功后指定跳转页面  
			break;
		case 'user_noexist':
			//tips.innerHTML = '<font color="red">帐号不存在！</font>';
			indexShowTooltip('login_user','帐号不存在');
			break;
		case 'password_error':
			//tips.innerHTML = '<font color="red">密码错误！</font>';
			$("#login_pwd").val('');
			indexShowTooltip('login_pwd','密码错误');
			break;
		case 'user_custom_incomplete':
			//tips.innerHTML = '<font color="green">登录成功，跳转中...</font>';
            location = "guide"; // 登录成功后指定跳转页面  
			break;
		default:
			break;
		}
	}
    
    $('#login-button').click(function () {
        $.ajax({           	
            url: login_url, //请求验证页面 
            type: "POST", //请求方式
            data: "username=" + $("#login_user").val() + "&password=" + $("#login_pwd").val(),// + "&verify=" + $("#verify").val(),
            success: function (call) {
                handleReturn(call);          	         
            }
        });
    });
});

document.onkeydown = function(e){ 
    var ev = document.all ? window.event : e;
    if(ev.keyCode==13) {
    	if ($(".registerForm").css("display") == "none")
    		setTimeout(function () { $("#login-button" ).click(); }, 20);
    	else 
    		setTimeout(function () { $("#register-button" ).click(); }, 20);
     }
}


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

