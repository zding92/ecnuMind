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
		sidePagination: 'server',
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		if (initialFlag) {
			table_filter.bootstrapTableFilter('enableFilter', 'comp_name');
			table_filter.bootstrapTableFilter('enableFilter', 'comp_date');
	
			//点击下拉选择的整体，能够选中勾选框
			$('.dropdown-menu li a :input').click(function(e){
				if($(this).prop('checked')){
					$(this).prop('checked',false);
				} else {
					$(this).prop('checked',true);
				}
			});
			
			initialFlag = false;
		}
		
		
    });
	
});

