var user_json;

$(document).ready(function () {
    var script_load_finished = new function () {
        this.base_info = false;
        this.ability = false;
    };
    
    function showname() {
		document.getElementById("welcome-user").innerHTML =
		"<div>欢迎您！" + ((user_json.name == null) ? user_json.nickname : user_json.name) + "</div>";
	}

    $(document).ready(function () {
    	$.ajax({
    	    url: model_url + "/loadPage", //请求验证页面 
    	    type: "GET", //请求方式
    	    async:false,
    	    data: "action=getUserJson",
    	    success: function (result) {
    	      user_json = eval("(" + result + ")");
    	      showname();
    	      $("#btn_main").trigger("click");
    	      location = '#main';
    	    }
    	});
    })

//    $(document).ready(function () {
//       $("#btn_comp").trigger("click");
//        location = '#competitions';
//    })

    $(".nav a,.info_child a").click(function () {
        var action = $(this).attr('id');
        var img_handle = $(this);
        if ($(this).attr('class') !== 'clickble select') {
            if ($(this).attr("id") == 'btn_info') {
                if ($(".info_child").css('display') == 'block')
                    $("#btn_info div img").attr('src', public_url + '/img/icon/down.png');
                else $("#btn_info div img").attr('src', public_url + '/img/icon/up.png');
                $(".info_child").slideToggle("100");
            } 
            else  if ($(this).attr("id") == 'btn_comp') {//此if，点击竞赛管理，下拉/回收竞赛管理菜单，改变竞赛管理图标
	            	if ($(".comp_child").css('display') == 'block')
	                    $("#btn_comp div img").attr('src', public_url + '/img/icon/down.png');
	                else $("#btn_comp div img").attr('src', public_url + '/img/icon/up.png');
	                $(".comp_child").slideToggle("100");
            	}
            else {
                $(".nav a,.info_child a").removeClass("select");
                $(this).addClass("select");
                icon_change(img_handle);
                // 在往info_container里面添加页面之前先清空。
                $(".info_container").empty();    
                
                // 根据action载入相应的page
                switch (action) {
	                case 'btn_main':                   
	                  loadMainPage();
	                break;
	                case 'btn_base_info':
	                  loadPersonalPage();
	                break;
	                case 'comp_apply':
	                  loadCompetetionPage();
	                break;
	                case 'my_comp':
		              loadMyCompPage();
		            break;
	                case 'btn_ability':
	                  loadAbilityPage();
	                break;
	                case 'btn_find':
	                  loadSearchPage();
	                break;
	                default: break;
              }
            }
            

        }
    })

    $(".nav a,.info_child a").hover(function () {
        if ($(this).attr("class") == "clickble select") {
            $(this).css('background-color', '#3ba9de');
        }
    })

    $(".nav a,.info_child a").mouseout(function () {
        $(this).removeAttr('style');
    })
    


    function icon_change($obj) {
        $("#btn_main div img").attr('src', public_url + '/img/icon/home.png');
        $("#btn_base_info div img").attr('src', public_url + '/img/icon/base.png');
        $("#btn_ability div img").attr('src', public_url + '/img/icon/ability.png');
        $("#btn_safe div img").attr('src', public_url + '/img/icon/safe.png');
        //$("#btn_comp div img").attr('src', public_url + '/img/icon/apply.png');
        $("#btn_pro div img").attr('src', public_url + '/img/icon/prjinfo.png');
        $("#btn_find div img").attr('src', public_url + '/img/icon/find.png');
        $("#btn_help div img").attr('src', public_url + '/img/icon/help.png');
        switch ($obj.attr('id')) {
            case "btn_main":
                $("#btn_main div img").attr('src', public_url + '/img/icon/home_c.png');
                break;
            case "btn_info":
                $("#btn_info div img").attr('src', public_url + '/img/icon/home.png');
                break;
            case "btn_base_info":
                $("#btn_base_info div img").attr('src', public_url + '/img/icon/base_c.png');
                break;
            case "btn_ability":
                $("#btn_ability div img").attr('src', public_url + '/img/icon/ability_c.png');
                break;
            case "btn_safe":
                $("#btn_safe div img").attr('src', public_url + '/img/icon/safe_c.png');
                break;
            case "btn_comp":
                $("#btn_comp div img").attr('src', public_url + '/img/icon/apply_c.png');
                break;
            case "btn_pro":
                $("#btn_pro div img").attr('src', public_url + '/img/icon/prjinfo_c.png');
                break;
            case "btn_find":
                $("#btn_find div img").attr('src', public_url + '/img/icon/find_c.png');
                break;
            case "btn_help":
                $("#btn_help div img").attr('src', public_url + '/img/icon/help_c.png');
                break;

        }
    }

    function loadMainPage() {
    	if (checkCookies()) {
    		$(".info_container").load("personal_main.html");
    	}
    }

    function loadPersonalPage() {
    	if (checkCookies()) {
    		$(".info_container").load("personal_info.html")
    
    	}
    }

    function loadCompetetionPage()
    {
    	if (checkCookies()) {
    		$(".info_container").append("<iframe class='iframe' name='Comp_frame' id='Comp_frame'   \
    		         src= '" + app_url + "/Home/Comp/Comp" + "' seamless='seamless' scrolling='no'   \
    		         onload='this.height=Comp_frame.document.body.scrollHeight' \
    		         onhaschange='this.height=Comp_frame.document.body.scrollHeight'></iframe>")	
    	}                         
    }
    
    function loadMyCompPage(){
    	if (checkCookies()) {
    		$(".info_container").append("<iframe class='iframe' name='Comp_frame' id='Comp_frame'   \
   		         src= '" + app_url + "/Home/Comp/myComp" + "' seamless='seamless' scrolling='no'   \
   		         onload='this.height=Comp_frame.document.body.scrollHeight' \
   		         onhaschange='this.height=Comp_frame.document.body.scrollHeight'></iframe>")			
    	}
    }
    
    function loadAbilityPage() {
    	if (checkCookies()) {
    		$(".info_container").load("ability.html");		
    	}
    
    } 
    
    function loadSearchPage() {//在info_container中显示searchPeople.html
    	if (checkCookies()) {
    		$(".info_container").load("searchPeople.html");
    	}
    }
    
    function checkCookies() {
    	if (document.cookie.indexOf("PHPSESSID", 0) < 0) {
    		alert("登录超时，请重新登录");
    		location="/webprj/ecnu_mind/index.php";
    		return false;
    	} 
    	return true
    }

});


 /*$('#chart-area').mouseover = function (evt) {
     //var activePoints = myDoughnutChart.getSegmentsAtEvent(evt);
     alert('evrt');
     // => activePoints is an array of segments on the canvas that are at the same position as the click event.
 };*/


