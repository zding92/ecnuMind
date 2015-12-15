/**
 * 此js用于管理员界面中的比赛管理
 */

var checkedItemID = new Array();
var judgeAction;
var load_time = 0;

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

function operateFormatter(value, row, index) {
    return [
        '<a class="detail ml10" href="javascript:void(0)" title="详细说明">',
            '<i class="glyphicon glyphicon-list-alt"></i>',
        '</a>'
    ].join('');// 
}

window.operateEvents = {
	    'click .detail': function (e, value, row, index) {
	    	myAlert("ok!");
	    }
	};

$(function(){
	$table = $("#ability-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		if (load_time == 0) {
			table_filter.bootstrapTableFilter('enableFilter', 'field_name');
			table_filter.bootstrapTableFilter('enableFilter', 'direction_name');
			table_filter.bootstrapTableFilter('enableFilter', 'ability_status');
			load_time = 1;
		}
		
		// 将第五列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第6列)，隐藏，更新表）
		$table.bootstrapTable('toggleColumn', 6, false, true);
		//点击下拉选择的整体，能够选中勾选框
		$('.dropdown-menu li a :input').click(function(e){
			if($(this).prop('checked')){
				$(this).prop('checked',false);
			} else {
				$(this).prop('checked',true);
			}
		});
		
    }).on('check.bs.table', function (e, row) {
		checkedItemID.push(row['ability_id']);
    	//将所选行的ability_id值添加至入checkedItemID数组
    	//复选框uncheck事件响应
    }).on('uncheck.bs.table', function (e, row) {
    	for(var i = 0; i < checkedItemID.length; i++)
    		if(checkedItemID[i] == row['ability_id']){
    			checkedItemID.splice(i,1);//遍历checkedItemID数组，找到当前所选行的ability_id的值并删除，而不是将其置为null
    			break;
    		}
    }).on('check-all.bs.table', function (e) {
    	var temp = $("#ability-table").bootstrapTable('getData');
    	checkedItemID.splice(0,checkedItemID.length);
    	for (var key in temp)
        {
    		checkedItemID[key] = temp[key]["ability_id"];
        }
    }).on('uncheck-all.bs.table', function (e) {
    	checkedItemID.splice(0,checkedItemID.length);
    });
	
});

//AbilityControl.html页面btnOnClick()事件响应
function btnOnClick(id){
	switch(id){
		case 'approved':
			judgeAction = "approved";
			break;
		case 'disapproved':
			judgeAction = "disapproved";
			break;
		case 'abilityConfirm' :
			//将要传的数据置为一个字符串
			var abilityStr = "checkedItemID=" + checkedItemID + "&judgeAction=" + judgeAction;
			$.ajax({
		        url: abilityChange_url, //验证页面 
		        type: "POST", //请求方式
		        data: abilityStr,
		        success: function (call) {
		            handleReturn(call); 
		            checkedItemID.splice(0,checkedItemID.length);
		        }
			});
			
			break;
		default:
			break;	
	}
	
}

function handleReturn(call) {
	switch (call) {
	case 'success':
		myAlert("修改成功");
		$('#ability-table').bootstrapTable('refresh',null);//刷新表格
		break;
	case 'no_selected':
		myAlert("没有选中任何竞赛");
		break;
	case 'illegal':
		myAlert("非法操作");
		break;
	default:
		break;
	}
}
