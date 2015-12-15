var pIndex=1;
var isValid = true;
var canFileUpload = false;

function addParticipant() {
	$("#a"+pIndex).prev().prev().remove();
	$("#a"+pIndex).prev().width(125);
	pIndex++;
	var newPart =  "<button type='button' class='btn btn-danger btn-xs deleteParticipant' id='deleteParticipant'> " +
							"<span class='glyphicon glyphicon-minus'></span></button>" +
							"<label class='memberLabel' id='label"+ pIndex +"' for='a"+pIndex+"'>参赛队员</label>" +
						    "<input type='text' placeholder='请输入参与者学号'  name='a"+pIndex+"'  id='a"+pIndex+"'><br>";
	$(newPart).insertBefore("#newParticipant");
}

/**
 * 保存操作
 */
function saving() {
	isValid = true;
	$("#memberInfo span").each(function() {
		if ($(this).attr('class') == 'memberErr') {
			isValid = false;
		}
	})
	
	if (!isValid) {
		swal("表单有误", "请查证后再尝试", "error");
		return;
	}
	
	if (submitMode == 'add') {
		// add mode
		$.ajax({
			url: model + "/saveBaseInfo",
			type: 'post',
			data: $("#applyForm").serialize() + "&comp_id=" + $("#comp_id").val(),
			success: function(callback) {
				if (callback == 'error') swal("报名者学号有误", "请查证后再尝试", "error");
				else if (callback == 'not_in_author') swal('认证错误', '您自己（的学号）必须包含在报名者中', 'error');
				else if (callback == 'date_over') swal('认证错误', '超过报名日期，不允许提交', 'error');
				else {
					canFileUpload = true;
					
					$("#comp_item_id").val(callback.compItemID);
					submitMode = callback.submitMode;
					
					var val = $("#compApplyFile").val();
					var k = '';
					
					if (val != '')
						k = val.substr(val.indexOf("."));
					else 
						k = 'no_file';
					
					if (k == '.zip' || k == '.rar' || k == 'no_file') 
						$("#fileUploadForm").submit();
					else 
						swal('只允许提交rar和zip文件', '不过我们已经为您保存了其他的报名信息', 'warning');
				}
			}
		})
	} else {
		// update mode
		$.ajax({
			url: model + "/updateBaseInfo",
			type: 'post',
			data: $("#applyForm").serialize() + "&comp_item_id=" + $("#comp_item_id").val(),
			success: function(callback) {
				if (callback == 'error') swal("报名者学号有误", "请查证后再尝试", "error");
				else if (callback == 'not_in_author') swal('认证错误', '您自己（的学号）必须包含在报名者中', 'warning');
				else if (callback == 'date_over') swal('认证错误', '超过报名日期，不允许提交', 'error');
				else {
					canFileUpload = true;
					var val = $("#compApplyFile").val();
					var k = '';
					
					if (val != '')
						k = val.substr(val.indexOf("."));
					else 
						k = 'no_file';
					
					if (k == '.zip' || k == '.rar' || k == 'no_file') 
						$("#fileUploadForm").submit();
					else 
						swal('只允许提交rar和zip文件', '不过我们已经为您保存了其他的报名信息', 'warning');
				}
			}
		})
	}	
}

/**
 * 如果是update状态，需要将表单初始化，与服务器同步
 */
function initFormValue() {
	$.ajax({
		url: model + "/getCompItemInfo",
		type: 'get',
		data: "comp_item_id=" + $("#comp_item_id").val(),
		dataType: 'JSON',
		success: function(callback) {
			var participantIndex = 1;
			// 为了逻辑简洁，后台返回的数据顺序必须和if/else if判断的index名称顺序相同
			for (var index in callback) {
				if (index == 'comp_item_brief') {
					if (callback.comp_item_brief != '') 
						$("#b").text(callback.comp_item_brief);
				} else if (index == 'comp_item_name') {
					if (callback.comp_item_name != '') 
						$("#comp_item_name").val(callback.comp_item_name);
				} else if(index == 'comp_item_filename') {
					//如果此comp_item 存在附件文件
					if (callback.comp_item_filename != ""){
						$(".fileAlreadyExisted").text(callback.comp_item_filename);
						$(".fileAlreadyExisted").attr("href",comp_item_file_url+$("#comp_item_id").val()+'/'+callback.comp_item_filename);
					} else{
						$(".fileAlreadyExisted").text("无上传文件，请在下方选择文件，并点击左边的保存按钮");
					}
				} else if(participantIndex == 1) {
					$("#a"+participantIndex).val(callback['a'+participantIndex]);
					participantIndex++;
				} else {
					pIndex == $("#pMax").html() ? (function(){swal("", "已经达到成员数上线", "error")})() : addParticipant();
					$("#a"+participantIndex).val(callback['a'+participantIndex]);
					participantIndex++;
				}
			}
			$("#pIndex").html(pIndex);
			$("#memberInfo input").blur();
		}
	})
}

