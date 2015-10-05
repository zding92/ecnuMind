var note_json;
var limit;
var cn;
function getDataFromServer() {
  $.ajax({
    url: model_url + "/loadPage", //请求验证页面 
    type: "GET", //请求方式
    async:false,
    data: "action=btn_main",
    success: function (result) {
  
      eval(result);
      InitPersonalData(doughnutData, tabs);
    }
  });
}

function  getMessageFromServer(){

	$.ajax({
	    url: model_url + "/loadMessage", //请求验证页面 
	    type: "GET", //请求方式
	    async:false,
	    dataType:"JSON",
	    success: function (result) {
	    	//result['note_academy']表示被通知院系
	    	//result['note_time']表示通知下达的时间
	    	//result['note_detail']表示通知的内容
	    	note_json = result;
	    	limit = 3;//表示当前默认可显示通知数目
	    	for(cn = 0;cn < limit ;cn ++){
	    		//将返回来的有关returnToFront数组中的数据进行处理，利用append方法显示在页面上
			$(".box3").append("<div class='message'>" +
					"<div class='from_face'><img src='" + 
					public_url + 
					"/img/photo/face.png' alt='载入失败'>" +
					"</div><div class='from'>" +
					note_json[cn]['note_academy'] +
					"管理员</div>" +
					"<div class='from' style='float:right;font-size:12px'>" +
					note_json[cn]['note_time'] +
					"</div>" +
					"<p class='content'>" +
					note_json[cn]['note_detail'] +
					"</p></div>");
	    		}
	    	}	
	  });
}

function RefreshChart(doughnutData, tabs) {
  var ctx = document.getElementById("chart-area").getContext("2d");
  myDoughnut = new Chart(ctx).Doughnut(doughnutData, { responsive: true });
  document.getElementById("chart-area").onclick = function (evt) {
    var activePoints = myDoughnut.getSegmentsAtEvent(evt);
  
    if (typeof (activePoints[0]) !== "undefined") {
      switch (activePoints[0].label) {
        case '信息技术(项)':
          if ($('#it').css('display') == 'none') {
            $('.detail').removeAttr('style')
            $('#default').remove();
            $('#it').append(tabs).fadeIn(700);
          }
        break;
      
        case '设计(项)':
          $('.detail').removeAttr('style');
          $('#design').css('visibility', 'visible');
        break;
          
        case '生物医药(项)':
          $('.detail').removeAttr('style');
          $('#bm').css('visibility', 'visible');
        break;
      
        case '艺术(项)':
          $('.detail').removeAttr('style');
          $('#art').css('visibility', 'visible');
        break;
        
        default:
        break;
      }  
    }
  };
}
function InitPersonalData(doughnutData, tabs) {
    RefreshChart(doughnutData, tabs);
	
	$(".box1 .welcome").append("<p>" + user_json.name + "</p>")
    .append("<p>" + user_json.major + "</p>");

	$(".box1 .photo").append("<img src='" + public_url + "/img/photo/face.png' alt='照片载入失败'>");

	$(".box1 .person_intro").append(user_json.brief);

	//$(".box3").append("<div class='message'><div class='from_face'><img src='" + public_url + "/img/photo/face.png' alt='载入失败'></div><div class='from'>Admin:</div><p class='content'>我想请你吃饭~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p></div>");
	
}
//点击“显示更多”按钮事件响应
function showMore(){
	if(note_json.length > limit){
		for(cn = limit; cn < note_json.length; cn++)
			$(".box3").append("<div class='message'>" +
					"<div class='from_face'><img src='" + 
					public_url + 
					"/img/photo/face.png' alt='载入失败'>" +
					"</div><div class='from'>" +
					note_json[cn]['note_academy'] +
					"管理员</div>" +
					"<div class='from' style='float:right;font-size:12px'>" +
					note_json[cn]['note_time'] +
					"</div>" +
					"<p class='content'>" +
					note_json[cn]['note_detail'] +
					"</p></div>");
		document.getElementById("showMore").onclick=blur();
	}
}
