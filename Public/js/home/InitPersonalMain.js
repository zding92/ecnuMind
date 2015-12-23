var note_json;
var limit;
var cn;
var offsetForAdmin = 0;//上次从后台读取的管理员消息数目
var offsetForUser = 0;//上次从后台读取的用户消息数目
var loadAdminMsgNum = 0;//距离上次登录未读管理员消息数目
var loadUserMsgNum = 0;//距离上次登录未读用户消息数目
var lock1 = 0;//锁定“距离上次登录未读用户消息数目”
var lock2 = 0;//锁定“距离上次登录未读管理员消息数目”
var finishedForAdmin = false;//后台管理员通知已全部读取
var finishedForUser = false;//后台用户站内信已全部读取

function messageResize() {
	var bodyHeight = $("body").height() +20;
	$("#MainPage_frame",parent.document).height(bodyHeight);
};

/*
 * tooltip初始化
 */
function initToolTip(){
	$('.tooltip').tooltipster({
		theme: 'tooltipster-noir'
	});
};
//获取用户之间的站内信，在geiMessageFromServer中调用
function getUserMessage(IsDocReadyLoading){
	$.ajax({
	    url: model_url + "/loadMessageFromUser", //请求验证页面 
	    type: "GET", //请求方式
	    data:"offset=" + offsetForUser,
	    dataType:"JSON",
	    success: function (result) {
	    	if(result[0] == "finished"){
	    		finishedForUser = true;
	    		offsetForUser = 0;
	    		messageResize();
	    		if (IsDocReadyLoading != true)
	    			window.parent.myAlert("没有更多的消息了！");
	    		$(".box6").hide();
	    		$("#unreadMsgFromUser").html("0");
	    		return;
	    	}
	    	//result['note_sender']表示发件人
	    	//result['note_time']表示发送站内信的时间
	    	//result['note_content']表示站内信的内容
	    	note_json = result;
	    	loadMsgUserNum = note_json[0]['offset'];//此次加载的消息条数
	    	unreadMsgUserNum = note_json[0]['unReadMsgUserNum'];//距离上次登录未读消息的数目
	    	for(cn = 0; cn < result.length; cn++){
	    		//将返回来的有关returnToFront数组中的数据进行处理，利用append方法显示在页面上
			$(".box5").append("<div class='message'>" +
					"<div class='from_face'><img src='" + 
					public_url + 
					"/img/photo/" +
					note_json[cn]['photo_path']
					+ "/face.png' alt='载入失败'>" +
					"</div><div class='from'>" +
					note_json[cn]['note_sender'] +
					"</div>" +
					"<div class='date'>" +
					note_json[cn]['note_time'] +
					"</div>" +
					"<p class='content'>" +
					note_json[cn]['note_content'] +
					"</p></div>");
	    		}
	    	//锁定“距离上次登录未读用户消息数目”
	    	if(!lock1){
	    		$("#unreadMsgFromUser").html(unreadMsgUserNum);
	    		lock1 = 1;
	    	}
	    		
	    	//已经读取完毕
	    	if (result.length < 3 ){
	    		finishedForUser = true;
	    		offsetForUser = 0;
	    		messageResize();
	    		return;
	    	}
//	    	if (unreadMsgUserNum > 0) {
//	    		$("#unreadUser").hide();
//	    	} else {
//	    		$("#unreadMsgForUser").html(unreadMsgAdminNum);
//	    	}
	    	messageResize();
	    }	
	  });
}


