/**
 * 此js用于管理员界面中的比赛管理
 */

function operateFormatter(value, row, index) {
    return [
        '<a class="update ml10" href="javascript:void(0)" title="修改">',
            '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
        '<a class="remove ml10" style="margin-left:12px" href="javascript:void(0)" title="删除">',
            '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
}



window.operateEvents = {
        'click .remove': function (e, value, row, index) {
        	if(confirm("确认删除吗？")){
        		var removeCompId = "removeCompId=" + row['comp_id'];
            	$.ajax({
            		url:remove_url,
            		type:"POST",
            		data:removeCompId,
            		success:function(call){
            			handleReturn(call);
            		}
            		
            	});
        	}	
        },
		'click .update': function (e, value, row, index) {
				var getCompId = "getCompId=" + row['comp_id'];
		    	$.ajax({
		    		url:"/admin/compControl/getACompInfo",
		    		type:"POST",
		    		dataType: 'json',
		    		data:getCompId,	
		    		success:function(call){
		    			call = eval('('+call+')');
		    			$("[name=comp_name]").val(call.comp_name);
		    			$("[name=comp_sponsor]").val(call.comp_sponsor);
		    			$("#comp_field").val(call.comp_field);
		    			$("#comp_importance").val(call.comp_importance);
		    			$("#compDate").val(call.comp_start_date+'-'+call.comp_end_date);
		    			$("#compApplyDate").val(call.comp_apply_start_date+'-'+call.comp_apply_end_date);
		    			$("#comp_brief").text(call.comp_brief);
		    			$("#comp_max_people").val(call.comp_max_people);
		    			$("#comp_official_website").val(call.comp_official_website);
		    			
		    			$("[name=comp_id]").val(row['comp_id']);		    			
		    			$("#addCompConfirm").html("更新");
		    			$("#myModalLabel").html("更新比赛");
		    			$('#addCompModal').modal('show');
		    			
		    		}
		    		
		    	});	
		}
    };

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
		height: 900,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		table_filter.bootstrapTableFilter('enableFilter', 'comp_field');
		table_filter.bootstrapTableFilter('enableFilter', 'apply_state');

		$table.bootstrapTable('toggleColumn', 6, false, true);
		
		//点击下拉选择的整体，能够选中勾选框
		$('.dropdown-menu li a :input').click(function(e){
			if($(this).prop('checked')){
				$(this).prop('checked',false);
			} else {
				$(this).prop('checked',true);
			}
		});
		
		if (success == 'add') alert('比赛添加成功');
		else if (success == 'update') alert('比赛更新成功');
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
		
		//if (allInputDone){
			// var dataToBack = $("#addCompForm").serialize();
			// alert(dataToBack);
			// $.ajax({
		    //     url: addCompURL, //验证页面 
		    //     type: "POST", //请求方式
		    //     data: dataToBack,
		    //     success: function (call) {
		    //         handleReturn(call);          	         
		    //     }
			// });
			// //$('#addCompModal').modal('toggle');
			// $('#comp-table').bootstrapTable('refresh',null);//刷新表格
			var val = $("#compFile").val();
			var k = '';
			
			if (val != '')
				k = val.substr(val.indexOf("."));
			else 
				k = 'no_file';
			
			if (k == '.zip' || k == '.rar' || k == 'no_file') 
				document.getElementById("addCompForm").submit();
			else 
				alert('只允许提交rar和zip文件');
//		}
//		else{
//			myAlert("请完整填写表单");
//		}
		
	});
	
	$('#btn_addComp').click(function(){		    			
		$("#addCompConfirm").html("添加比赛");
		$("#myModalLabel").html("添加新的比赛");
		document.getElementById("addCompForm").reset(); 
	});
})

function handleReturn(call) {
	switch (call) {
	case 'success':
		alert("修改成功");
		$('#btn_success').modal('hide');
		break;
	case 'removeSuccess':
		alert("删除成功");
		success = false;
		$('[data-filter-field=comp_field],[data-filter-field=apply_state]').remove();
		$('#comp-table').bootstrapTable('refresh',null);
		break;
	default:
		break;
	}
}



