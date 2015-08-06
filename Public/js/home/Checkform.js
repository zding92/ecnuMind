var Checkform = function() {
   
function Check_Ajax(action,items,value)
{
    var check_result;
    $.ajax({
        url: model_url + "/checkForm", //请求验证页面 
        type: "GET", //请求方式
        async: false,
        data: "action=" + action + "&" + "value" + "=" + value,
        success: function (call) {
            check_result = call;     
        }
    });
    return check_result;
}

function Checkform_nick(obj){
    if (obj.val().length > 8||obj.val().length < 3) {
        $("#nickname").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
        $("#nickname-tip").html('昵称应在3个字符~8个字符之间');
        $("#nickname-tip").slideDown("fast");
    }else {
        var script = Check_Ajax("nickname", "nickname", $("#nickname").val());
        eval(script);
        if (repeat) {
            $("#nickname").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#nickname-tip").html('该昵称已存在，请重新输入');
            $("#nickname-tip").slideDown("fast");
        }else{
            if(illegal)
            {
                $("#nickname").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
                $("#nickname-tip").html('昵称中含有非法字符');
                $("#nickname-tip").slideDown("fast");                  
            }else{
                $("#nickname").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
                $("#nickname-tip").slideUp("fast");               
                $("#nickname-tip").html("");
            }
        }
    };
}

function Checkform_name(obj){
    if (obj.val().length > 4||obj.val().length < 2) {
        $("#name").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
        $("#name-tip").html('姓名长度为2~4字');
        $("#name-tip").slideDown("fast");
    }else {
        var script = Check_Ajax("name", "name", $("#name").val());
        eval(script);
        if(illegal)
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

function Checkform_ID(obj){
    if (obj.val().length!=11) {
        $("#ID").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
        $("#ID-tip").html('请输入11位学号');
        $("#ID-tip").slideDown("fast");
    }else {
        var script = Check_Ajax("ID", "ID", $("#ID").val());
        eval(script);
        if (repeat) {
            $("#ID").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#ID-tip").html('该学号已存在，如果存在他人注册的情况请联系管理员');
            $("#ID-tip").slideDown("fast");
        }else{
            if(illegal)
            {
                $("#ID").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
                $("#ID-tip").html('请输入正确的学号');
                $("#ID-tip").slideDown("fast");                  
            }else{
                $("#ID").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
                $("#ID-tip").slideUp("fast");               
                $("#ID-tip").html("");
            }
        }
    };
}

function Checkform_Email(){
        var script = Check_Ajax("Email", "Email", $("#Email").val());
        eval(script);
        if (repeat) {
            $("#Email").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#Email-tip").html('该邮箱已被注册');
            $("#Email-tip").slideDown("fast");
        }else{
            if(illegal)
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
        var script = Check_Ajax("address", "address", $("#address").val());      
        eval(script);
            if(illegal)
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
        var script = Check_Ajax("phone", "phone", $("#phone").val());
        eval(script);
        if (repeat) {
            $("#phone").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#phone-tip").html('手机已被注册');
            $("#phone-tip").slideDown("fast");
        }else{
            if(illegal)
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

Checkform_Combobox=function(){
        var script = Check_Ajax("combobox", "combobox", $("#academy").val()+'|'+$("#department").val()+'|'+$("#major").val());
        eval(script);
        switch(illegal)
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
            case false:
                $("#academy").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
                $("#department").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
                $("#major").prev().css({ 'outline-color': '#00ff00', 'border': '2px solid #00ff00' });
                $("#combobox-tip").slideUp("fast");
                $("#combobox-tip").html('');
                break;
            default: break;
        }
}

function Checkform_Brief(){
      var script = Check_Ajax("brief", "brief", $("#brief").val());
      eval(script);
          if(illegal)
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
        case 'nickname':
            Checkform_nick(obj);
            break;
        case 'name':
            Checkform_name(obj);
            break;
        case 'ID':
            Checkform_ID(obj);
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
    var script = "var init_data=init_js." + $obj.attr('name') + ";";
    
    eval(script);
    return init_data == $obj.val() ? false : true;
}

var isValidCheck;

$('#form_base .form-group input,textarea').keyup(function (ev) {
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

$('#form_base .form-group input,textarea').blur(function () {

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

$("#form_base").submit(function (ev) {
    ev.preventDefault();
    var submit_value = "";
    var changed = false;
    $("#form_base input[class!='kitjs-form-suggestselect-input'],textarea").each(function () {
        var Items = $(this);
        if ($(this).attr('name') == 'gender' && !$(this).parent().hasClass('checked'))
            return;
        if (isChanged(Items)) {
            changed = true;
        }
        submit_value = submit_value + $(this).attr('name') + "=" + $(this).val() + "&";
        
    })
    if (changed == true) {
        $.ajax({
            url: model_url + "/submitModify", //请求验证页面 
            type: "GET", //请求方式
            async: false,
            data: submit_value,
            success: function (call) {
                eval(call);
                if (!compelete) alert('表单有误，请仔细检查后再提交！');
                else {
                    alert('修改成功！');
                    location = 'LoginSuccess/' + user + '/#main';
                }
            }
        });
    }
    return false;
})
};


