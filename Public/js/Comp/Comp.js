
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

$table = $$table = $('#comp-table').bootstrapTable();

$('.bootstrap-table').click(function(){
	var ts = $table.bootstrapTable('getThis');
	ts.searchText = '大挑';
    ts.options.pageNumber = 1;
    ts.initSearch();
    ts.updatePagination();
	ts.trigger('search','大挑');
})



