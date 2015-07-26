var flag_log = false;
var flag_reg = false;
var valid = false;

function retry(){
    $("#register_pwdre").val("");
    $("#register_pwdre").focus();
}

function safe(safe_level){
    if (safe_level == 2) {
        $("#pwd_tips").html('<img src="'+ public_url +'/img/high.png" style="margin-left:-30px;position:absolute" alt="noimg">');
        $("#safe_tips").html('<span style="color:#00ff00">安全性高</span>');
    }
    else if (safe_level == 1) {
        $("#pwd_tips").html('<img src="'+ public_url +'./img/mid.png" style="margin-left:-30px;position:absolute" alt="noimg">');
        $("#safe_tips").html('<span style="color:#fbc926">安全性中</span>');
    }
    else if (safe_level == 0) {
        $("#pwd_tips").html('<img src="'+ public_url +'/img/low.png" style="margin-left:-30px;position:absolute" alt="noimg">');
        $("#safe_tips").html('<span style="color:#ff0000">安全性低</span>');
    }
    $("#chk_pwd_yes").html('<img src="'+ public_url +'/img/YES.png" alt="noimg">');
    $("#chk_pwd_no").html("");
}

$("#register_user").blur(function () {
    var reg_usr = /^[a-zA-Z0-9\xa0-\xff][0-9a-zA-Z\xa0-\xff_]{3,15}/;
    if ($("#register_user").val().length == 0) {
        $("#chk_user_yes").html("");
        $("#chk_user_no").html("");
        $("#user_tips").html("");
        if (flag_log) {
            $("#register_pwd").animate({ marginTop: '-=35px' }, "fast");
            $("#lgn_body").animate({ height: '-=35px' }, "fast")
            flag_log = false;
        }
        valid = false;
        return;
    }

    if (reg_usr.test($("#register_user").val()) == false) {
        if (!flag_log) {
            $("#chk_user_yes").html("");
            $("#register_pwd").animate({ marginTop: '+=35px' }, "fast");
            $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                $("#user_tips").html("请输入4~16位的账号/学号/昵称");
                $("#chk_user_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
            });
            flag_log = true;
        }
        else {
            $("#user_tips").html("请输入4~16位的账号/学号/昵称");
            $("#chk_user_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
        }
        valid = false;
        return;
    }
    $.ajax({
        url: register_url, //请求验证页面 
        type: "POST", //请求方式,
        data: "username=" + $("#register_user").val() + "&password=" + "", 
        success: function (data) { //请求成功时执行操作
            eval(data);
            if (user_noexist) {
                if (flag_log) {
                    $("#chk_user_no").html("");
                    $("#user_tips").html("");
                    $("#register_pwd").animate({ marginTop: '-=35px' }, "fast");
                    $("#lgn_body").animate({ height: '-=35px' }, "fast", function () {
                        $("#chk_user_yes").html('<img src="'+ public_url +'/img/YES.png" alt="noimg">');
                    });
                    flag_log = false;
                } else {
                    $("#chk_user_yes").html('<img src="'+ public_url +'/img/YES.png" alt="noimg">');
                }
                return;
            }
            else {
                $("#chk_user_yes").html("");
                if (!flag_log) {
                    $("#register_pwd").animate({ marginTop: '+=35px' }, "fast");
                    $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                        $("#user_tips").html("此用户已存在");
                        $("#chk_user_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                    });
                    flag_log = true;
                } else {
                    $("#user_tips").html("此用户已存在");
                    $("#chk_user_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                }
                valid = false;
                return;
            }

        }
    });
})


$("#register_pwdre").blur(function () {

    if ($("#register_pwdre").val().length == 0 || $("#register_pwd").val() == "") {
        $("#chk_pwd_yes").html("");
        $("#chk_pwd_no").html("");
        $("#pwd_tips").html("");
        $("#safe_tips").html("");
        if (flag_reg) {
            $("#btn_reg").animate({ marginTop: '-=35px' }, "fast");
            $("#lgn_body").animate({ height: '-=35px' }, "fast")
            flag_reg = false;
        }
        valid = false;
        return;
    }

    if ($("#register_pwdre").val() != $("#register_pwd").val()) {
        $("#chk_pwd_yes").html("");
        $("#safe_tips").html("");
        if (!flag_reg) {
            $("#btn_reg").animate({ marginTop: '+=35px' }, "fast");
            $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                retry();
                $("#pwd_tips").html("两次输入的密码不一致，请重新输入");
                $("#chk_pwd_no").html('img src="'+ public_url +'/img/NO.png" alt="noimg">');
            });
            flag_reg = true;
        } else {
            retry();
            $("#pwd_tips").html("两次输入的密码不一致，请重新输入");
            $("#chk_pwd_no").html('img src="'+ public_url +'/img/NO.png" alt="noimg">');
        }
        valid = false;
        return;
    }

    if ($("#register_pwdre").val().length < 6 || $("#register_pwdre").val().length > 20) {
        $("#chk_pwd_yes").html("");
        $("#safe_tips").html("");
        if (!flag_reg) {
            $("#btn_reg").animate({ marginTop: '+=35px' }, "fast");
            $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                $("#pwd_tips").html("请输入6~20位密码");
                retry();
            })
            flag_reg = true;
        } else {
            $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
            $("#pwd_tips").html("请输入6~20位密码");
            retry();
        }
        valid = false;
        return;
    }

    if ($("#register_pwdre").val() == $("#register_user").val()) {
        $("#chk_pwd_yes").html("");
        $("#safe_tips").html("");
        if (!flag_reg) {
            $("#btn_reg").animate({ marginTop: '+=35px' }, "fast");
            $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                $("#pwd_tips").html("密码不得与用户名相同");
                retry();
            })
            flag_reg = true;
        } else {
            $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
            $("#pwd_tips").html("密码不得与用户名相同");
            retry();
        }
        valid = false;
        return;
    }
    valid = true;
    return;
})

