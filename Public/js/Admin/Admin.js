var user_json;

$(document).ready(function () {
    var script_load_finished = new function () {
        this.base_info = false;
        this.ability = false;
    };
    document.getElementById("welcome-user").innerHTML =
		"<div class='welcomeText'>欢迎您！<span>管理员</span></div>";



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
                
	                case 'btn_history':                   
	                	loadHistoryItem();
	                break;
	                
	                case 'btn_CurrentComp':
	                	loadCurrentComp();
	                break;
	                
	                case 'btn_CompControl':
	                	loadCompControl();
	                break;
	                
	                case 'btn_UserControl':
	                	loadUserControl();
	                break;
	                case 'btn_ChangePassword':
	                	loadChangePassword();
	                break;
	                default: break;
              }
            }
            

        }
    });
    


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

    //载入历史项目页面
    function loadHistoryItem() {
    	if (checkCookies()) {
    		$(".info_container").append("<iframe class='iframe' name='HistoryItem_frame' id='HistoryItem_frame'   \
    		         src= '" + app_url + "/Admin/HistoryItem/HistoryItem" + "' seamless='seamless' scrolling='no'   \
    		         onload='this.height=HistoryItem_frame.document.body.scrollHeight'></iframe>")	
    	} 
    }

    //载入当前比赛页面
    function loadCurrentComp() {
    	if (checkCookies()) {
    		$(".info_container").append("<iframe class='iframe' name='CurrentComp_frame' id='CurrentComp_frame'   \
    		         src= '" + app_url + "/Admin/CurrentComp/CurrentComp" + "' seamless='seamless' scrolling='no'   \
    		         onload='this.height=CurrentComp_frame.document.body.scrollHeight'></iframe>")	
    	} 
    }
    
    //载入比赛管理页面
    function loadCompControl(){
    	if (checkCookies()) {
    		$(".info_container").append("<iframe class='iframe' name='CompControl_frame' id='CompControl_frame'   \
   		         src= '" + app_url + "/Admin/CompControl/CompControl" + "' seamless='seamless' scrolling='no' \
   		         onload='this.height=CompControl_frame.document.body.scrollHeight'></iframe>")			
    	}
    }
  
    //载入用户管理页面
    function loadUserControl(){
    	if (checkCookies()) {
    		$(".info_container").append("<iframe class='iframe' name='UserControl_frame' id='UserControl_frame'   \
   		         src= '" + app_url + "/Admin/UserControl/UserControl" + "' seamless='seamless' scrolling='no' \
   		         onload='this.height=UserControl_frame.document.body.scrollHeight'></iframe>")			
    	}
    }
    
    function loadChangePassword(){
    	if (checkCookies()) {
    		$(".info_container").append("<iframe class='iframe' name='Safe_frame' id='Safe_frame'   \
   		         src= '" + app_url + "/Admin/Home/Safe" + "' seamless='seamless' scrolling='no' \
   		         onload='this.height=Safe_frame.document.body.scrollHeight'></iframe>")			
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

$(document).ready(function () {
	//进入管理员界面，默认进入HistoryItem
	$('#btn_history').trigger('click');
	location = '#HistoryItem';
});

$(document).ready(function(){
	$('.fixed-table-toolbar pull-right').append('<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">'+
			'<i class="glyphicon glyphicon-export icon-share"></i>'+ 
	  	  	'</button>');
})


