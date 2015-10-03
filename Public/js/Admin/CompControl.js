/**
 * 此js用于管理员界面中的比赛管理
 */

function starSorter(a, b) {
	if (a.length > b.length) return 1;
	if (a.length < b.length) return -1;
	a = a.charAt(a.length-1);
	b = b.charAt(b.length-1);
	if (a == b) return 0;
	if (a == '★' && b == '☆') return 1;
	if (b == '★' && a == '☆') return -1;
	return 0;
}

$(function(){
	$table = $("#comp-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {	
		//点击下拉选择的整体，能够选中勾选框
		$('.dropdown-menu li a :input').click(function(e){
			if($(this).prop('checked')){
				$(this).prop('checked',false);
			} else {
				$(this).prop('checked',true);
			}
		});
    });
	
});

$(document).ready(function (){
	$('#addCompConfirm').click(function(){
		//此变量allInputDone表示所有的添加比赛的表单都已被填写
		var allInputDone = true;
		
		$("#addCompForm input").each(function(){
			//若存在input并未填写
			if ($(this).val() == '') allInputDone = false;
		});
		
		if (allInputDone){
			var dataToBack = $("#addCompForm").serialize();
			alert(dataToBack);
			$.ajax({
		        url: addCompURL, //验证页面 
		        type: "POST", //请求方式
		        data: dataToBack,
		        success: function (call) {
		            handleReturn(call);          	         
		        }
			});
			//$('#addCompModal').modal('toggle');
			$('#comp-table').bootstrapTable('refresh',null);//刷新表格
		}
		else{
			myAlert("请完整填写表单");
		}
		
	});
	
	$('#btn_addComp').click(function(){
		document.getElementById("addCompForm").reset(); 
	});
})

function handleReturn(call) {
	switch (call) {
	case 'success':
		myAlert("修改成功");
		$('#btn_success').modal('hide');
		break;
	default:
		break;
	}
}



