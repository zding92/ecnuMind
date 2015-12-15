var $table;
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
        '<a class="edit ml10" href="' + row.comp_template + '" style="margin-left:20px" title="编辑/查看报名信息" target="_blank">',
            '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
        '<a class="submit ml10" href="javascript:void(0)" style="margin-left:20px" title="作品提交" target="_blank">',
        '<i class="glyphicon glyphicon-check"></i>',
        '</a>',        
        '<a class="remove ml10" href="javascript:void(0)" style="margin-left:20px" title="删除">',
            '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
}

window.operateEvents = {
    'click .remove': function (e, value, row, index) {
    	swal({ 
            title: "删除",  
            text: "您确定要删除此项报名？",  
            type: "warning", 
            showCancelButton: true, 
            closeOnConfirm: false, 
            confirmButtonText: "是的，我要删除", 
            confirmButtonColor: "#ec6c62" 
        }, function() { 
        	$.ajax({
                url: row.comp_remove, //请求验证页面 
                type: "get", //请求方式
        		data: "compItemId=" + row.comp_item_id,
                success: function (call) 
                {
                	if (call === 'deleted') {
                		swal('成功','删除成功', 'success');
                		var deleteTarget = [];
                		deleteTarget[0] = row.comp_item_id;
                		$table.bootstrapTable('remove', {
                            field: 'comp_item_id',
                            values: deleteTarget
                        });
                	} else if(call == 'can_not_remove') {
                		swal('失败','您无法删除一个已经经过审批的竞赛', 'error');
                	}
                }
            });	
        });
    },
    'click .submit': function (e, value, row, index) {
    	$.ajax({
    		url: '/Custom/MyComp/getFinalFile',
    		type: 'post',
    		data: "compItemId=" + row.comp_item_id,
    		success: function(fileName){
    			if (fileName != "empty"){
					$(".fileAlreadyExisted").text(fileName);
					$(".fileAlreadyExisted").attr("href","/Public/CompItemFinal/"+row.comp_item_id+'/'+fileName);
				} else{
					$(".fileAlreadyExisted").text("无上传文件，请在下方选择文件，并点击左边的保存按钮");
				}
    	    	$("#comp_item_id").val(row.comp_item_id);
    			$('#myModal').modal('show');
    		}
    	});
    }    
};
$(function(){
	$table = $("#comp-table").bootstrapTable({
		url: dataUrl,
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
//		table_filter.bootstrapTableFilter('enableFilter', 'comp_field');
//		table_filter.bootstrapTableFilter('enableFilter', 'apply_state');
		// 将第四列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第4列)，隐藏，更新表）
		//点击下拉选择的整体，能够选中勾选框
		$('.dropdown-menu li a').click(function(){
			$(this).children().click();
		});
		$("#submit").click(function() {
			if ($("#comp_item_id") != '') {
				var val = $("#finalFiles").val();
				var k = '';
				
				if (val != '')
					k = val.substr(val.indexOf("."));
				else 
					k = 'no_file';
				
				if (k == '.zip' || k == '.rar' || k == 'no_file') 
					$("#fileUploadForm").submit();
				else 
					swal('文件上传失败', '只允许提交rar和zip文件', 'error');
			}
			$("#comp_item_id").val('');
		});
    });
});

