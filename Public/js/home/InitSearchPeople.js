var $table;

$(function(){
	$table = $("#searchTable").bootstrapTable({
		url: "",
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
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

