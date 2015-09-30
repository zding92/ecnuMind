/**
 * HistoryItem管理员界面中历史项目页面使用的js
 */
var checkedItemID = new Array();//被选中行ID
var result = new Array();
var judgeAction = new Array() ;//被点击按钮类别（填写获奖情况或审批）
var judgeActionVal =  new Array();//被点击按钮值（奖项级别或通过与否）

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
	var initialFlag = true;
	$table = $("#comp-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		if (initialFlag) {
			table_filter.bootstrapTableFilter('enableFilter', 'comp_name');
			table_filter.bootstrapTableFilter('enableFilter', 'comp_state');
			
			// 将第九列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第9列)，隐藏，更新表）
			$table.bootstrapTable('toggleColumn', 9, false, true);
			// 将第十列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第10列)，隐藏，更新表）
			$table.bootstrapTable('toggleColumn', 10, false, true);
			
			// 如果管理员是校级管理员，显示院系过滤框
			if (admin == 'all') 
				table_filter.bootstrapTableFilter('enableFilter', 'apply_department');
			
			//点击下拉选择的整体，能够选中勾选框
			$('.dropdown-menu li a :input').click(function(e){
				if($(this).prop('checked')){
					$(this).prop('checked',false);
				} else {
					$(this).prop('checked',true);
				}
			});
			
			$('.dropdown-menu li a').click(function(){
				var filterType = $(this).parent().parent().parent().attr('data-filter-field');
				var filterText = $(this).parent().text();
				//alert(filterType+'='+filterText);
				
				if(!$(this).children('input').prop('checked')){
					$('#'+filterType).append(filterText+';');
				}
				else{
					var currentFilterText = $('#'+filterType).text();
					var afterFilterText = currentFilterText.replace(filterText+';','');
					$('#'+filterType).text(afterFilterText);
				}
			});
			
			initialFlag = false;
		}
		
	}).on('check.bs.table', function (e, row) {
		checkedItemID.push(row['comp_item_id']);
    	//将所选行的comp_item_id值添加至入checkedItemID数组
    	//复选框uncheck事件响应
    }).on('uncheck.bs.table', function (e, row) {
    	for(var i = 0; i < checkedItemID.length; i++)
    		if(checkedItemID[i] == row['comp_item_id']){
    			checkedItemID.splice(i,1);//遍历checkedItemID数组，找到当前所选行的comp_item_id的值并删除，而不是将其置为null
    			break;
    		}
    });
	
	
});
//CurrentComp.html页面btnOnClick()事件响应
function btnOnClick(id){
	switch(id){
		case 'approved':
			judgeAction = "comp_state";
			judgeActionVal = "approved";
			break;
		case 'disapproved':
			judgeAction = "comp_state";
			judgeActionVal = "disapproved";
			break;
		case 'country1':
			judgeAction = "comp_prize";
			judgeActionVal = "country1";
			break;
		case 'country2':
			judgeAction = "comp_prize";
			judgeActionVal = "country2";
			break;
		case 'country3':
			judgeAction = "comp_prize";
			judgeActionVal = "country3";
			break;
		case 'city1':
			judgeAction = "comp_prize";
			judgeActionVal = "city1";
			break;
		case 'city2':
			judgeAction = "comp_prize";
			judgeActionVal = "city2";
			break;
		case 'city3':
			judgeAction = "comp_prize";
			judgeActionVal = "city3";
			break;
		case 'school1':
			judgeAction = "comp_prize";
			judgeActionVal = "school1";
			break;
		case 'school2':
			judgeAction = "comp_prize";
			judgeActionVal = "school2";
			break;
		case 'school3':
			judgeAction = "comp_prize";
			judgeActionVal = "school3";
			break;
		case 'prizeConfirm' :
		case 'judgeConfirm' :
			//result寄存器，存放要传给后台的数据。
			result[0] = checkedItemID;
			result[1] = judgeAction;
			result[2] = judgeActionVal;
			//将要传的数据置为一个字符串
			var compStr = "checkedItemID=" + result[0] + "&judgeAction=" + result[1] +"&judgeActionVal=" + result[2];
			$.ajax({
		        url: competitionChange_url, //验证页面 
		        type: "POST", //请求方式
		        data: compStr,
		        success: function (call) {
		            handleReturn(call);          	         
		        }
			});
			$('#comp-table').bootstrapTable('refresh',null);//刷新表格
			break;
		default:
			break;	
	}
	
}

function handleReturn(call) {
	switch (call) {
	case 'success':
		myAlert("修改成功");
		break;
	default:
		break;
	}
}
