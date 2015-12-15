var user_json;

function navClick(obj) {
	var action = obj.attr('id');
    var img_handle = obj;
    if (obj.attr('class') !== 'clickble select') {
        if (obj.attr("id") == 'btn_info') {
            if ($(".info_child").css('display') == 'block')
                $("#btn_info div img").attr('src', public_url + '/img/icon/down.png');
            else $("#btn_info div img").attr('src', public_url + '/img/icon/up.png');
            $(".info_child").slideToggle("100");
        } 
        else  if (obj.attr("id") == 'btn_comp') {//此if，点击竞赛管理，下拉/回收竞赛管理菜单，改变竞赛管理图标
            	if ($(".comp_child").css('display') == 'block')
                    $("#btn_comp div img").attr('src', public_url + '/img/icon/down.png');
                else $("#btn_comp div img").attr('src', public_url + '/img/icon/up.png');
                $(".comp_child").slideToggle("100");
        	}
        else {
            $(".nav a,.info_child a").removeClass("select");
            obj.addClass("select");
            icon_change(img_handle);
            // 在往info_container里面添加页面之前先清空。
            $(".info_container").empty();    
            
            // 根据action载入相应的page
            switch (action) {
                case 'btn_main':
                	location.hash = "#main";
                	loadMainPage();
                break;
                case 'btn_base_info':
                	location.hash = "#information";
                	loadPersonalPage();
                break;
                case 'comp_apply':
                	location.hash = "#comp_apply";
                	loadCompetetionPage();
                break;
                case 'my_comp':
                	location.hash = "#my_comp";
                	loadMyCompPage();
	            break;
                case 'btn_safe':
                	location.hash = "#safe";
                	loadSafePage();
	                break;
                case 'btn_ability':
                	location.hash = "#ability";
                	loadAbilityPage();
                break;
                case 'btn_find':
                	location.hash = "#find";
                	loadSearchPage();
                break;
                case 'btn_photo':
                	location.hash = "#photo";
                	loadPhotoPage();
                break;
                case 'btn_pro':
                	location.hash = "#project";
                	loadItemControl()
                break;
                case 'btn_help':
                	location.hash = "#help";
                	loadSeekHelp();
                break;
                default: break;
          }
        }  
    }
}
    
function loadMainPage() {
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='MainPage_frame' id='MainPage_frame'   \
		         src= '" + app_url + "/Custom/Personalmain/personalmain" + "' seamless='seamless' scrolling='no'   \
         	 onload='this.height=MainPage_frame.document.body.scrollHeight'></iframe>");
	}
	
}

function loadPersonalPage() {
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='Personalinfo_frame' id='Personalinfo_frame'   \
		         src= '" + app_url + "/Custom/Personalinfo/Personalinfo" + "' seamless='seamless' scrolling='no'   \
		         style='height:1042px' ></iframe>");	
	}    
}

function loadPhotoPage() {
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='Photo_frame' id='Photo_frame'   \
		         src= '" + app_url + "/Custom/PersonalPhoto/personalphoto" + "' seamless='seamless' scrolling='no'   \
		         style='height:640px' ></iframe>");	
	}
}

function loadCompetetionPage()
{
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='Comp_frame' id='Comp_frame'   \
		         src= '" + app_url + "/Custom/Comp/Comp" + "' seamless='seamless' scrolling='no'   \
		         onload='this.height=Comp_frame.document.body.scrollHeight'></iframe>")	
	}                         
}

function loadMyCompPage(){
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='MyComp_frame' id='MyComp_frame'   \
		         src= '" + app_url + "/Custom/MyComp/MyComp" + "' seamless='seamless' scrolling='no' \
		         onload='this.height=MyComp_frame.document.body.scrollHeight'></iframe>")			
	}
}


function loadSafePage()
{
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='Safe_frame' id='Safe_frame'   \
		         src= '" + app_url + "/Custom/personalsafe/personalsafe" + "' seamless='seamless' scrolling='no'   \
		         style='height:646px;' ></iframe>")	
	}                         
}

function loadSeekHelp()
{
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='SeekHelp_frame' id='SeekHelp_frame'   \
		         src= '" + app_url + "/Custom/SeekHelp/SeekHelp" + "' seamless='seamless' scrolling='no'   \
		         onload='this.height=SeekHelp_frame.document.body.scrollHeight' style='height:640px;' ></iframe>")	
	}                         
}

function loadAbilityPage() {
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='Ability_frame' id='Ability_frame'   \
		         src= '" + app_url + "/Custom/Ability/Ability" + "' seamless='seamless' scrolling='no'   \
		        onload='this.height=Ability_frame.document.body.scrollHeight' style='height:720px' ></iframe>")			
	}

} 

function loadSearchPage() {//在info_container中显示searchPeople.html
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='SearchPeople_frame' id='SearchPeople_frame'   \
		         src= '" + app_url + "/Custom/SearchPeople/searchPeople" + "' seamless='seamless' scrolling='no'   \
		         style='height:1000px' ></iframe>");	
	}
}

function loadItemControl()
{
	if (checkCookies()) {
		$(".info_container").append("<iframe class='iframe' name='ItemControl_frame' id='ItemControl_frame'   \
		         src= '" + app_url + "/Custom/ItemControl/ItemControl" + "' seamless='seamless' scrolling='no'   \
		         onload='this.height=ItemControl_frame.document.body.scrollHeight' style='height:646px;' ></iframe>")	
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

function icon_change($obj) {
    $("#btn_main div img").attr('src', public_url + '/img/icon/home.png');
    $("#btn_base_info div img").attr('src', public_url + '/img/icon/base.png');
    $("#btn_ability div img").attr('src', public_url + '/img/icon/ability.png');
    $("#btn_safe div img").attr('src', public_url + '/img/icon/safe.png');
    //$("#btn_comp div img").attr('src', public_url + '/img/icon/apply.png');
    $("#btn_pro div img").attr('src', public_url + '/img/icon/prjinfo.png');
    $("#btn_photo div img").attr('src', public_url + '/img/icon/help.png');
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
        case "btn_photo":
            $("#btn_photo div img").attr('src', public_url + '/img/icon/help_c.png');
            break;
        case "btn_help":
            $("#btn_help div img").attr('src', public_url + '/img/icon/help_c.png');
            break;

    }
}


$(document).ready(function () {	
    var script_load_finished = new function () {
        this.base_info = false;
        this.ability = false;
    };

    $(".nav a,.info_child a").click(function () {
    	navClick($(this));
    });

    $(".nav a,.info_child a").hover(function () {
        if ($(this).attr("class") == "clickble select") {
            $(this).css('background-color', '#3ba9de');
        }
    });

    $(".nav a,.info_child a").mouseout(function () {
        $(this).removeAttr('style');
    });
   
	$("#btn_main").trigger("click");
	location = '#main';
    
    //when click the “联系我们” at the bottom of the page
    $(".homeBottom p").click(function(){
        myAlert("管理员邮箱：zding92@126.com");
    });

});


 /*$('#chart-area').mouseover = function (evt) {
     //var activePoints = myDoughnutChart.getSegmentsAtEvent(evt);
     alert('evrt');
     // => activePoints is an array of segments on the canvas that are at the same position as the click event.
 };*/


