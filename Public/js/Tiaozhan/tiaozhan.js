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


/**
 * 根据作品类型，显示不同的作品类型细分
 */
function Gettext() {
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
    if (val=="B1") {
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
    if (val=="B2") {
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
    if (val=="B3") {
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
	function changeToUpdateMode(update_json) {
		for (var key in update_json) {
    		switch (key) {
			case 'submit_mode':
				submitUrl = update_json.submit_mode;
				break;
			case 'comp_item_id':
				CompItemId = update_json.comp_item_id;
				break;
			default:
				break;
			}
    	}	
	};
	
	function handleReturn(call) {
		switch (call) {
		case 'access_denied':
			myAlert('您无权操作该表单');
			break;
		case 'not_in_author':
			myAlert('请您将自己的学号填入作者表当中');
			break;
		case 'not_found':
			myAlert('该报名信息未找到，请联系管理员');
			break;
		case 'updated':
			myAlert('更新成功');
			break;
		case 't_not_num':
			myAlert('导师年龄必须是数字');
			break;
		case 't_not_range':
			myAlert('导师年龄必须在20~99之间');
			break;
		case 'r_not_num':
			myAlert('推荐人年龄必须是数字');
			break;
		case 'r_not_range':
			myAlert('推荐人年龄必须在20~99之间');
			break;
		default:
			var returnJson = eval("(" + call + ")");
			if (returnJson.operation_info == 'added') {
				changeToUpdateMode(returnJson);
				myAlert('竞赛报名成功')
			}
			break;
		}
	}
	
    $(".save_button").each(function () {
        $(this).click(function () {
            data_string = '';
            step1_check();
            //判断第一作者信息是否完整
            if (auther1Ready == true){
	            if (step1_finished == 1) {
	                if ((document.getElementById("project_name").value == document.getElementById("project_name_B1").value) ||
	                    (document.getElementById("project_name").value == document.getElementById("project_name_B2").value) ||
	                    (document.getElementById("project_name").value == document.getElementById("project_name_B3").value)
	                   ) {
	                  
	                    //alert($('#tiaozhanForm').serialize());
	                    if (CompItemId == null) {
	                    	$.ajax({
	                            url: submitUrl, //请求验证页面 
	                            type: "POST", //请求方式
	                            async: false,
	                            data: $('#tiaozhanForm').serialize()+'&comp_id='+CompId,
	                            success: function (call) 
	                            {
	                            	handleReturn(call); 	                          
	                            }
	                        });	
	                    } else {
	                    	$.ajax({
	                            url: submitUrl, //请求验证页面 
	                            type: "POST", //请求方式
	                            async: false,
	                            data: $('#tiaozhanForm').serialize()+'&comp_item_id='+ CompItemId,
	                            success: function (call) 
	                            {
                            		//$('.messagePopOut').fadeIn(500);
                            		handleReturn(call);            
	                            }
	                        });
	                    }                
	                }
	                else myAlert("请检查第一步与第三步中项目名称是否一致");
	            }
	            else myAlert("请完整填写第一步报名信息");
            }
            else myAlert("请在第二步中填写第一作者信息");
        });
    });
});



//var counter=1;
var checkTask;
var initial;
$(document).ready(function () {
	$(".author_num").keyup(function() {
		if (checkTask != undefined) {
			clearTimeout(checkTask);
		}
		if ($(this).val() != "") {
			var id = $(this).attr('id');
			checkTask = setTimeout(function () { checkStuid(id) }, 1000);
		}	  
	});
	
	$(".author_num").blur(function() {
		if (checkTask != undefined || initial) {
			if (checkTask != undefined)
				clearTimeout(checkTask);
			if ($(this).val() != "") {
				checkStuid($(this).attr('id'));
			}	  
		}
	});
});

function showPerson(author, userData) {
	$('#'+ author +'_name').text(userData.name);
	$('#'+ author +'_degree').text(userData.degree);
	$('#'+ author +'_gender').text(userData.gender);
	$('#'+ author +'_grade').text(userData.grade);
	$('#'+ author +'_college').text(userData.department);
	$('#'+ author +'_major').text(userData.major);
	$('#'+ author +'_year').text(userData.year);
	$('#'+ author +'_campus').text(userData.campus);
	$('#'+ author +'_mobile').text(userData.mobile);
	$('#'+ author +'_phone').text(userData.phone);
	$('#'+ author +'_addr1').text(userData.addr1);
	$('#'+ author +'_addr2').text(userData.addr2);
	
	$('#'+ author +'_info').slideDown("fast");
}

function hidePerson(author, errorInfo) {
	$('#'+ author +'_name').text('');
	$('#'+ author +'_degree').text('');
	$('#'+ author +'_gender').text('');
	$('#'+ author +'_grade').text('');
	$('#'+ author +'_college').text('');
	$('#'+ author +'_major').text('');
	$('#'+ author +'_year').text('');
	$('#'+ author +'_campus').text('');
	$('#'+ author +'_mobile').text('');
	$('#'+ author +'_phone').text('');
	$('#'+ author +'_addr1').text('');
	$('#'+ author +'_addr2').text('');
	$('#'+ author +'_num_check').text(errorInfo);
	
	$('#'+ author +'_info').slideUp("fast");
}

//此变量代表第一作者信息是否完整
var auther1Ready = false;

function checkStuid(authorNum) {
    if ($("#"+authorNum).val().length !== 11) {
        hidePerson(authorNum.substring(0,7),'学号格式不正确');
        
        //作者信息不完整
        auther1Ready = false;
    }
    else {
    	checkTask = undefined;
    	$("#" + authorNum + "_check").text('');
    	var author = authorNum.substring(0,7);
        $.ajax({ 
        	url: checkUrl, 
        	async: false, 
        	data: 'studentid=' + $("#" + authorNum).val(), 
        	success: function (result) {
        		if (result == '0') {
        			hidePerson(author, '未找到匹配此学号的用户，请先注册');
        			
        			//作者信息不完整
        			auther1Ready = false;
        		} else {
        			
        			//第一作者信息完整
        			auther1Ready = true;
        			var userData = eval('(' + result + ')')
        			showPerson(author, userData);
        		}
        	}
        });
    }
}



$(document).ready(function (){
	//页面加载完毕后，先激活所有作者的更新
	//$('.author_num').focus();
	initial = true;
	$('.author_num').blur();
	initial = false;
})