/**
 * 获取参与者信息
 */
function getParticipantInfo(input) {
	var id = input.val();
	var hasEmpty = false;
	var repeatCount = 0;
	//遍历，不允许提交重复的id
	
	$('#memberInfo input').each(function() {
		if ($(this).attr('id') == 'comp_item_name') return;
		if ($(this).val() == '') hasEmpty=true;
		if ($(this).val() == id) repeatCount++;
	})
		
	if (repeatCount > 1) {
		if (input.next().attr('class') == 'memberErr' || input.next().attr('class') == 'participantInfo')
			input.next().remove();
		$("<span class='memberErr'>请勿重复填写同一个报名者</span>").insertAfter("#"+input.attr('id'));
		return;
	}
	
	if (id == '') {
		if (input.next().attr('class') == 'memberErr' || input.next().attr('class') == 'participantInfo')
			input.next().remove();
		return;
	}
	
	$.ajax({
		url: model + "/queryStuID",
		data: "student_id=" + id,
		dataType: 'json',
		success: function(callback) {
			callback = eval("("+callback+")")
			if (callback == 'null' || callback == null) {
				if (input.next().attr('class') == 'participantInfo' || input.next().attr('class') == 'memberErr')
					input.next().remove();
				$("<span class='memberErr'>该学号未找到，请联系该同学注册本系统</span>").insertAfter("#"+input.attr('id'));
			} else {
				if (input.next().attr('class') == 'participantInfo' || input.next().attr('class') == 'memberErr')
					input.next().remove();
				$("<span class='participantInfo'>该用户是来自<span style='color: blue'>"+callback.academy+"</span>的<span style='color: red;'>"+callback.name+"</span></span>").insertAfter("#"+input.attr('id'));				
			}
		}
	})
}

/**
 *  事件初始化
 */
$(document).ready(function(){
    
    $("#tips,#saveBtn,#myNav").affix({
        offset: { 
        	top: 120 
     	}
    });
    
    if (addSuccess) swal('报名成功','您可以继续修改也可以退出该页面', 'success');
    
    if (submitMode == 'update') initFormValue();
    
    // 防止出现边框
    $("button").focus(function(e){
    	$("button").blur();
    })
    
    $("#newParticipant").click(function(){
    	pIndex == $("#pMax").html() ? (function(){swal("", "已经达到成员数上线", "error")})() : addParticipant();
    	$("#pIndex").html(pIndex);
    })
    
    $("#memberInfo").on("click", "#deleteParticipant", function() {
    	// 移除label
    	$(this).next().remove();
    	// 移除input
    	$(this).next().remove();
    	// 如果有文字，一并移除
    	if ($(this).next().attr('class') == 'memberErr'|| $(this).next().attr('class') == 'participantInfo') 
    		$(this).next().remove();
    	//　移除<br>
    	$(this).next().remove();
    	pIndex--;
    	var newPart =  "<button type='button' class='btn btn-danger btn-xs deleteParticipant' id='deleteParticipant'> " +
								"<span class='glyphicon glyphicon-minus'></span></button>";
    	$(newPart).insertBefore("#label"+pIndex);
    	if (pIndex > 1)
    		$("#a"+pIndex).prev().width(90);
    	$(this).remove();
    	$("#pIndex").html(pIndex);
    })
       
    $("#fileUploadForm").submit(function(){
    	if (!canFileUpload) return false;
    })
    
    $("#memberInfo").on("blur", "input", function() {
    	getParticipantInfo($(this));
    })
        
    $(".saveBtn").click(function() {
		saving();
    })
})