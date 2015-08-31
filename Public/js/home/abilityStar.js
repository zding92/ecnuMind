/**
 * This js is designed to finish the star-remarking of the abilities
 */
$(function () {
	$('.abilityStar').raty({ 
		  number   : 10,
		  score    : 10,
		  starOff  : starOffIcon,
		  starOn   : starOnIcon,
		  starHalf : starHalfIcon,
		  readOnly : true,		  
	});
	var lastPickedCheckbox = '';//最后一次点击、操作的能力标签
  var checked = false;
    $(function(){//将获取最新的标签文字以及说明添加至页面中
        $("ins").click(function() {//点击能力标签后执行函数，能力标签被icheck转化为了ins标签

            //取出能力说明框中的内容
            var abilityDetail = $(".abilityDetail").val();

            //判断其是否为默认值，若是默认值，则能力说明框中的值为null
            if (abilityDetail == "在此添加经历或认证，进一步说明此项能力")
                abilityDetail = null;

            //此处lastPickedCheckbox为上一个点击过的标签
            var ajaxData = 'User_username='+user_json.nickname+'&'+lastPickedCheckbox+'='+checked+'&selfcomment='+abilityDetail;
            // $.ajax({
            //                 url: TiaozhanAddDataURL, //请求验证页面 
            //                 type: "POST", //请求方式
            //                 async: false,
            //                 data: ajaxData,
            //                 success: function (call) 
            //                 {
            //                      alert(call);
            //                      //在php中会ajaxReturn一个ablitySaved变量，以此判断是否数据库写入完毕
            //                      if (ablitySaved==true) alert("已成功保存");
            //                      else alert("数据写入数据库失败");

            //                 }
            //             });
            alert(ajaxData);


            lastPickedCheckbox = $(this).parent().text();//获取最新点击的标签中的文字
            if($(this).parent().children("input").attr("checked") == 'checked'){//若选择了该项能力
                checked = true;
                $(".abilityRemarkHead").html("<b>"+lastPickedCheckbox+"</b>的获评分数：");//将获取最新的标签文字以及说明添加至页面中
                $(".abilityRemarkNum").html("<b>"+lastPickedCheckbox+"</b>的获评次数：");//将获取最新的标签文字以及说明添加至页面中
              	$('.abilityStar').raty({ 
            		  number   : 10,
            		  score    : 8.5,
            		  starOff  : starOffIcon,
            		  starOn   : starOnIcon,
            		  starHalf : starHalfIcon,
            		  readOnly : true,		  
              	});
              	$('.abilityStar').append("  "+8.5+"分");
              	$(".abilityRemarkNum").append("   66次");
            }
            else{//若未选择该项能力
                checked = false;
               	$(".abilityRemarkHead").html("请先添加<b>"+lastPickedCheckbox+"</b>能力，再获得评分");//将获取最新的标签文字以及说明添加至页面中
            	  $(".abilityRemarkNum").html("请先添加<b>"+lastPickedCheckbox+"</b>能力，再查看获评次数");//将获取最新的标签文字以及说明添加至页面中
            } 
        });
    })
})