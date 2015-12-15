var user_json;
var SchoolJSON;

function autoResize() {
	$("#Personalinfo_frame",parent.document).css("height",$("body").height() + "px");
};

$('document').ready(function(){
	$.ajax({
		url : modelUrl + "/getPersonalInfo",
		dataType: "JSON",
		success : function(result) {
			$("#load").css("display","none");
			SchoolJSON = result[0];
			user_json = result[1];
			Combobox();
			InitPersonalInfo();
		}
	})
});

function InitPersonalInfo() {
	
///\ 初始化相关事件响应函数
///---------------------
$("#checkName").click(function () {
  $("#checkName").val($("#checkName").val() == "false" ? "true" : "false");
});

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
    $("#form_base input[class!='kitjs-form-suggestselect-input'],select,textarea").each(function () {
        var Items = $(this);
        if ($(this).attr('name') == 'gender' && !$(this).parent().hasClass('checked'))
            return;
        if ($(this).attr('name') == 'hidden_privacy' && !$(this).parent().hasClass('checked'))
            return;
        if (isChanged(Items)) {
            changed = true;
        }
        submit_value = submit_value + $(this).attr('name') + "=" + $(this).val() + "&";
    })
    // 如何相对于一开始没有改变，则不提交。
    if (changed == true) {
        $.ajax({
            url: modelUrl + "/submitModify", //请求验证页面 
            type: "GET", //请求方式
            async: false,
            data: submit_value,
            success: function (call) {
                if (call == 'failed') alert('表单有误，请仔细检查后再提交！');
                else {
                    alert('修改成功！');
                    // 跳转回主页，待修改。
                    parent.location.href = homeUrl;
                    parent.location.hash = '#main';
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
//Combobox初始化值
b3.transform();
b1.formEl.name = 'academy';
b1.formEl.id = 'academy';
b1.inputEl.value = user_json.academy;
b1.formEl.value = user_json.academy;
b2.formEl.name = 'department';
b2.formEl.id = 'department';
b2.inputEl.value = user_json.department;
b2.formEl.value = user_json.department;
b3.formEl.name = 'major';
b3.formEl.id = 'major';
b3.formEl.value = user_json.major;
b3.inputEl.value = user_json.major;

//普通Input输入框及按钮初始化值
$("#name").val(user_json.name);
$("#studentid").val(user_json.student_id);
$("#Email").val(user_json.email);
$("#address").val(user_json.address);
$("#phone").val(user_json.phone);
$("#brief").val(user_json.brief);
$("#campus").val(user_json.campus);
$("#schooling_system").val(user_json.schooling_system);
$("#" + (user_json.gender == '男' ? 'male' : 'female')).iCheck('check');
$("#" + (user_json.hidden_privacy == 'S' ? 'show' : 'hide')).iCheck('check');
///----------------------
///\结束数据初始化

///\表单验证方法
///\-----------------------------------
function Check_Ajax(action,items,value)
{
    var check_result;
    $.ajax({
        url: modelUrl + "/checkForm", //请求验证页面 
        type: "GET", //请求方式
        async: false,
        data: "action=" + action + "&" + "value" + "=" + value,
        success: function (call) {
            check_result = call;     
        }
    });
    return check_result;
}

function Checkform_name(obj){

    var call = Check_Ajax("name", "name", $("#name").val());
    if(call == 'illegal')
    {
        $("#name").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
        $("#name-tip").html('名字只包含汉字或英文，长度少于20个字符');
        $("#name-tip").slideDown("fast");                  
    }else{
        $("#name").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
        $("#name-tip").slideUp("fast");               
        $("#name-tip").html("");
   }
}

function Checkform_studentid(obj){
    if (obj.val().length!=11) {
        $("#studentid").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
        $("#studentid-tip").html('请输入11位学号');
        $("#studentid-tip").slideDown("fast");
    }else {
        var call = Check_Ajax("student_id", "student_id", $("#studentid").val());
        if (call == 'repeat') {
            $("#studentid").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
            $("#studentid-tip").html('该学号已存在，如果存在他人注册的情况请联系管理员');
            $("#studentid-tip").slideDown("fast");
        }else{
            if(call == 'illegal')
            {
                $("#studentid").css({'outline-color':'#ff0000','border':'2px solid #ff0000'});
                $("#studentid-tip").html('请输入正确的学号');
                $("#studentid-tip").slideDown("fast");                  
            }else{
                $("#studentid").css({'outline-color':'#00ff00','border':'2px solid #00ff00'});
                $("#studentid-tip").slideUp("fast");               
                $("#studentid-tip").html("");
            }
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
                $("#address-tip").html('地址最长为100个字符/50个汉字');
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

Checkform_Combobox=function(){
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
        case 'studentid':
            Checkform_studentid(obj);
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
    setTimeout(function(){
    	autoResize();
    }, 500);
})
///-----------------------------------
///\表单验证方法声明结束
};


