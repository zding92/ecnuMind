/**
 * 
 */
var btn_noteConfirm = document.getElementById('noteConfirm');//模态框确认发送按钮
var note_title_input = document.getElementById('admin_note_title');//标题栏输入框
var note_detail_input = document.getElementById('admin_note_detail');//内容栏输入框
var recipient = new Array();//存放收件院系索引
var selectedAcademy = new Array();
var tempSelected;
var academy_number;
$(function(){
	var initialFlag = true;
	//如果当前管理员不是校级管理员，则将“收件院系”置为不可见
	if (admin != 'all') 
		document.getElementById('recipient').style.display="none";
	else
		document.getElementById('recipient').style.display="inherit";
	$table = $("#note-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 800,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		
		// 将第1、2列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第1、2列)，隐藏，更新表）
		$table.bootstrapTable('toggleColumn', 0, false, true);
		$table.bootstrapTable('toggleColumn', 1, false, true);
		
    });
	
	$table_academy = $("#recipient-table").bootstrapTable({
		striped: true,
		height: 300,
		pageSize: 50
	}).on('load-success.bs.table', function (e, data) {
		if(initialFlag){
			table_filter.bootstrapTableFilter('enableFilter', 'name');

			// 将第3列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第3列)，隐藏，更新表）
			$table_academy.bootstrapTable('toggleColumn', 2, false, true);
			
			//点击下拉选择的整体，能够选中勾选框
			$('.dropdown-menu li a :input').click(function(e){
				if($(this).prop('checked')){
					$(this).prop('checked',false);
				} else {
					$(this).prop('checked',true);
				}
			});
		}
		initialFlag = false;
		
		
    }).on('check.bs.table', function (e, row) {
    	onCheck(row);
    }).on('uncheck.bs.table', function (e, row) {
    	onUncheck(row);
    }).on('check-all.bs.table', function (e) {
    	onCheckAll();
    }).on('uncheck-all.bs.table', function (e) {
    	onUncheckAll();
    });
	
});
$.ajax({
    url: "academyNum", //后台交互页面 
    type: "POST", //请求方式
    dataType: "JSON",
    success: function (num) {
    	academy_number = num;
    }
});

function onCheck(row){
	recipient.push(row['academy_id']);
	selectedAcademy.push(row['name']);
}
function onUncheck(row){
	for(var i = 0; i < recipient.length; i++){
		if(recipient[i] == row['academy_id']){
			recipient.splice(i,1);//遍历recipient数组，找到当前所选行的academy_id的值并删除，而不是将其置为null
		}
		if(selectedAcademy[i] == row['name'])
			selectedAcademy.splice(i,1);
	}
		
}
function onCheckAll(){
	recipient.splice(0,recipient.length);
	selectedAcademy.splice(0,selectedAcademy.length);
	for(var i = 1;i < academy_number;i ++){
		recipient.push(i);
	}
	var temp = $("#recipient-table").bootstrapTable('getData');
	for (var key in temp)
    {
		selectedAcademy[key] = temp[key]["name"];
    }

}
function onUncheckAll(){
	recipient.splice(0,recipient.length);
	selectedAcademy.splice(0,selectedAcademy.length);
}
function btnOnclick(id){
	
	switch(id){
		case 'recipient_close':
			recipient.splice(0,recipient.length);
			break;
		case 'recipientConfirm':
			$("#academySelected").text(selectedAcademy.toString());
			break;
		case 'noteConfirm':
			if(recipient.length == 0 && admin == 'all'){
				myAlert("请选择收件院系!");
				$('#recipient-table').bootstrapTable('refresh',null);//刷新表格
				note_title_input.value = "";
				note_detail_input.value = "";
				break;
			}
			if(recipient.length == academy_number - 1){
				recipient.splice(0,recipient.length);
				recipient.push(0);
			}
			
			var noteStr = "note_academy=" + recipient + "&note_title=" + note_title_input.value +"&note_detail=" + note_detail_input.value;
			$.ajax({
		        url: notification_url, //后台交互页面 
		        type: "POST", //请求方式
		        data: noteStr,
		        success: function (call) {
		            handleReturn(call); 
		            recipient.splice(0,recipient.length);
		        }
			});
			break;
			default:break;
	}
	
}

function removeFormatter(value, row, index) {
    return [
        '<a class="remove ml10" href="javascript:void(0)" title="删除">',
            '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
}

function detailFormatter(value, row, index) {
    return [
            '<label class="detail" data-toggle="modal" data-target="#detailModal" style="cursor:pointer">',
            '点击查看',
            '</label>'
    ].join('');
}

window.removeEvents = {
        'click .remove': function (e, value, row, index) {
        	if(confirm("确认删除吗？")){
        		var removeNoteId = "removeNoteId= " + row['note_id'];
            	$.ajax({
            		url:remove_url,
            		type:"POST",
            		data:removeNoteId,
            		success:function(call){
            			handleReturn(call);
            		}
            		
            	});
        	}	
        }
    };

window.detailEvents = {
        'click .detail': function (e, value, row, index) {
        	document.getElementById('detailShowContent').innerHTML = row['note_detail'];
        }
    };

function handleReturn(call) {
	switch (call) {
	case 'success':
		myAlert("发送成功");
		$('#note-table').bootstrapTable('refresh',null);
		$('#recipient-table').bootstrapTable('refresh',null);//刷新表格
		$('#academySelected').html("");
		note_title_input.value = "";
		note_detail_input.value = "";
		break;
	case 'removeSuccess':
		myAlert("删除成功");
		$('#note-table').bootstrapTable('refresh',null);
		break;
	case 'removeFail':
		myAlert("您无权删除");
	default:
		break;
	}
}