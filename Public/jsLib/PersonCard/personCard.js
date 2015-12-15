/**
 * 搜人界面名片库
 */
// 定义颜色 原色数组 和 高亮数组
var color = 	['#e74c3c', '#f1c40f', '#2ecc71', '#e67e22', '#3498db', '#1abc9c', '#9b59b6', '#ecf0f1', '#34495e', '#95a5a6'];
var highlight = ['#c0392b', '#f39c12', '#27ae60', '#d35400', '#2980b9', '#16a085', '#8e44ad', '#bdc3c7', '#2c3e50', '#7f8c8d'];
	
	
var PersonCardView = {
	container: null,
	curRow: 0,
	
	init: function(containerID) {
		container = $("#"+containerID);
		curRow = 0;
	},
	refresh: function() {
		curRow = 0;
	},
    initTooltip: function() {
		$("#row"+ curRow +" .glyphicon").tooltipster({
			theme: 'tooltipster-noir',
			position: 'right'
		});
	},
	newCard: function(personInfo) {
		if ($("#row"+curRow).length == 0) {
			container.append("<div class='row' id='row"+ curRow +"'></div>");
		} 
		
		if (personInfo.gender == "男") 
			var genderImg = public_url+"/img/male.png";
		else if (personInfo.gender == "女") 
			var genderImg = public_url+"/img/female.png";
		else
			var genderImg = "";
		
		$("#row"+curRow).append("<div class='col-md-12' style='padding-bottom:20px'>\
					   				     		       <div class='tableBackground1st'>\
						   				   	               <div class='tableBackground2ed'>\
						   				   	                   <i class='glyphicon glyphicon-plus' title='点此查看该用户微信二维码'></i> \
						   				   	                   <i class='glyphicon glyphicon-envelope' id='Notification" + curRow + "' data-toggle='modal' data-target='#noteModal' title='向该用户发送站内消息'></i> \
						   				   	               </div> \
						   				   	               <div class='tableBackgroundRight'>\
							                                   <div class='tableHead'>\
							   				   		               <div class='tableHeadImage'>\
									                                   <img alt='' src='"+public_url+"/img/photo/"+personInfo.photo_path+"/face.png'>\
								                                   </div>\
													               <div class='tableHeadName'>\
													               		<p style='display: inline-block;'>"+personInfo.name+"</p>\
															            <div class='tableHeadGender'>\
														               	    <img alt='' src='"+genderImg+"'>\
														                </div>\
													               </div>\
													               <div class='tableHeadBrief'>"+(personInfo.brief==null?"该用户很懒，没有个人简介":personInfo.brief)+"</div>\"\
													           </div>\
													           <div class='detailContentTitle'>\
													               <p>基本信息</p>\
													           </div>\
													           <div class='detailContent'>\
									                               <p>学院：<span>" + personInfo.academy + "</span></p>\
													               <p>系别：<span>" + personInfo.department + "</span></p>\
									                               <p>专业：<span>" + personInfo.major + "</span></p>\
													               <p>学制：<span>" + personInfo.schooling_system + "</span></p>\
													               <p>年级：<span>" + personInfo.grade + "</span></p>\
													           </div>\
													           <div class='contactContentTitle'>\
													               <p>联系方式</p>\
													           </div>\
													           <div class='contactContent'>\
									                               <p>电话：<span>" + personInfo.phone + "</span></p>\
									                               <p>地址：<span>" + personInfo.address + "</span></p>\
													               <p>邮箱：<span>" + personInfo.email + "</span></p>\
														       </div>\
													           <div class='usrAbilityContainer'>\
														           	<div class='abilityColorTable' id='abilityColorTable" + personInfo.user_id + "'>\
														           	</div>\
														           	<div class='abilityDetail' id='abilityDetail" + personInfo.user_id + "'>\
														           	</div>\
                                                               </div>\
													      </div>\
										              </div>\
									               </div>\
										       </div>"
									           );
		//显示个人名片领域与颜色对照表
		//生成personal_main.html里的div标签
		var idx = 0;
		var field_num = 0;
		for (field_name in personInfo.field) {
			$("#abilityColorTable" + personInfo.user_id + "").append("<div id='" + personInfo.user_id + "' class='box-word'></div>");
			$(".box-word:last").append("<div class='box' style='background:" + color[idx] + "'></div>");
			$(".box-word:last").append("<div class='word' style='color:" + color[idx] + "'>" + field_name + "</div>");
			field_num++;
			idx = (idx + 1) % 10;
		}
		if (field_num == 0) {
			$("#abilityDetail" + personInfo.user_id).append("<span class='abilityNone'>暂未添加能力</span>");
		}
		
		//显示个人名片上的能力图
		for (field_name in personInfo.field){
			field_num++;
			for (index in  personInfo.field[field_name]) {
				var selfComment = personInfo.field[field_name][index].selfComment;
				var abilityName= personInfo.field[field_name][index].abilityName;
				var curColor = $('#abilityColorTable' + personInfo.user_id + ' .word:contains('+field_name+')').css("color");
				$("#abilityDetail" + personInfo.user_id + "").append("<p class='tooltip' style='z-index:1040; background-color:"+ curColor +"'title='"+ selfComment +"'>"+ abilityName +"</p>");
			}
		}
		
		//判断是否显示联系方式
		if (personInfo.hidden_privacy == 'H') {
			$('#row'+ curRow +' .contactContent').addClass('defaultContactContent');
			$('#row'+ curRow +' .defaultContactContent').removeClass('contactContent');
			$('#row'+ curRow +' .defaultContactContent').html("该用户设置了不显示联系方式");
			$('#row'+ curRow +' .contactContent').empty();
		}
		 
		// 为新增的名片初始化按钮的提示框
		PersonCardView.initTooltip();
		
		// 逐渐增加行列。
		curRow += 1;
	}
};
