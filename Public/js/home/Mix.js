$(function () {
	
    $('#L3 :input').each(function () {
        var self = $(this),
        label = self.next(),
        label_text = label.text();
        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
    
    $(function () {
        $('#L3 :input').each(function () {
            $(this).parent().addClass($(this).attr('data-cat'));
            $(this).parent().attr('data-cat', $(this).attr('data-cat'));
            $(this).parent().css('display', 'inline-block');
        })
    })
    
        var filterList = {
        init: function () {
            // MixItUp plugin
            $('#L2').mixItUp({
            	selectors: {
            		target: '.tags_1',
            		//filter: '#L1 .filter'
            	},
            	load: {
            		filter: 'all'
            	},
                animation: {
            		duration: 200,
            		effects: 'fade',
            		easing: 'ease'
            }
            });
        }
    }.init();

    var filterList2 = {
        init: function () {
            // MixItUp plugin
            $('#L3').mixItUp({
            	selectors: {
            		target: '.icheckbox_line-blue',
            		//filter: '#L2 .filter'
            	},
            	load: {
            		filter: 'all'
            	},
                animation: {
            		duration: 200,
            		effects: 'fade',
            		easing: 'ease'
                }
            });
        }
    }.init();

    var filters = "";
    $('.tags').click(function () {
        if ($(this).attr('id') == "L1_all") {
            $("#L1_all ~ div").removeClass('active');
            $(this).addClass('active');
            filters = "all";
        } else {
            filters = filters.replace(/all/, "");
            $("#L1_all").removeClass('active');
            $(this).toggleClass('active');
            filters = $(this).hasClass('active') ? (filters + "." +  $(this).attr('id') + ",") : filters.replace(eval("/." + $(this).attr('id') + ",*/"), "");
        }
        $('#L2').mixItUp('filter', filters);
        //$("#index").attr('data-filter', filters);
        //setTimeout('$("#index").click()', 500);
    })

    var filters_2 = "";
    $('.tags_1').click(function () {
        if ($(this).attr('id') == "L2_all") {
            $("#L2_all ~ div").removeClass('active');
            $(this).addClass('active');
            filters_2 = "all";
        } else {
            filters_2 = filters_2.replace(/all/, "");
            $("#L2_all").removeClass('active');
            $(this).toggleClass('active');
            filters_2 = $(this).hasClass('active') ? (filters_2 + "." +  $(this).attr('id') + ",") : filters_2.replace(eval("/." + $(this).attr('id') + ",*/"), "");
        }
        alert(123);
        $('#L3').mixItUp('filter', filters_2);
        //调试用div，可查看filters内容
        //$("#index2").attr('data-filter', filters_2);
//        setTimeout('$("#index2").click()', 500);
    })

    var index = 1;
    var last = 1;
    $(function () {
        $('.tags_1').each(function () {
            if ($(this).attr('id') !== "L2_all") {
                if ($(this).attr('data-cat')[3] == last.toString()) {
                    $(this).attr('id', $(this).attr('data-cat') + '_' + index);
                    index++;
                } else {
                    last++;
                    index = 1;
                    $(this).attr('id', $(this).attr('data-cat') + '_' + index);
                }
            }
        })
    });

    var lastPickedCheckbox = '';//最后一次点击、操作的能力标签
    $(function(){//将获取最新的标签文字以及说明添加至页面中
        $("ins").click(function() {//点击能力标签后执行函数，能力标签被icheck转化为了ins标签
            lastPickedCheckbox = $(this).parent().text();//获取最新点击的标签中的文字
            if($(this).parent().children("input").attr("checked") == 'checked'){//若选择了该项能力
                $(".headAbilityDetail").text("在此添加经历或认证,为您的"+lastPickedCheckbox+"能力添加详细说明");//将获取最新的标签文字以及说明添加至页面中
                document.getElementById("abilityDetail").disabled=false;//使能输入框
            }
            else{//若未选择该项能力
               	$(".headAbilityDetail").text("请先添加"+lastPickedCheckbox+"能力，再添加详细说明");//将获取最新的标签文字以及说明添加至页面中
               	document.getElementById("abilityDetail").disabled=true;//禁用输入框
            } 
        });
    })
    
})();