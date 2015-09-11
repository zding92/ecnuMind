/**
 * 
 */
//鼠标经过颜色
function OverColor(obj) {
  obj.style.backgroundColor='#56cbf3';
}
//鼠标移出颜色
function Outcolor(obj){
    //如果是非选中状态
    if (obj.className == "tiaozhan_navoff")
        obj.style.backgroundColor = '#808080';
    //如果是选中的状态
    else obj.style.backgroundColor = '#2b99ce';
}

function change_type()
{
    
}

/**
 * 根据作品类型，显示不同的作品类型细分
 */
function Gettext(){
    selector = document.getElementById("type_selector");
var val=selector.options[selector.options.selectedIndex].value;
//document.getElementById("dis").innerHTML = val;
if (val=="NULL")
    {
        document.getElementById("B1").style.display = "none";
        document.getElementById("B2").style.display = "none";
        document.getElementById("B3").style.display = "none";
        document.getElementById("B1_form").style.display = "none";
        document.getElementById("B2_form").style.display = "none";
        document.getElementById("B3_form").style.display = "none";
        document.getElementById("NULL_B").style.display = "block";
        
        //仅使用B1表中的input或textarea，其他表中的禁用
//        $("B1_form:input,B1_form:textarea").each(function(){
//        	$(this).attr("disabled",false);
//        })
//        $("B2_form:input,B2_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
//        $("B3_form:input,B3_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
    }
if (val=="B1")
    {
        document.getElementById("B1").style.display = "";
        document.getElementById("B2").style.display = "none";
        document.getElementById("B3").style.display = "none";
        document.getElementById("B1_form").style.display = "block";
        document.getElementById("B2_form").style.display = "none";
        document.getElementById("B3_form").style.display = "none";
        document.getElementById("NULL_B").style.display = "none";
        
      //仅使用B1表中的input或textarea，其他表中的禁用
//        $("B1_form:input,B1_form:textarea").each(function(){
//        	$(this).attr("disabled",false);
//        })
//        $("B2_form:input,B2_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
//        $("B3_form:input,B3_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
    }
if (val=="B2")
    {
        document.getElementById("B1").style.display = "none";
        document.getElementById("B2").style.display = "";
        document.getElementById("B3").style.display = "none";
        document.getElementById("B1_form").style.display = "none";
        document.getElementById("B2_form").style.display = "block";
        document.getElementById("B3_form").style.display = "none";
        document.getElementById("NULL_B").style.display = "none";
        
      //仅使用B2表中的input或textarea，其他表中的禁用
//        $("B1_form:input,B1_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
//        $("B2_form:input,B2_form:textarea").each(function(){
//        	$(this).attr("disabled",false);
//        })
//        $("B3_form:input,B3_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
    }
if (val=="B3")
    {
        document.getElementById("B1").style.display = "none";
        document.getElementById("B2").style.display = "none";
        document.getElementById("B3").style.display = "";
        document.getElementById("B1_form").style.display = "none";
        document.getElementById("B2_form").style.display = "none";
        document.getElementById("B3_form").style.display = "block";
        document.getElementById("NULL_B").style.display = "none";
        
        //仅使用B3表中的input或textarea，其他表中的禁用
//        $("B1_form:input,B1_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
//        $("B2_form:input,B2_form:textarea").each(function(){
//        	$(this).attr("disabled",true);
//        })
//        $("B3_form:input,B3_form:textarea").each(function(){
//        	$(this).attr("disabled",false);
//        })
    }

}

function ShowStep1()
{
    document.getElementById("tiaozhan_nav1").className = "tiaozhan_navon";
    document.getElementById("tiaozhan_nav2").className = "tiaozhan_navoff";
    document.getElementById("tiaozhan_nav3").className = "tiaozhan_navoff";
    Outcolor(document.getElementById("tiaozhan_nav1"));
    Outcolor(document.getElementById("tiaozhan_nav2"));
    Outcolor(document.getElementById("tiaozhan_nav3"));
    document.getElementById("step1").style.display = "block";    
    document.getElementById("step2").style.display = "none";
    document.getElementById("step3").style.display = "none";
}

