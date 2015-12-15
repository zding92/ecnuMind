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
		height: 900,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		if (initialFlag) {
			table_filter.bootstrapTableFilter('enableFilter', 'comp_name');
			table_filter.bootstrapTableFilter('enableFilter', 'comp_date');
			
			// 如果管理员是校级管理员，显示院系过滤框
			if (admin == 'all') 
				table_filter.bootstrapTableFilter('enableFilter', 'apply_academy');
			
			//点击下拉选择的整体，能够选中勾选框
			$('.dropdown-menu li a :input').click(function(e){
				if($(this).prop('checked')){
					$(this).prop('checked',false);
				} else {
					$(this).prop('checked',true);
				}
			});
			
			//筛选框点击，显示筛选条件
			$('.dropdown-menu li a').click(function(){
				//取出点击的筛选条件类型
				var filterType = $(this).parent().parent().parent().attr('data-filter-field');
				//取出点击的筛选条件
				var filterText = $(this).parent().text();
				
				//如果先前此checkbox未被checked，即要被checked
				if(!$(this).children('input').prop('checked')){
					//在于筛选条件类型同名id的显示框中，显示刚才点击的筛选内容
					$('#'+filterType).append(filterText+';');
				}
				else{
					//在于筛选条件类型同名id的显示框中，删除刚才点击的筛选内容
					var currentFilterText = $('#'+filterType).text();
					var afterFilterText = currentFilterText.replace(filterText+';','');
					$('#'+filterType).text(afterFilterText);
				}
			});
			
			initialFlag = false;
		}
		
		
    });
	
});

