/**
 * HistoryItem管理员界面中历史项目页面使用的js
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
			
			// 将第九列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第4列)，隐藏，更新表）
			$table.bootstrapTable('toggleColumn', 8, false, true);
			// 将第十列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第4列)，隐藏，更新表）
			$table.bootstrapTable('toggleColumn', 9, false, true);
			
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
    	alert(row['comp_item_id']);
    });
	
});