function ShowStep2()
{
    document.getElementById("tiaozhan_nav1").className = "tiaozhan_navoff";
    document.getElementById("tiaozhan_nav2").className = "tiaozhan_navon";
    document.getElementById("tiaozhan_nav3").className = "tiaozhan_navoff";
    Outcolor(document.getElementById("tiaozhan_nav1"));
    Outcolor(document.getElementById("tiaozhan_nav2"));
    Outcolor(document.getElementById("tiaozhan_nav3"));
    document.getElementById("step1").style.display = "none";    
    document.getElementById("step2").style.display = "block";
    document.getElementById("step3").style.display = "none";
}
function ShowStep3()
{
    document.getElementById("tiaozhan_nav1").className = "tiaozhan_navoff";
    document.getElementById("tiaozhan_nav2").className = "tiaozhan_navoff";
    document.getElementById("tiaozhan_nav3").className = "tiaozhan_navon";
    Outcolor(document.getElementById("tiaozhan_nav1"));
    Outcolor(document.getElementById("tiaozhan_nav2"));
    Outcolor(document.getElementById("tiaozhan_nav3"));
    document.getElementById("step1").style.display = "none";    
    document.getElementById("step2").style.display = "none";
    document.getElementById("step3").style.display = "block";
}

var ratio_value = "A1";
/**
 * 如果是个人作品，在第二步中不显示extra_partner
 * 如果是团队作品，在第二步中显示extra_partner
 * @param a 项目类型读入的值，默认为A1，个人作品
 */
function change_ratio_value(a)
{
    ratio_value = a;
    //alert(ratio_value);
    if (ratio_value=="A1") 
    {
        document.getElementById("extra_partner").style.display = "none";
    }
    if (ratio_value=="A2") 
    {
        document.getElementById("extra_partner").style.display = "block";
    }
}

var step1_finished;
function step1_check()
{
    if ((document.getElementById("project_name").value!='')
        &&
        ((document.getElementById("group_type1").value!=null)||
         (document.getElementById("group_type2").value!=null)
        )
        &&
        (document.getElementById("type_selector").value!="NULL")                  
       )
        step1_finished = 1;
    else
        step1_finished = 0;
}

var data_string;
$(document).ready(function () {
    $(".save_button").each(function () {
        $(this).click(function () {
            data_string = '';
            step1_check();
            if (step1_finished == 1) {
                if ((document.getElementById("project_name").value == document.getElementById("project_name_B1").value) ||
                    (document.getElementById("project_name").value == document.getElementById("project_name_B2").value) ||
                    (document.getElementById("project_name").value == document.getElementById("project_name_B3").value)
                   ) {
                    
                    $("input,select,textarea").each(function () {
                        if (($(this).attr("type") != "radio") && ($(this).attr("type") != "button")&&($(this).attr("type") != "checkbox"))
                            data_string = data_string + $(this).attr("id") + "=" + $(this).val() + "&";
                        else {
                            if (($(this).attr("name") == "group_type") && ($(this).attr("checked") == "checked"))
                                data_string = data_string + "group_type" + "=" + $(this).val() + "&";
                            if (($(this).attr("name") == "B_ratio") && ($(this).attr("checked") == "checked"))
                                data_string = data_string + "detailed_type" + "=" + $(this).val() + "&";
                            if (($(this).attr("class") == "B2_type_check"))
                                data_string = data_string + $(this).attr("id") + "=" + Boolean($(this).attr("checked")) + "&";                   
                            if (($(this).attr("class") == "B3_type_check"))
                               data_string = data_string + $(this).attr("id") + "=" + Boolean($(this).attr("checked")) + "&";
                            }

                    });

//                    $.ajax({
//                        url: TiaozhanAddDataURL, //请求验证页面 
//                        type: "POST", //请求方式
//                        async: false,
//                        data: $('#tiaozhanForm').serialize()+'&comp_id='+CompId,
//                        success: function (call) 
//                        {
////                                 alert(call);
////                                 //在php中会ajaxReturn一个tiaozhanDataWri变量，以此判断是否数据库写入完毕
////                                 if (tiaozhanDataWri==true) alert("已成功保存");
////                                 else alert("数据写入数据库失败");
//
//                        }
//                    });
                }
                else alert("请检查第一步与第三步中项目名称是否一致");
            }
            else alert("请完整填写第一步报名信息");
            //alert(data_string);
        });
    });
});