//获取管理员发布的站内信，在geiMessageFromServer中调用
function getAdminMessage(IsDocReadyLoading){
	$.ajax({
	    url: model_url + "/loadMessageFromAdmin", //请求验证页面 
	    type: "GET", //请求方式
	    data:"offset=" + offsetForAdmin,
	    dataType:"JSON",
	    success: function (result) {
	    	if(result[0] == "finished"){
	    		finishedForAdmin = true;
	    		offsetForAdmin = 0;
	    		messageResize();
	    		if (IsDocReadyLoading != true)
	    			window.parent.myAlert("没有更多的消息了！");
	    		$(".box4").hide();
	    		$("#unreadMsg").html("0");
	    		return;
	    	}
	    	//result['note_academy']表示被通知院系
	    	//result['note_time']表示通知下达的时间
	    	//result['note_detail']表示通知的内容
	    	note_json = result;
	    	loadMsgAdminNum = note_json[0]['offset'];//此次加载的消息条数
	    	unreadMsgAdminNum = note_json[0]['unReadMsgAdminNum'];//距离上次登录未读消息的数目
	    	for(cn = 0;cn < result.length  ;cn ++){
	    		//将返回来的有关returnToFront数组中的数据进行处理，利用append方法显示在页面上
			$(".box3").append("<div class='message'>" +
					"<div class='from_face'><img src='" + 
					public_url + 
					"/img/photo/default/face.png' alt='载入失败'>" +
					"</div><div class='from'>" +
					note_json[cn]['note_academy'] +
					"管理员</div>" +
					"<div class='date'>" +
					note_json[cn]['note_time'] +
					"</div>" +
					"<p class='content'>" +
					note_json[cn]['note_detail'] +
					"</p></div>");
	    		}
	    	//锁定“距离上次登录未读管理员消息数目”
	    	if(!lock2){
		    	$("#unreadMsg").html(unreadMsgAdminNum);
	    		lock2 = 1;
	    	}
	    	//已经读取完毕
	    	if (result.length < 3 ) {
	    		finishedForAdmin = true;
	    		offsetForAdmin = 0;
	    		messageResize();
	    		return;
	    	}
//	    	if (unreadMsgAdminNum > 0) {
//	    		$("#unreadAdmin").hide();
//	    	} else {
//	    		$("#unreadMsg").html(unreadMsgAdminNum);
//	    	}
	    	messageResize();
	    }	
	  });
}


function  getMessageFromServer(){
	getAdminMessage(true);//获取管理员发布的站内信
	getUserMessage(true);//获取用户之间站内信
	
}



//点击“显示更多”按钮事件响应
function showMoreForAdmin(){
	if(finishedForAdmin){
		window.parent.myAlert("没有更多的消息了");
		$(".box4").hide();
		return;
	}
	offsetForAdmin += loadMsgAdminNum;
	getAdminMessage();
}
function showMoreForUser(){
	if(finishedForUser){
		window.parent.myAlert("没有更多的消息了");
		$(".box6").hide();
		return;
	}
	offsetForUser += loadMsgUserNum;
	getUserMessage();
}

function getDataFromServer() {
  var no_ability = false;
  $.ajax({
    url: model_url + "/getMainData", //请求验证页面 
	type: "GET", //请求方式
	data: "flag=user",
    success: function (result) {
  
      eval(result);

      if (!no_ability){
//    	  alert(doughnutData);
//    	  alert(tabs);
    	  refreshMainPanel(doughnutData, tabs);
      }

      else {
    	  $(".Chart_info").remove();
    	  $(".tips").remove();
    	  $(".detail").remove();
    	  $(".Chart").append("<div class='needAdd'>您目前还没有添加认证能力，请点击<span class='no_ability' style='color:#e3d'>此处</span>添加</div>");//这里要改动css代码
    	  $(".no_ability").click(function() {
    		  window.parent.navClick($("#btn_ability",parent.document));
    	  });
      }
      //载入个人能力完毕，开始载入个人消息通知。
      getMessageFromServer();
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
	
	// 生成personal_main.html里的div标签
	var idx = 0;
	for (field_name in tabs) {
		$(".tips").append("<div class='box-word'></div>");
		$(".box-word:last").append("<div class='box' style='background:" + color[idx] + "'></div>");
		$(".box-word:last").append("<div class='word' style='color:" + color[idx] + "'>" + field_name.slice(0, -3) + "</div>");
		idx = (idx + 1) % 10;
	}

	// 生成能力饼状图
    refreshChart(doughnutData, tabs);
}

