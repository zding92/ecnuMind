var doughnutData;
function getDataFromServer() {
  $.ajax({
    url: model_url + "/loadPage", //请求验证页面 
    type: "GET", //请求方式
    data: "action=btn_main",
    success: function (result) {
    	doughnutData = result;
        eval(result);
        InitPersonalData(doughnutData, tabs);
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

	$(".box3").append(
			"<div class='message'>" +
			"<div class='from_face'><img src='" + public_url + "/img/photo/face.png' alt='载入失败'></div>" +
			"<div class='from'>Admin:</div>" +
			"<p class='content'>我想请你吃饭~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>" +
			"</div>");	
}