//var counter=1;
var myTimer;
$(document).ready(function () {
    $("#author1_num").focus(function () {
        myTimer = setInterval(function () { Timer1_fun() }, 1000);
    });
    $("#author1_num").blur(function () {
        clearInterval(myTimer);
        Timer1_fun();
    });
    $("#author2_num").focus(function () {
        myTimer = setInterval(function () { Timer2_fun() }, 1000);
    });
    $("#author2_num").blur(function () {
        clearInterval(myTimer);
        Timer2_fun();
    });
    $("#author3_num").focus(function () {
        myTimer = setInterval(function () { Timer3_fun() }, 1000);
    });
    $("#author3_num").blur(function () {
        clearInterval(myTimer);
        Timer3_fun();
    });
    $("#author4_num").focus(function () {
        myTimer = setInterval(function () { Timer4_fun() }, 1000);
    });
    $("#author4_num").blur(function () {
        clearInterval(myTimer);
        Timer4_fun();
    });
    $("#author5_num").focus(function () {
        myTimer = setInterval(function () { Timer5_fun() }, 1000);
    });
    $("#author5_num").blur(function () {
        clearInterval(myTimer);
        Timer5_fun();
    });
    $("#author6_num").focus(function () {
        myTimer = setInterval(function () { Timer6_fun() }, 1000);
    });
    $("#author6_num").blur(function () {
        clearInterval(myTimer);
        Timer6_fun();
    });
});

