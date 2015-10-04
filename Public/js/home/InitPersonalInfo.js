function InitPersonalInfo() {
	
///\ 初始化相关事件响应函数
///---------------------
var btn_valid = true;

$('.sexbox').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
});

$("#btn_edit").click(function () {
    if (btn_valid) {
        btn_valid = false;
        $("#Page2").css('display', 'inline-block');
        $("#ChangePage").animate({
            right: "800px"
        }, 300, function () {
            $("#Page2").css('left', '800px');
            $("#Page2 .form-box").css('float', 'left');
            $("#Page1").css('display', 'none');
            btn_valid = true;
        });
    }
});

$("#btn_photo").click(function () {
    if (btn_valid) {
        btn_valid = false;
        $("#Page1").css('display', 'inline-block');
        $("#Page2").css('left', '0px');
        $("#ChangePage").animate({
            right: "0px"
        }, 300, function () {
            $("#Page2").css('display', 'none');
            btn_valid = true;
        });
    }
});

$("#image_file").hover(function(){
    $("#btn_upload").css("background","rgb(59,169,222)");
})

$("#image_file").mouseout(function(){
    $("#btn_upload").css("background","#2b99ce");
})



//表单提交事件。
$("#form_base").submit(function (ev) {
    ev.preventDefault();
    var submit_value = "";
    var changed = false;
    $("#form_base input,textarea,select").each(function () {
        var Items = $(this);
        if ($(this).attr('name') == 'gender' && !$(this).parent().hasClass('checked'))
            return;
        if (isChanged(Items)) {
            changed = true;
        }
        submit_value = submit_value + $(this).attr('name') + "=" + $(this).val() + "&";
    })
    // 如何相对于一开始没有改变，则不提交。
    if (changed == true) {
        $.ajax({
            url: model_url + "/submitModify", //请求验证页面 
            type: "GET", //请求方式
            data: submit_value,
            success: function (call) {
                if (call == 'failed') alert('表单有误，请仔细检查后再提交！');
                else {
                    alert('修改成功！');
                    // 跳转回主页，待修改。
                    location.href = model_url + '/home';
                }
            }
        });
    }
    return false;
})
///-----------------------
///\初始化结束

///\根据user_json初始化数据
///----------------------
//普通Input输入框及按钮初始化值
$("#name").val(user_json.name);
$("#Email").val(user_json.email);
$("#address").val(user_json.address);
$("#phone").val(user_json.phone);
$("#brief").val(user_json.brief);
$("#schooling_system").val(user_json.schooling_system);
$("#campus").val(user_json.campus);
$("#" + (user_json.gender == '男' ? 'male' : 'female')).iCheck('check');

// 第二页（个人头像上传页面不显示）
$("#Page2").css('display', 'none');
///----------------------
///\结束数据初始化

///\表单验证方法
///\-----------------------------------
function Check_Ajax(action,items,value)
{
    var check_result;
    $.ajax({
        url: model_url + "/checkForm", //请求验证页面 
        type: "GET", //请求方式
        data: "action=" + action + "&" + "value" + "=" + value,
        success: function (call) {
            check_result = call;     
        }
    });
    return check_result;
}

function Checkform_name(obj){
    if (obj.val().length > 4||obj.val().length < 2) {
        $("#name").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
        $("#name-tip").html('姓名长度为2~4字');
        $("#name-tip").slideDown("fast");
    }else {
        var call = Check_Ajax("name", "name", $("#name").val());
        if(call == 'illegal')
        {
            $("#name").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#name-tip").html('名字只包含汉字');
            $("#name-tip").slideDown("fast");                  
        }else{
            $("#name").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
            $("#name-tip").slideUp("fast");               
            $("#name-tip").html("");
       }
    };
}

function Checkform_Email(){
        var call = Check_Ajax("Email", "Email", $("#Email").val());
    
        if (call == 'repeat') {
            $("#Email").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#Email-tip").html('该邮箱已被注册');
            $("#Email-tip").slideDown("fast");
        }else{
            if(call == 'illegal')
            {
                $("#Email").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
                $("#Email-tip").html('请填写正确邮箱');
                $("#Email-tip").slideDown("fast");                  
            }else{
                $("#Email").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
                $("#Email-tip").slideUp("fast");               
                $("#Email-tip").html("");
            }
        };
}

function Checkform_address(){
		var call = Check_Ajax("address", "address", $("#address").val());
            if(call == 'illegal')
            {
                $("#address").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
                $("#address-tip").html('地址最长为30个字符');
                $("#address-tip").slideDown("fast");                  
            }else{
                $("#address").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
                $("#address-tip").slideUp("fast");               
                $("#address-tip").html("");
            }
}

function Checkform_Phone(){
        var call = Check_Ajax("phone", "phone", $("#phone").val());
        if (call == 'repeat') {
            $("#phone").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#phone-tip").html('手机已被注册');
            $("#phone-tip").slideDown("fast");
        }else{
            if(call == 'illegal')
            {
                $("#phone").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
                $("#phone-tip").html('请填写正确手机号码');
                $("#phone-tip").slideDown("fast");                  
            }else{
                $("#phone").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
                $("#phone-tip").slideUp("fast");               
                $("#phone-tip").html("");
            }
        };
}

function Checkform_Brief(){
      var call = Check_Ajax("brief", "brief", $("#brief").val());
          if(call == 'illegal')
          {
              $("#brief").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
              $("#brief-tip").html('请输入100字以内简介');
              $("#brief-tip").slideDown("fast");                  
          }else{
              $("#brief").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
              $("#brief-tip").slideUp("fast");               
              $("#brief-tip").html("");
          };
}

function Checkform(obj){
    switch(obj.attr('id'))
    {
        case 'name':
            Checkform_name(obj);
            break;
        case 'Email':
            Checkform_Email();
            break;
        case 'address':
            Checkform_address();
            break;
        case 'phone':
            Checkform_Phone();
            break;
        case 'brief':
            Checkform_Brief();
            break;
        default:break;
    }
}  

function isChanged($obj){
    var script = "var init_data=user_json." + $obj.attr('name') + ";";
    eval(script);
    return init_data == $obj.val() ? false : true;
}

var isValidCheck;

$('#form_base .form-group input,textarea,select').keyup(function (ev) {
    var CheckItems = $(this);
    if (isValidCheck != undefined) {
        clearTimeout(isValidCheck);
    }
    if ($(this).val() != "" && isChanged(CheckItems)) {
        isValidCheck = setTimeout(function () { Checkform(CheckItems) }, 1000);
    }
    else {
        var tips = '#' + $(this).attr('id') + "-tip";
        $(this).removeAttr('style');
        $(tips).slideUp("fast");
        $(tips).html("");
    }
})

$('#form_base .form-group input,textarea,select').blur(function () {

    if (isValidCheck != undefined) {
        clearTimeout(isValidCheck);
    }
    var CheckItems = $(this);
    if ($(this).val() != "" && isChanged(CheckItems)) {
        Checkform(CheckItems);
    }
    else {
        var tips = '#' + $(this).attr('id') + "-tip";
        $(this).removeAttr('style');
        $(tips).slideUp("fast");
        $(tips).html("");
    }
})
///-----------------------------------
///\表单验证方法声明结束
};


