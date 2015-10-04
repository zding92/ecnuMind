/**
 * 
 */

$(function(){
	$table = $("#note-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data) {
		
		// 将第十列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第1、2列)，隐藏，更新表）
		$table.bootstrapTable('toggleColumn', 1, false, true);
		$table.bootstrapTable('toggleColumn', 2, false, true);
		
		//如果当前管理员不是校级管理员，则将“收件院系”置为不可见
		if (admin == 'all') 
			document.getElementById("recipient").style.display="none";
			
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