function Timer1_fun() {
    if (document.getElementById("author1_num").value.length != 11) {
        document.getElementById("author1_num_check").innerHTML = "输入正确格式学号";
        $("#author1_info").slideUp("slow");
        document.getElementById("author1_name").innerHTML = '';
        document.getElementById("author1_gender").innerHTML = '';
        document.getElementById("author1_degree").innerHTML = '';
        document.getElementById("author1_grade").innerHTML = '';
        document.getElementById("author1_college").innerHTML = '';
        document.getElementById("author1_major").innerHTML = '';
        document.getElementById("author1_year").innerHTML = '';
        document.getElementById("author1_campus").innerHTML = '';
        document.getElementById("author1_mobile").innerHTML = '';
        document.getElementById("author1_phone").innerHTML = '';
        document.getElementById("author1_addr1").innerHTML = '';
        document.getElementById("author1_addr2").innerHTML = '';
    }
    else {
        document.getElementById("author1_num_check").innerHTML = '';
        $.ajax({ url: tiaozhanJSON, async: false, success: function (result) {
            var find = 0;
            eval(result);
            for (var i = 0; i < json_string.length; i++)
                if (json_string[i].no == document.getElementById("author1_num").value) {
                    find = 1;
                    var name = json_string[i].name;
                    var gender = json_string[i].gender;
                    var degree = json_string[i].degree;
                    var grade = json_string[i].grade;
                    var college = json_string[i].college;
                    var major = json_string[i].major;
                    var year = json_string[i].year;
                    var campus = json_string[i].campus;
                    var mobile = json_string[i].mobile;
                    var phone = json_string[i].phone;
                    var addr1 = json_string[i].addr1;
                    var addr2 = json_string[i].addr2;
                }
            if (find == 1) {
                document.getElementById("author1_name").innerHTML = name;
                document.getElementById("author1_gender").innerHTML = gender;
                document.getElementById("author1_degree").innerHTML = degree;
                document.getElementById("author1_grade").innerHTML = grade;
                document.getElementById("author1_college").innerHTML = college;
                document.getElementById("author1_major").innerHTML = major;
                document.getElementById("author1_year").innerHTML = year;
                document.getElementById("author1_campus").innerHTML = campus;
                document.getElementById("author1_mobile").innerHTML = mobile;
                document.getElementById("author1_phone").innerHTML = phone;
                document.getElementById("author1_addr1").innerHTML = addr1;
                document.getElementById("author1_addr2").innerHTML = addr2;
                $("#author1_info").slideDown("fast");
                find = 0;
            }
            else {
                $("#author1_info").slideUp("slow");
                document.getElementById("author1_name").innerHTML = '';
                document.getElementById("author1_gender").innerHTML = '';
                document.getElementById("author1_degree").innerHTML = '';
                document.getElementById("author1_grade").innerHTML = '';
                document.getElementById("author1_college").innerHTML = '';
                document.getElementById("author1_major").innerHTML = '';
                document.getElementById("author1_year").innerHTML = '';
                document.getElementById("author1_campus").innerHTML = '';
                document.getElementById("author1_mobile").innerHTML = '';
                document.getElementById("author1_phone").innerHTML = '';
                document.getElementById("author1_addr1").innerHTML = '';
                document.getElementById("author1_addr2").innerHTML = '';
                document.getElementById("author1_num_check").innerHTML = "未找到匹配此学号的用户，请先注册";
            }
        }
        });
    }
}
function Timer2_fun() {
    if (document.getElementById("author2_num").value.length != 11) {
        document.getElementById("author2_num_check").innerHTML = "输入正确格式学号";
        $("#author2_info").slideUp("slow");
        document.getElementById("author2_name").innerHTML = '';
        document.getElementById("author2_gender").innerHTML = '';
        document.getElementById("author2_degree").innerHTML = '';
        document.getElementById("author2_grade").innerHTML = '';
        document.getElementById("author2_college").innerHTML = '';
        document.getElementById("author2_major").innerHTML = '';
        document.getElementById("author2_year").innerHTML = '';
        document.getElementById("author2_campus").innerHTML = '';
        document.getElementById("author2_mobile").innerHTML = '';
        document.getElementById("author2_phone").innerHTML = '';
        document.getElementById("author2_addr1").innerHTML = '';
        document.getElementById("author2_addr2").innerHTML = '';
    }
    else {
        document.getElementById("author2_num_check").innerHTML = '';
        $.ajax({ url: tiaozhanJSON, async: false, success: function (result) {
            var find = 0;
            eval(result);
            for (var i = 0; i < json_string.length; i++)
                if (json_string[i].no == document.getElementById("author2_num").value) {
                    find = 1;
                    var name = json_string[i].name;
                    var gender = json_string[i].gender;
                    var degree = json_string[i].degree;
                    var grade = json_string[i].grade;
                    var college = json_string[i].college;
                    var major = json_string[i].major;
                    var year = json_string[i].year;
                    var campus = json_string[i].campus;
                    var mobile = json_string[i].mobile;
                    var phone = json_string[i].phone;
                    var addr1 = json_string[i].addr1;
                    var addr2 = json_string[i].addr2;
                }
            if (find == 1) {
                document.getElementById("author2_name").innerHTML = name;
                document.getElementById("author2_gender").innerHTML = gender;
                document.getElementById("author2_degree").innerHTML = degree;
                document.getElementById("author2_grade").innerHTML = grade;
                document.getElementById("author2_college").innerHTML = college;
                document.getElementById("author2_major").innerHTML = major;
                document.getElementById("author2_year").innerHTML = year;
                document.getElementById("author2_campus").innerHTML = campus;
                document.getElementById("author2_mobile").innerHTML = mobile;
                document.getElementById("author2_phone").innerHTML = phone;
                document.getElementById("author2_addr1").innerHTML = addr1;
                document.getElementById("author2_addr2").innerHTML = addr2;
                $("#author2_info").slideDown("fast");
                find = 0;
            }
            else {
                $("#author2_info").slideUp("slow");
                document.getElementById("author2_name").innerHTML = '';
                document.getElementById("author2_gender").innerHTML = '';
                document.getElementById("author2_degree").innerHTML = '';
                document.getElementById("author2_grade").innerHTML = '';
                document.getElementById("author2_college").innerHTML = '';
                document.getElementById("author2_major").innerHTML = '';
                document.getElementById("author2_year").innerHTML = '';
                document.getElementById("author2_campus").innerHTML = '';
                document.getElementById("author2_mobile").innerHTML = '';
                document.getElementById("author2_phone").innerHTML = '';
                document.getElementById("author2_addr1").innerHTML = '';
                document.getElementById("author2_addr2").innerHTML = '';
                document.getElementById("author2_num_check").innerHTML = "未找到匹配此学号的用户，请先注册";
            }
        }
        });
    }
}
function Timer3_fun() {
    if (document.getElementById("author3_num").value.length != 11) {
        document.getElementById("author3_num_check").innerHTML = "输入正确格式学号";
        $("#author3_info").slideUp("slow");
        document.getElementById("author3_name").innerHTML = '';
        document.getElementById("author3_gender").innerHTML = '';
        document.getElementById("author3_degree").innerHTML = '';
        document.getElementById("author3_grade").innerHTML = '';
        document.getElementById("author3_college").innerHTML = '';
        document.getElementById("author3_major").innerHTML = '';
        document.getElementById("author3_year").innerHTML = '';
        document.getElementById("author3_campus").innerHTML = '';
        document.getElementById("author3_mobile").innerHTML = '';
        document.getElementById("author3_phone").innerHTML = '';
        document.getElementById("author3_addr1").innerHTML = '';
        document.getElementById("author3_addr2").innerHTML = '';
    }
    else {
        document.getElementById("author3_num_check").innerHTML = '';
        $.ajax({ url: tiaozhanJSON, async: false, success: function (result) {
            var find = 0;
            eval(result);
            for (var i = 0; i < json_string.length; i++)
                if (json_string[i].no == document.getElementById("author3_num").value) {
                    find = 1;
                    var name = json_string[i].name;
                    var gender = json_string[i].gender;
                    var degree = json_string[i].degree;
                    var grade = json_string[i].grade;
                    var college = json_string[i].college;
                    var major = json_string[i].major;
                    var year = json_string[i].year;
                    var campus = json_string[i].campus;
                    var mobile = json_string[i].mobile;
                    var phone = json_string[i].phone;
                    var addr1 = json_string[i].addr1;
                    var addr2 = json_string[i].addr2;
                }
            if (find == 1) {
                document.getElementById("author3_name").innerHTML = name;
                document.getElementById("author3_gender").innerHTML = gender;
                document.getElementById("author3_degree").innerHTML = degree;
                document.getElementById("author3_grade").innerHTML = grade;
                document.getElementById("author3_college").innerHTML = college;
                document.getElementById("author3_major").innerHTML = major;
                document.getElementById("author3_year").innerHTML = year;
                document.getElementById("author3_campus").innerHTML = campus;
                document.getElementById("author3_mobile").innerHTML = mobile;
                document.getElementById("author3_phone").innerHTML = phone;
                document.getElementById("author3_addr1").innerHTML = addr1;
                document.getElementById("author3_addr2").innerHTML = addr2;
                $("#author3_info").slideDown("fast");
                find = 0;
            }
            else {
                $("#author3_info").slideUp("slow");
                document.getElementById("author3_name").innerHTML = '';
                document.getElementById("author3_gender").innerHTML = '';
                document.getElementById("author3_degree").innerHTML = '';
                document.getElementById("author3_grade").innerHTML = '';
                document.getElementById("author3_college").innerHTML = '';
                document.getElementById("author3_major").innerHTML = '';
                document.getElementById("author3_year").innerHTML = '';
                document.getElementById("author3_campus").innerHTML = '';
                document.getElementById("author3_mobile").innerHTML = '';
                document.getElementById("author3_phone").innerHTML = '';
                document.getElementById("author3_addr1").innerHTML = '';
                document.getElementById("author3_addr2").innerHTML = '';
                document.getElementById("author3_num_check").innerHTML = "未找到匹配此学号的用户，请先注册";
            }
        }
        });
    }
}
function Timer4_fun() {
    if (document.getElementById("author4_num").value.length != 11) {
        document.getElementById("author4_num_check").innerHTML = "输入正确格式学号";
        $("#author4_info").slideUp("slow");
        document.getElementById("author4_name").innerHTML = '';
        document.getElementById("author4_gender").innerHTML = '';
        document.getElementById("author4_degree").innerHTML = '';
        document.getElementById("author4_grade").innerHTML = '';
        document.getElementById("author4_college").innerHTML = '';
        document.getElementById("author4_major").innerHTML = '';
        document.getElementById("author4_year").innerHTML = '';
        document.getElementById("author4_campus").innerHTML = '';
        document.getElementById("author4_mobile").innerHTML = '';
        document.getElementById("author4_phone").innerHTML = '';
        document.getElementById("author4_addr1").innerHTML = '';
        document.getElementById("author4_addr2").innerHTML = '';
    }
    else {
        document.getElementById("author4_num_check").innerHTML = '';
        $.ajax({ url: tiaozhanJSON, async: false, success: function (result) {
            var find = 0;
            eval(result);
            for (var i = 0; i < json_string.length; i++)
                if (json_string[i].no == document.getElementById("author4_num").value) {
                    find = 1;
                    var name = json_string[i].name;
                    var gender = json_string[i].gender;
                    var degree = json_string[i].degree;
                    var grade = json_string[i].grade;
                    var college = json_string[i].college;
                    var major = json_string[i].major;
                    var year = json_string[i].year;
                    var campus = json_string[i].campus;
                    var mobile = json_string[i].mobile;
                    var phone = json_string[i].phone;
                    var addr1 = json_string[i].addr1;
                    var addr2 = json_string[i].addr2;
                }
            if (find == 1) {
                document.getElementById("author4_name").innerHTML = name;
                document.getElementById("author4_gender").innerHTML = gender;
                document.getElementById("author4_degree").innerHTML = degree;
                document.getElementById("author4_grade").innerHTML = grade;
                document.getElementById("author4_college").innerHTML = college;
                document.getElementById("author4_major").innerHTML = major;
                document.getElementById("author4_year").innerHTML = year;
                document.getElementById("author4_campus").innerHTML = campus;
                document.getElementById("author4_mobile").innerHTML = mobile;
                document.getElementById("author4_phone").innerHTML = phone;
                document.getElementById("author4_addr1").innerHTML = addr1;
                document.getElementById("author4_addr2").innerHTML = addr2;
                $("#author4_info").slideDown("fast");
                find = 0;
            }
            else {
                $("#author4_info").slideUp("slow");
                document.getElementById("author4_name").innerHTML = '';
                document.getElementById("author4_gender").innerHTML = '';
                document.getElementById("author4_degree").innerHTML = '';
                document.getElementById("author4_grade").innerHTML = '';
                document.getElementById("author4_college").innerHTML = '';
                document.getElementById("author4_major").innerHTML = '';
                document.getElementById("author4_year").innerHTML = '';
                document.getElementById("author4_campus").innerHTML = '';
                document.getElementById("author4_mobile").innerHTML = '';
                document.getElementById("author4_phone").innerHTML = '';
                document.getElementById("author4_addr1").innerHTML = '';
                document.getElementById("author4_addr2").innerHTML = '';
                document.getElementById("author4_num_check").innerHTML = "未找到匹配此学号的用户，请先注册";
            }
        }
        });
    }
}
function Timer5_fun() {
    if (document.getElementById("author5_num").value.length != 11) {
        document.getElementById("author5_num_check").innerHTML = "输入正确格式学号";
        $("#author5_info").slideUp("slow");
        document.getElementById("author5_name").innerHTML = '';
        document.getElementById("author5_gender").innerHTML = '';
        document.getElementById("author5_degree").innerHTML = '';
        document.getElementById("author5_grade").innerHTML = '';
        document.getElementById("author5_college").innerHTML = '';
        document.getElementById("author5_major").innerHTML = '';
        document.getElementById("author5_year").innerHTML = '';
        document.getElementById("author5_campus").innerHTML = '';
        document.getElementById("author5_mobile").innerHTML = '';
        document.getElementById("author5_phone").innerHTML = '';
        document.getElementById("author5_addr1").innerHTML = '';
        document.getElementById("author5_addr2").innerHTML = '';
    }
    else {
        document.getElementById("author5_num_check").innerHTML = '';
        $.ajax({ url: tiaozhanJSON, async: false, success: function (result) {
            var find = 0;
            eval(result);
            for (var i = 0; i < json_string.length; i++)
                if (json_string[i].no == document.getElementById("author5_num").value) {
                    find = 1;
                    var name = json_string[i].name;
                    var gender = json_string[i].gender;
                    var degree = json_string[i].degree;
                    var grade = json_string[i].grade;
                    var college = json_string[i].college;
                    var major = json_string[i].major;
                    var year = json_string[i].year;
                    var campus = json_string[i].campus;
                    var mobile = json_string[i].mobile;
                    var phone = json_string[i].phone;
                    var addr1 = json_string[i].addr1;
                    var addr2 = json_string[i].addr2;
                }
            if (find == 1) {
                document.getElementById("author5_name").innerHTML = name;
                document.getElementById("author5_gender").innerHTML = gender;
                document.getElementById("author5_degree").innerHTML = degree;
                document.getElementById("author5_grade").innerHTML = grade;
                document.getElementById("author5_college").innerHTML = college;
                document.getElementById("author5_major").innerHTML = major;
                document.getElementById("author5_year").innerHTML = year;
                document.getElementById("author5_campus").innerHTML = campus;
                document.getElementById("author5_mobile").innerHTML = mobile;
                document.getElementById("author5_phone").innerHTML = phone;
                document.getElementById("author5_addr1").innerHTML = addr1;
                document.getElementById("author5_addr2").innerHTML = addr2;
                $("#author5_info").slideDown("fast");
                find = 0;
            }
            else {
                $("#author5_info").slideUp("slow");
                document.getElementById("author5_name").innerHTML = '';
                document.getElementById("author5_gender").innerHTML = '';
                document.getElementById("author5_degree").innerHTML = '';
                document.getElementById("author5_grade").innerHTML = '';
                document.getElementById("author5_college").innerHTML = '';
                document.getElementById("author5_major").innerHTML = '';
                document.getElementById("author5_year").innerHTML = '';
                document.getElementById("author5_campus").innerHTML = '';
                document.getElementById("author5_mobile").innerHTML = '';
                document.getElementById("author5_phone").innerHTML = '';
                document.getElementById("author5_addr1").innerHTML = '';
                document.getElementById("author5_addr2").innerHTML = '';
                document.getElementById("author5_num_check").innerHTML = "未找到匹配此学号的用户，请先注册";
            }
        }
        });
    }
}
function Timer6_fun() {
    if (document.getElementById("author6_num").value.length != 11) {
        document.getElementById("author6_num_check").innerHTML = "输入正确格式学号";
        $("#author6_info").slideUp("slow");
        document.getElementById("author6_name").innerHTML = '';
        document.getElementById("author6_gender").innerHTML = '';
        document.getElementById("author6_degree").innerHTML = '';
        document.getElementById("author6_grade").innerHTML = '';
        document.getElementById("author6_college").innerHTML = '';
        document.getElementById("author6_major").innerHTML = '';
        document.getElementById("author6_year").innerHTML = '';
        document.getElementById("author6_campus").innerHTML = '';
        document.getElementById("author6_mobile").innerHTML = '';
        document.getElementById("author6_phone").innerHTML = '';
        document.getElementById("author6_addr1").innerHTML = '';
        document.getElementById("author6_addr2").innerHTML = '';
    }
    else {
        document.getElementById("author6_num_check").innerHTML = '';
        $.ajax({ url: tiaozhanJSON, async: false, success: function (result) {
            var find = 0;
            eval(result);
            for (var i = 0; i < json_string.length; i++)
                if (json_string[i].no == document.getElementById("author6_num").value) {
                    find = 1;
                    var name = json_string[i].name;
                    var gender = json_string[i].gender;
                    var degree = json_string[i].degree;
                    var grade = json_string[i].grade;
                    var college = json_string[i].college;
                    var major = json_string[i].major;
                    var year = json_string[i].year;
                    var campus = json_string[i].campus;
                    var mobile = json_string[i].mobile;
                    var phone = json_string[i].phone;
                    var addr1 = json_string[i].addr1;
                    var addr2 = json_string[i].addr2;
                }
            if (find == 1) {
                document.getElementById("author6_name").innerHTML = name;
                document.getElementById("author6_gender").innerHTML = gender;
                document.getElementById("author6_degree").innerHTML = degree;
                document.getElementById("author6_grade").innerHTML = grade;
                document.getElementById("author6_college").innerHTML = college;
                document.getElementById("author6_major").innerHTML = major;
                document.getElementById("author6_year").innerHTML = year;
                document.getElementById("author6_campus").innerHTML = campus;
                document.getElementById("author6_mobile").innerHTML = mobile;
                document.getElementById("author6_phone").innerHTML = phone;
                document.getElementById("author6_addr1").innerHTML = addr1;
                document.getElementById("author6_addr2").innerHTML = addr2;
                $("#author6_info").slideDown("fast");
                find = 0;
            }
            else {
                $("#author6_info").slideUp("slow");
                document.getElementById("author6_name").innerHTML = '';
                document.getElementById("author6_gender").innerHTML = '';
                document.getElementById("author6_degree").innerHTML = '';
                document.getElementById("author6_grade").innerHTML = '';
                document.getElementById("author6_college").innerHTML = '';
                document.getElementById("author6_major").innerHTML = '';
                document.getElementById("author6_year").innerHTML = '';
                document.getElementById("author6_campus").innerHTML = '';
                document.getElementById("author6_mobile").innerHTML = '';
                document.getElementById("author6_phone").innerHTML = '';
                document.getElementById("author6_addr1").innerHTML = '';
                document.getElementById("author6_addr2").innerHTML = '';
                document.getElementById("author6_num_check").innerHTML = "未找到匹配此学号的用户，请先注册";
            }
        }
        });
    }
}

