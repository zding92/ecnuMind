/**
 * 
 */
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

/*
 * tooltip初始化
 */
function initToolTip(){
	$('.tooltip').tooltipster({
		theme: 'tooltipster-noir'
	});
};

function operateFormatter(value, row, index) {
    return [
        '<div class="nameClickable"  style="cursor:pointer;" title="点击详细查看">',
             row.name  ,
        '</div>',
    ].join('');
}

window.operateEvents = {
    'click .nameClickable': function (e, value, row, index) {
    	
    	$('.personMainModal').slideDown('slow');
    	
    	//将点击的行的User_id传给后台
		$.ajax({
			url: '/Custom/Personalinfo/adminGetPersonInfo', //验证页面 
	        type: "GET", //请求方式
	        data: "userID=" + row['user_id'],
	        dataType: 'json',
	        success: function (personInfo) {
	        	assignPersonInfo(personInfo);        	
	        }
		})
		
		//在这里生成个人信息的数据
		getDataFromServer(row['user_id']);
    }
};

function assignPersonInfo(personInfo) {
	if (personInfo.gender=="男")
		var userGender = 'male';
	else
		var userGender = 'female';
	$('.photo').html('<img src="/Public/img/photo/'+personInfo.photo_path+'/face.png" alt="照片载入失败">');
	$('.personMainName').text(personInfo.name);
	$('.personMainGender').html('<img src="'+PUBLIC_URL+'/img/'+userGender+'.png">')
	$('.personMainMajor').html('<b>专业：</b>'+personInfo.major);
	$('.personMainStudendID').html('<b>学号：</b>'+personInfo.student_id);
	$('.personMainMail').html('<b>邮箱：</b>'+personInfo.email);
	$('.personMainPhone').html('<b>手机：</b>'+personInfo.phone);
	$('.personMainSchoolingSys').html('<b>学历：</b>'+personInfo.schooling_system);
	$('.personMainGrade').html('<b>年级：</b>'+personInfo.grade);
	$('.personMainCampus').html('<b>校区：</b>'+personInfo.campus);
	$('.personMainAddress').html('<b>地址：</b>'+personInfo.address);
}


/*
 * 请求生成饼状图和标签说明界面的数据
 */
function getDataFromServer(user_id) {
	  var no_ability = false;
	  $.ajax({
	    url: APP_URL + "/Custom/Personalmain/getMainData", //请求验证页面 
		type: "GET", //请求方式
		data: "flag=" + user_id,
	    success: function (result) {
	  
	      eval(result);
	      if (!no_ability){
	    	  $(".Chart_info").css('display', '');
	    	  $(".tips").css('display', '');
	    	  $(".detail").css('display', '');
	    	  if ($(".no_ability_text").length > 0) {
	    		  $(".no_ability_text").css('display', 'none');
	    	  }
	    	  refreshMainPanel(doughnutData, tabs);
	    	  initToolTip();
	      }

	      else {
	    	  $(".Chart_info").css('display', 'none');
	    	  $(".tips").css('display', 'none');
	    	  $(".detail").css('display', 'none');
	    	  if ($(".no_ability_text").length > 0) {
	    		  $(".no_ability_text").css('display', '');
	    	  }
	    	  else {
	    		  $(".Chart").append("<div class='no_ability_text'>此用户目前还没有添加认证能力。</div>");
	    	  }
	      }
	    }
	  });
}

/*
 * 生成能力饼图
 */
function refreshChart(doughnutData, tabs) {

	var ctx = document.getElementById("chart-area").getContext("2d");
	  myDoughnut = new Chart(ctx).Doughnut(doughnutData, { responsive: true });
	  document.getElementById("chart-area").onclick = function (evt) {
	    var activePoints = myDoughnut.getSegmentsAtEvent(evt);
	    if (typeof (activePoints[0]) !== "undefined") {
	    	// 获取当前的领域
	    	cur = activePoints[0].label;
	    	// 清除以前的显示
	    	if ($('#default').length > 0) // 判断是否有id为default的标签
	    		$('#default').remove();
	    	if ($('.tabs').length > 0)
	    		$('.tabs').remove();
	    	$(".detail").append("<div class='tabs'></div>");
	    	$(".tabs").append(tabs[cur]);
	    	//根据颜色对照表找到点击的领域方向，并使得显示的能力的background-color与对照表中一致。
	    	var text = cur.slice(0,-3);
	    	var curColor = $(".word:contains("+text+")").css("color");
	        $(" .tooltip").css("background-color",curColor);
	        
	    	$(".tabs").fadeIn(700, function(){
	    		//标签显示之后，初始化其tooltip功能
	      	  initToolTip();
	    	});
	    }
	  };
}

/*
 * 生成饼状图和标签说明界面
 */
function refreshMainPanel(doughnutData, tabs) {
	// 定义颜色 原色数组 和 高亮数组
	var color = 	['#e74c3c', '#f1c40f', '#2ecc71', '#e67e22', '#3498db', '#1abc9c', '#9b59b6', '#ecf0f1', '#34495e', '#95a5a6'];
	var highlight = ['#c0392b', '#f39c12', '#27ae60', '#d35400', '#2980b9', '#16a085', '#8e44ad', '#bdc3c7', '#2c3e50', '#7f8c8d'];
	
	// 生成UserControl.html里的div标签
	var idx = 0;
	$(".tips").html("");
	for (field_name in tabs) {
		$(".tips").append("<div class='box-word'></div>");
		$(".box-word:last").append("<div class='box' style='background:" + color[idx] + "'></div>");
		$(".box-word:last").append("<div class='word' style='color:" + color[idx] + "'>" + field_name.slice(0, -3) + "</div>");
		idx = (idx + 1) % 10;
	}
	
	// 设置细节栏默认内容
	$(".detail").empty();
	$(".detail").append("<div id='default'>请单击左侧饼图以查看能力详情</div>");

	// 生成能力饼状图
    refreshChart(doughnutData, tabs);
}

$(function(){
	var initialFlag = true;
	
	$table = $("#comp-table").bootstrapTable({
		striped: true,
		pagination: true,
		height: 600,
		pageSize: 20
	}).on('load-success.bs.table', function (e, data, row) {
		if (initialFlag) {			
			if (admin != "all") {
				$table.bootstrapTable('toggleColumn', 2, false, true);
			} else {
				table_filter.bootstrapTableFilter('enableFilter', 'academy');
			}
			table_filter.bootstrapTableFilter('enableFilter', 'department');
			table_filter.bootstrapTableFilter('enableFilter', 'major');
			// 将第八列隐藏（参数：切换列显示状态（toggleColumn）, 第N列(第4列)，隐藏，更新表）
			$table.bootstrapTable('toggleColumn', 7, false, true);
			
			//点击下拉选择的整体，能够选中勾选框
			$('.dropdown-menu li a :input').click(function(e){
				if($(this).prop('checked')){
					$(this).prop('checked',false);
				} else {
					$(this).prop('checked',true);
				}
			});
			//点击关闭，个人信息模态框滑上
			$('.personMainModal-close').click(function(){
				$('.personMainModal').slideUp('slow');
			});
			
			initialFlag = false;	
		}
    });
});

