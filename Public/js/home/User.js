var init_js;

(function () {

    var script_load_finished = new function () {
        this.base_info = false;
        this.ability = false;
    };

    $(document).ready(function () {
        $("#btn_main").trigger("click");
        location = '#main';
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
            } else {
                $(".nav a,.info_child a").removeClass("select");
                $(this).addClass("select");
                icon_change(img_handle);
                $(".info_container").empty();

                $.ajax({
                    url: model_url + "/loadPage", //请求验证页面 
                    type: "GET", //请求方式
                    async:false,
                    data: "action=" + $(this).attr('id'),
                    beforeSend: function(){              
                    },
                    success: function (result) {            	
                    	eval(result);
                        switch (action) {
                            case 'btn_main':                   
                                MainHtml();
                                MainData();
                                RefreshChart(doughnutData, tabs);
                                break;
                            case 'btn_base_info':
                                InfoHtml();
                                InfoData();
                                break;
                            case 'btn_comp':
                                CompHtml();
                                break;
                            default: break;
                        }
                    }
                })
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
                }
            }
        };
    }

    function icon_change($obj) {
        $("#btn_main div img").attr('src', public_url + '/img/icon/home.png');
        $("#btn_base_info div img").attr('src', public_url + '/img/icon/base.png');
        $("#btn_ability div img").attr('src', public_url + '/img/icon/ability.png');
        $("#btn_safe div img").attr('src', public_url + '/img/icon/safe.png');
        $("#btn_comp div img").attr('src', public_url + '/img/icon/apply.png');
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

    function MainHtml() {

        $(".info_container").append("<div class='box1'></div>")
                            .append("<div class='box2'></div>")
                            .append("<div class='box3'></div>");

        $(".box1").append("<div class='title_box'></div>")
                  .append("<div class='photo'></div>")
                  .append("<div class='welcome'></div>")
                  .append("<div class='line_vertical'></div>")
                  .append("<p style='display: inline-block;position: relative;left: 120px;font-size: 14px;top: -59px;border-bottom: 2px solid #ddd;width: 90px;text-align: center;'>个人简介</p>")
                  .append("<p class='person_intro'></p>");

        $(".box1 .title_box").append("<div style='display:inline-block;width:15px;height:15px;'><img style='width:15px;height:15px;margin-left: -10px;' src= " + public_url + "/img/icon/myinfo.png></div>")
                       .append("我的信息");

        $(".box2").append("<div class='title_box'></div>")
                  .append("<div class='Chart'></div>");

        $(".box2 .title_box").append("<div style='display:inline-block;width:15px;height:15px;'><img style='width:15px;height:15px;margin-left: -10px;' src=" + public_url + "/img/icon/myinfo.png></div>")
                             .append("能力概览");

        $(".box2 .Chart").append("<div class='Chart_info'></div>")
                   .append("<div class='tips'></div>")
                   .append("<div class='detail'></div>");

        $(".box2 .Chart .Chart_info").append("<p style='font-size: 10px;color: #0080ff;text-align:center'>tips:鼠标悬浮在图上以显示详细能力信息~</p>")
                        .append("<canvas id='chart-area' width='264' height='264' style='width: 240px; height: 240px;'></canvas>");

        $(".box2 .Chart .tips").append("<div class='box' style='background:#F7464A'></div>")
                              .append("<div class='word' style='color:#F7464A'>信息技术</div>")
                              .append("<div class='box' style='background:#46BFBD'></div>")
                              .append("<div class='word' style='color:#46BFBD'>设计</div>")
                              .append("<div class='box' style='background:#FDB45C'></div>")
                              .append("<div class='word' style='color:#FDB45C'>生物医药</div>")
                              .append("<div class='box' style='background:#949FB1'></div>")
                              .append("<div class='word' style='color:#949FB1'>艺术</div>");

        $(".box2 .Chart .detail").append("<div id='default'>请单击左侧饼图以查看能力详情</div>")
                                .append("<div class='tabs' id='it'></div>")
                                .append("<div class='tabs' id='design'></div>")
                                .append("<div class='tabs' id='bm'></div>")
                                .append("<div class='tabs' id='art'></div>");

        $(".box3").append("<div class='title_box' style='margin-bottom:20px'></div>");

        $(".box3 .title_box").append("<div style='display:inline-block;width:15px;height:15px;'><img style='width:15px;height:15px;margin-left: -10px;' src= " + public_url + "/img/icon/message.png></div>")
                             .append("站内通知");
    }

    function InfoHtml() {

        $(".info_container").append("<div class='title_box'></div>")
                            .append("<div id='ChangePage' class='Two-box clearfix'></div>");

        $(".title_box").append("<div style='display:inline-block;width:15px;height:15px;'><img style='width:15px;height:15px;margin-left: -10px;' src= " + public_url + "/img/icon/base.png></div>")
                       .append("基础信息编辑");

        $("#ChangePage").append("<div class='Page-box clearfix' id='Page1'></div>")
                        .append("<div class='Page-box clearfix' id='Page2'></div>");

        $("#Page1").append("<div class='choice1'></div>")
                   .append("<div class='head'></div>")
                   .append("<div class='form-box'></div>");

        $("#Page1 .choice1").append("<button id='btn_edit' class='btn_change'>←编辑照片</button>");

        $("#Page1 .head").append("<p>Infomation</p>");

        $("#Page1 .form-box").append("<form id='form_base' method='get' action='../PHP/Submit.php'></form");

        $("#Page1 .form-box #form_base").append("<div class='form-group'>\
                                                    <label class='label1' for='nickname'>昵称</label>\
                                                    <input type='text' name='nickname' class='form-control' id='nickname' placeholder='请输入昵称'>\
                                                 </div>")
                                        .append("<div class='form-tip' id='nickname-tip' style='display:none'></div>")
                                        .append("<div class='form-group'><label class='label1' for='name'>姓名</label><input type='text' name='name' class='form-control' id='name' placeholder='请输入真实姓名'><input type='checkbox' name='hidden_name' id='checkbox-11-2'><label for='checkbox-11-2'></label></div>")
                                        .append("<div class='form-tip' id='name-tip' style='display:none'></div>")
                                        .append("<div class='form-group'><label class='label1' for='studentID'>学号</label><input type='text' name='studentID' class='form-control' id='studentID' placeholder='请输入学号'></div>")
                                        .append("<div class='form-tip' id='studentID-tip' style='display:none'></div>")
                                        .append("<div class='form-group'><label class='label1' for='Email'>电子邮件</label><input type='text' name='email' class='form-control' id='Email' placeholder='example@qq.com'></div>")
                                        .append("<div class='form-tip' id='Email-tip' style='display:none'></div>")
                                        .append("<div class='form-group'><label class='label1' for='address'>地址</label><input type='text' name='address' class='form-control' id='address' placeholder='请输入你在学校的联系地址'></div>")
                                        .append("<div class='form-tip' id='address-tip' style='display:none'></div>")
                                        .append("<div class='form-group'><label class='label1' for='phone'>联系电话</label><input type='text' name='phone' class='form-control' id='phone' placeholder='请输入手机号码'></div>")
                                        .append("<div class='form-tip' id='phone-tip' style='display:none'></div>")
                                        .append("<div class='form-group' style='text-align:center;font-size: 15px;font-weight: 700;color: rgba(120,120,120,0.9)'><label class='label1'>性别</label><input type='radio' class='sexbox' id='male' value='male' name='gender'><span>汉纸</span><input type='radio' class='sexbox' id='female' value='female' name='gender'><span>妹纸</span></div>")
                                        .append("<link rel='stylesheet' href='"+public_url+"/jsLib/jquery/Combox/css.css'>\
                                                 <link rel='stylesheet' href='"+public_url+"/jsLib/jquery/Combox/form.css'>")                                       
                                        .append("<div class='combobox'><ul><li></li></ul></div>")
                                        .append("<div class='form-tip' id='combobox-tip' style='display:none'></div>")
                                        .append("<div class='form-group' style='height:190px'><label class='label1' for='brief'>个人简介</label><textarea type='text' name='brief' class='form-control' id='brief' placeholder='请在100字内简单介绍一下自己吧。可以说明一下自己擅长哪些技术~当然也可以谈谈兴趣爱好~'></textarea></div>")
                                        .append("<div class='form-tip' id='brief-tip' style='display:none'></div>")
                                        .append(" <button type='submit' class='btn'>提交修改</button>");


        $("#Page1 .form-box #form_base li").append("<span style='margin-right: 54px;position: relative;top: -4px;'> 学院/系 </span>")
                                           .append("<select name='academy' class='kitjs-form-suggestselect' style='margin-bottom: 10px;' id='academy'></select>")
                                           .append("<br><span style='margin-right: 76px;position: relative;top: -4px;'> 系别 </span>")
                                           .append("<select name='department' class='kitjs-form-suggestselect' style='margin-bottom: 10px;' id='department'></select>")
                                           .append("<br><span style='margin-right: 76px;position: relative;top: -4px;'> 专业 </span>")
                                           .append("<select name='major' class='kitjs-form-suggestselect' style='margin-bottom: 10px;' id='major'></select>")

        $("#Page2").append("<div class='choice2'></div>")
                   .append("<div class='head' style='left: 23%;'></div>")
                   .append("<div class='form-box'></div>");

        $("#Page2 .choice2").append("<button id='btn_photo' class='btn_change'>编辑个人信息→</button>");

        $("#Page2 .head").append("<p>Photo</p>");

        $("#Page2 .form-box").append("<div class='Old'></div>")
                             .append("<div class='New'></div>");

        $("#Page2 .Old").append("<p>当前使用</p>")
                        .append("<div class='photo' style='width: 120px;height: 120px;left: 82px;top: 167px;'><img src='" + public_url + "/img/photo/face.png' alt='照片载入失败'></div>");

        $("#Page2 .New").append("<form id='upload_form' enctype='multipart/form-data' method='post' action='upload.php' onsubmit='return checkForm()'>\
                                   <!-- hidden crop params -->\
                                   <input type='hidden' id='x1' name='x1'>\
                                   <input type='hidden' id='y1' name='y1'>\
                                   <input type='hidden' id='x2' name='x2'>\
                                   <input type='hidden' id='y2' name='y2'>\
                                   <input type='file' name='image_file' id='image_file' onchange='fileSelectHandler();'>\
                                   <button id='btn_upload' class='btn_change' style='position: absolute;left: -1px;z-index: 0;'>选择照片</button>\
                                   <span style='position: relative;left: 160px;top: 20px;font-size: 10px'>请注意图片大小不要超过200*200(100kb)</span>\
                                   <div class='photo_error'></div>\
                                   <div class='photo-edit'>\
                                     <img id='preview'>\
                                     <br>\
                                     <p style='position: relative;color:#ffd800'>可以拖动鼠标对图片裁剪</p>\
                                     <input type='submit' class='btn_change' value='确定上传'>\
                                   </div>\
                                 </form>");

        $('.sexbox').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        if (!script_load_finished.base_info) {
            $("body").append("<link rel='Stylesheet' type='text/css' href='"+public_url+"/jsLib/jquery/Jcrop/jquery.Jcrop.min.css'>\
                                         <script src='"+public_url+"/JSON/ComboxData.js'></script>\
                                         <script src='"+public_url+"/jsLib/jquery/Combox/Combox.js'></script>\
                                         <script src='"+public_url+"/js/home/Checkbox.js'></script>\
                                         <script src='"+public_url+"/js/home/ChangePage.js'></script>\
                                         <script src='"+public_url+"/jsLib/jquery/Jcrop/jquery.Jcrop.min.js'></script>\
                                         <script src='"+public_url+"/jsLib/jquery/Jcrop/Jcrop.js'></script>\
                                         <script src='"+public_url+"/js/home/Checkform.js'></script>");
            script_load_finished.base_info = true;
            Combobox();
            Jcrop();
            Checkform();
            Checkbox();
        }
        else{
            Combobox();
            Jcrop();
            Checkform();
            Checkbox();
            ChangePage();    
        }
    }


    function AbilityHtml() {
        $(".info_container").append("<div class='title_box'>个人能力编辑</div>")
                              .append("<div class='ability_head'><p>选择领域</p></div>")
                              .append("<div id='L1' class='ability_box'></div>")
                              .append("<div class='ability_head'><p>选择方向</p></div>")
                              .append("<div id='L2' class='ability_box'></div>")
                              .append("<div class='ability_head'><p>选择能力</p></div>")
                              .append("<div id='L3' class='ability_box'></div>");
    }

    function MainData() {
        $(".box1 .welcome").append("<p>" + init_js.nickname + "</p>")
                       .append("<p>" + init_js.name + "</p>")
                       .append("<p>" + init_js.major + "</p>");

        $(".box1 .photo").append("<img src='" + public_url + "/img/photo/face.png' alt='照片载入失败'>");

        $(".box1 .person_intro").append(init_js.brief);

        $(".box3").append("<div class='message'>\
                          <div class='from_face'><img src='" + public_url + "/img/photo/face.png' alt='载入失败'></div>\
                          <div class='from'>Admin:</div>                   \
                          <p class='content'>我想请你吃饭~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>\
                       </div>");
    }

    function InfoData() {
        //Combobox初始化值
        b3.transform();
	    b1.formEl.name = 'academy';
        b1.formEl.id = 'academy';
        b1.inputEl.value = init_js.academy;
        b1.formEl.value = init_js.academy;
        b2.formEl.name = 'department';
        b2.formEl.id = 'department';
        b2.inputEl.value = init_js.department;
        b2.formEl.value = init_js.department;
        b3.formEl.name = 'major';
        b3.formEl.id = 'major';
        b3.formEl.value = init_js.major;
        b3.inputEl.value = init_js.major;

        //普通Input输入框及按钮初始化值
        $("#nickname").val(init_js.nickname);
        $("#name").val(init_js.name);
        $("#studentID").val(init_js.studentid);
        $("#Email").val(init_js.email);
        $("#address").val(init_js.address);
        $("#phone").val(init_js.phone);
        $("#brief").val(init_js.brief);
        $("#" + init_js.gender).iCheck('check');
        if(init_js.hidden_name=='true' ? true : false)
            $("#checkbox-11-2").val(true);
        else{
            $("#checkbox-11-2").val(false);
            $("#checkbox-11-2").attr('checked','checked');
        }
    }

    function CompHtml()
    {
        $(".info_container").append("<iframe class='iframe' name='Comp_frame' id='Comp_frame'   \
         src= '" + app_url + "/Home/Comp/Comp" + "' seamless='seamless' scrolling='no'   \
         onload='this.height=Comp_frame.document.body.scrollHeight' \
         onhaschange='this.height=Comp_frame.document.body.scrollHeight'></iframe>")                    
    }

})();


 /*$('#chart-area').mouseover = function (evt) {
     //var activePoints = myDoughnutChart.getSegmentsAtEvent(evt);
     alert('evrt');
     // => activePoints is an array of segments on the canvas that are at the same position as the click event.
 };*/

