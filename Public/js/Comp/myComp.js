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
        '<a class="edit ml10" href="' + row.comp_template + '" style="margin-left:20px" title="编辑" target="_blank">',
            '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
        
        '<a class="remove ml10" href="' + row.comp_view + '" style="margin-left:20px" title="打印" target="_blank">',
        '<i class="glyphicon glyphicon-print"></i>',
        '</a>',
        
        '<a class="remove ml10" href="javascript:void(0)" style="margin-left:20px" title="删除">',
            '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
}

window.operateEvents = {
    'click .remove': function (e, value, row, index) {
    	
    	
    	
        alert('You click remove icon, row: ' + JSON.stringify(row));
    }
};

$(function(){
	$table = $("#comp-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 500
	}).on('load-success.bs.table', function (e, data) {
//		table_filter.bootstrapTableFilter('enableFilter', 'comp_field');
//		table_filter.bootstrapTableFilter('enableFilter', 'apply_state');
		// 将第四列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第4列)，隐藏，更新表）
//		$table.bootstrapTable('toggleColumn', 4, false, true);
		
		//点击下拉选择的整体，能够选中勾选框
		$('.dropdown-menu li a').click(function(){
			$(this).children().click();
		});
    });
	
});

