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
		height: 500
	}).on('load-success.bs.table', function (e, data) {
		table_filter.bootstrapTableFilter('enableFilter', 'comp_field');
		table_filter.bootstrapTableFilter('enableFilter', 'apply_state');
		// 将第四列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第4列)，隐藏，更新表）
		$table.bootstrapTable('toggleColumn', 4, false, true);
		
		//点击下拉选择的整体，能够选中勾选框
		$('.dropdown-menu li a').click(function(){
			$(this).children().click();
		});
		
        $.ajax({
            url: getDataURL, //请求验证页面 
            type: "POST", //请求方式
            async: false,
            success: function (call) 
            {
//                           alert(call);
//                           //在php中会ajaxReturn一个tiaozhanDataWri变量，以此判断是否数据库写入完毕
//                           if (tiaozhanDataWri==true) alert("已成功保存");
//                           else alert("数据写入数据库失败");

            }
    });
    });
	
});