$("#register_pwdre").keyup(function () {
    if ($("#register_pwd").val() == $("#register_pwdre").val()) {
        var reg_pwd_2 = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{6,20}$/;
        var reg_pwd_1 = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        var reg_pwd_0 = /^(?=.*[0-9])(?=.*[a-zA-Z\W]).{6,20}$/;
        var safe_level = 0;
        if ($("#register_pwdre").val() == $("#register_user").val()) {
            safe_level = -2;
        }
        else if (reg_pwd_2.test($("#register_pwdre").val()) == true) {
            safe_level = 2;
        }
        else if (reg_pwd_1.test($("#register_pwdre").val()) == true) {
            safe_level = 1;
        }
        else if (reg_pwd_0.test($("#register_pwdre").val()) == true) {
            safe_level = 0;
        }
        else {
            safe_level = -1;
        }

        if (safe_level == -2) {
            $("#chk_pwd_yes").html("");
            $("#safe_tips").html("");
            if (!flag_reg) {
                $("#btn_reg").animate({ marginTop: '+=35px' }, "fast");
                $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                    $("#pwd_tips").html("密码不得与用户名相同");
                    $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                    retry();
                });
                flag_reg = true;
            } else {
                $("#pwd_tips").html("密码不得与用户名相同");
                $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                retry();
            }
            valid = false;
            return;
        }else if (safe_level == -1) {
            $("#chk_pwd_yes").html("");
            $("#safe_tips").html("");
            if (!flag_reg) {
                $("#btn_reg").animate({ marginTop: '+=35px' }, "fast");
                $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                    $("#pwd_tips").html("密码必须同时包含数字以及英文字符");
                    $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                    retry();
                });
                flag_reg = true;
            } else {
                $("#pwd_tips").html("密码必须同时包含数字以及英文字符");
                $("#chk_pwd_no").html('<img src="'+ public_url +'/img/NO.png" alt="noimg">');
                retry();
            }
            valid = false;
            return;
        }

        if (!flag_reg) {
            $("#btn_reg").animate({ marginTop: '+=35px' }, "fast");
            $("#lgn_body").animate({ height: '+=35px' }, "fast", function () {
                safe(safe_level);
            })
            flag_reg = true;
        }
        else safe(safe_level);
    }
})



$("#btn_reg").click(function () {
    $("#register_user").blur();
    alert("hello");
    $("#register_pwdre").blur()
    if ( valid ) {
        $.ajax({
            url: register_url, //请求验证页面 
            type: "POST", //请求方式
            data: "username=" + $("#register_user").val() + "&password=" + $("#register_pwdre").val(), 
            success: function (data) { //请求成功时执行操作
                eval(data);
                if (reg_success) {
                    location = 'LoginSuccess/' + $("#register_user").val() +'/';
                }
                else {
                    var str="username=" + $("#register_user").val() + "&password=" + $("#register_pwdre").val();                   
                }
            }
        })
    }
})

