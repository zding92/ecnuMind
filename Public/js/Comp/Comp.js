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
	        '<a class="edit ml10 downloadBtn" href="'+compFormUrl+row.comp_id+'/'+row.comp_file+'" style="margin-left:20px" title="下载附件" target="_blank">',
	            '<i class="glyphicon glyphicon-download-alt"></i>',
	        '</a>'
	    ].join('');
}

$(function(){
	$table = $("#comp-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		table_filter.bootstrapTableFilter('enableFilter', 'comp_field');
		table_filter.bootstrapTableFilter('enableFilter', 'apply_state');
		// 将第四列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第4列)，隐藏，更新表）
		$table.bootstrapTable('toggleColumn', 6, false, true);
		
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

