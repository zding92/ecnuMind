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
        if (isValidate) {
            $.ajax({
                url: 'Home/Index/login', //请求验证页面 
                type: "POST", //请求方式
                data: "username=" + $("#login_user").val() + "&password=" + $("#login_pwd").val(),
                success: function (call) {
                    eval(call);
                    if (login) {
                        tips.innerHTML = '<font color="green">登录成功，跳转中...</font>';
                        location = 'LoginSuccess/' + $("#login_user").val()+'/'; // 登录成功后指定跳转页面  
                    } else {
                        if (user_noexist) {
                            tips.innerHTML = '<font color="red">帐号不存在！</font>';
                        }
                        else if (pwd_error) {
                            tips.innerHTML = '<font color="red">密码错误！</font>';
                        }
                    }
                }
            });
        }

    }
}

