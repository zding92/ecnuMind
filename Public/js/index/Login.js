var btn = document.getElementById('btn_lgn');  
var tips = document.getElementById('tips');  
var user = document.getElementById('login_user');  
var password = document.getElementById('login_pwd');
var sendstr = "username=" + user.value + "&password=" + password.value;
window.onload = function () {
    btn.onclick = function () {
        var isValidate = false;
        if (!user.value.match(/^[a-zA-Z0-9\u4E00-\u9FA5][0-9a-zA-Z\u4E00-\u9FA5]{3,15}/)) {
            tips.innerHTML = '<font color="red">账号格式不符合，请重新输入</font>';
            return;
        } else {
            isValidate = true;
        }
        if (!password.value.match(/^.{6,20}$/)) {
            tips.innerHTML = '<font color="red">请输入长度为6-20位的密码</font>';
            return;
        } else {
            isValidate = true;
        }
        
        function handleReturn(call) {
        	switch (call) {
			case 'custom_login':
				tips.innerHTML = '<font color="green">登录成功，跳转中...</font>';
                location = custom_url; // 登录成功后指定跳转页面  
				break;
			case 'admin_login':
				tips.innerHTML = '<font color="green">登录成功，跳转中...</font>';
                location = admin_url; // 登录成功后指定跳转页面  
				break;
			case 'user_noexist':
				tips.innerHTML = '<font color="red">帐号不存在！</font>';
				break;
			case 'password_error':
				tips.innerHTML = '<font color="red">密码错误！</font>';
				break;
			case 'user_custom_incomplete':
				tips.innerHTML = '<font color="green">登录成功，跳转中...</font>';
                location = incomplete_url; // 登录成功后指定跳转页面  
				break;
			default:
				break;
			}
		}
        
        if (isValidate) {
            $.ajax({
                url: login_url, //请求验证页面 
                type: "POST", //请求方式
                data: "username=" + $("#login_user").val() + "&password=" + $("#login_pwd").val(),
                success: function (call) {
                    handleReturn(call);          	         
                }
            });
        }

    }
}

document.onkeydown = function(e){ 
    var ev = document.all ? window.event : e;
    if(ev.keyCode==13) {
    	$("#btn_lgn" ).click();
     }
}

