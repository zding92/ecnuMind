// 全局变量，在abilityNew.js中还可以调用
var ability_json;
function ability() {
	var user_ability_json;
	
	// 获取能力的自我评价数据，用于显示弹出框里的自我评价，在InitAbilityChooser()里被调用
	function FillSelfComment(ability_name) {
		var handinPHP = "abilityName=" + ability_name;
		$.ajax({
            url: app_url + "/Custom/ability/getSelfComment",
            data: handinPHP,
            async: false,
            success: function (result) {
        		$(".abilityDetail").html(result);
            }
        });
		
	}
	
	// 添加个人新的能力
	$(".newAbilityIcon").click(function() {
		// 弹出新增能力框
		$('.theme-popover-mask').fadeIn(100);
		$('.new-popover').slideDown(200);
		//$('.addAbilityPopLine4 input').val("");
		// 关闭新增能力框
		$('.new-popover .close').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.new-popover').slideUp(200);
		});
		// 讲用户编辑的数据传送到后台
		$('.new-popover .popoutLine1Save').click(function(){
			var chosenField = $('#cmbProvince option:selected').html();
			var chosenDirection = $('#cmbCity option:selected').html();
			var addedAbility = $('.addAbilityName input').val();
			var abilitySelfComment = $('.addAbilityPopLine4 .abilityDetail').val();
			var handinPHP = "fieldName=" + chosenField +
							"&directionName=" + chosenDirection +
							"&abilityName=" + addedAbility + 
							"&selfComment=" + abilitySelfComment;
			$.ajax({
				url: app_url + "/Custom/ability/addAbility",
				data: handinPHP,
				async: false,
				success: function(result) {
					switch (result) {
					case 'add_success':
						break;
					case 'ability_exist':
						break;
					default:
						break;
					}
				}
			});
		});
	});
	
	// mixitup初始化 + 弹出框初始化，在getUserAbility()里被调用
	function InitAbilityChooser() {
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
	        // 已经有的能力要勾选
	        for (idx in user_ability_json)
	        	if (user_ability_json[idx]['ability_name'] == label_text)
	        		self.iCheck("check");
	    });
	   
	    $(function () {
	        $('#L3 :input').each(function () {
	        	$(this).parent().addClass($(this).attr('data-cat'));
	            $(this).parent().attr('data-cat', $(this).attr('data-cat'));
	            $(this).parent().css('display', 'inline-block');
	        })
	    });
	    
	    var filterList = {
	        init: function () {
	            // MixItUp plugin
	        	if ($('#L2').mixItUp('isLoaded'))
	        		$('#L2').mixItUp("destroy");
	            $('#L2').mixItUp({
	            	selectors: {
	            		target: '.tags_1',
	            		//filter: '#L1 .filter'
	            	},
	                animation: {
	            		duration: 300,
	                }
	            });
	        }
	    }.init();

	    var filterList2 = {
	        init: function () {
	            // MixItUp plugin
	        	if ($('#L3').mixItUp('isLoaded'))
	        		$('#L3').mixItUp("destroy");
	            $('#L3').mixItUp({
	            	selectors: {
	            		target: '.icheckbox_line-blue',
	            		//filter: '#L2 .filter'
	            	},
	                animation: {
	            		duration: 300
	                }
	            });
	        }
	    }.init();

	    // 关联第一级和第二级的能力
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
	            filters = $(this).hasClass('active') ? (filters + "." +  $(this).attr('id') + ",") : filters.replace(eval("/(,." + $(this).attr('id') + ")|(."+ $(this).attr('id') + ",)/"), "");
	            if (filters.charAt(filters.length - 1) === ',') {
	            	filters = filters.substring(0, filters.length-1);
	            }; 
	        }
	        $('#L2').mixItUp('filter', filters);
	        if (filters !== 'all' && filters !== '') {
	        	filters = filters + ',';
	        }
	        //$("#index").attr('data-filter', filters);
	        //setTimeout('$("#index").click()', 500);
	    })

	    // 关联第二级和第三级的能力
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
	            filters_2 = $(this).hasClass('active') ? (filters_2 + "." +  $(this).attr('id')) : filters_2.replace(eval("/(,." + $(this).attr('id') + ")|(."+ $(this).attr('id') + ",)/"), "");
	            if (filters_2.charAt(filters_2.length - 1) === ',') {
	            	filters_2 = filters_2.substring(0, filters_2.length-1);
	            };  
	        }
	        $('#L3').mixItUp('filter', filters_2);
	        if (filters_2 !== 'all' && filters_2 !== '') {
	        	filters_2 = filters_2 + ',';
	        }
	        //调试用div，可查看filters内容
	        //$("#index2").attr('data-filter', filters_2);
	        //        setTimeout('$("#index2").click()', 500);
	    });

	    var hasAbility = false;
	    var lastPickedCheckbox = '';//最后一次点击、操作的能力标签
	    var checkStateItem;
	    $(function(){//将获取最新的标签文字以及说明添加至页面中
	    	$("ins").click(function() {//点击能力标签后执行函数，能力标签被icheck转化为了ins标签
	        	checkStateItem = $(this).prev().prev();//获取要改变勾选状态的标签
	        	hasAbility = !(checkStateItem.is(':checked'));//在点击之前，当前的能力标签勾选的勾选情况（true表示被勾选）
	        	//点击能力标签之后，在未保存之前，不改变当前状态
	        	if (hasAbility == false)
	        		checkStateItem.iCheck('uncheck');
	        	else
	        		checkStateItem.iCheck('check');
	        	if (hasAbility == false){
	        		$('.popoutLine3RedText').addClass("line3Selected");
	        		$('.popoutLine3RedText').addClass("line3RedSelected");
	        		$('.popoutLine3GreenText').removeClass("line3Selected");
	        		$('.popoutLine3RedText').removeClass("line3RedUnselected");
	        		$('.popoutLine3GreenText').removeClass("line3GreenSelected");        		
	        		$('.popoutLine3RedText').html("<b>目前未掌握</b>（若已掌握该能力，请点击绿色按钮）");		
	        		$('.popoutLine3GreenText').html("√");
	        		$('.popoutLine3Green').animate({width:'100px'},"middle");
	        		$(".abilityDetail").html("");// 不具备的能力肯定没有自我评价
	        		document.getElementById("abilityDetail").disabled=true;//禁用输入框
	        	} 
	        	else{
	        		$('.popoutLine3GreenText').addClass("line3Selected");//表明绿色选中
	        		$('.popoutLine3GreenText').addClass("line3GreenSelected");//表明绿色选中
	        		$('.popoutLine3RedText').removeClass("line3Selected");//删除红色选中
	        		$('.popoutLine3RedText').removeClass("line3RedSelected");//删除红色选中
	        		$('.popoutLine3RedText').addClass("line3RedUnselected");//表明红色未选中			        		
	        		$('.popoutLine3GreenText').html("<b>目前已掌握</b>（若未掌握该能力，请点击红色按钮）");	
	        		$('.popoutLine3RedText').html("×");
	        		$('.popoutLine3Green').animate({width:'700px'},"middle");
	        		FillSelfComment($(this).parent().text());// 获取以前已经有的自我评价
	        	}
	        	
	        	//点击选择能力的标签，出现弹出框
	    		$('.theme-popover .popoutAblityName').text($(this).parent().text());
	    		$('.theme-popover-mask').fadeIn(100);
	    		$('.theme-popover').slideDown(200);
	    		
	            lastPickedCheckbox = $(this).parent().text();//获取最新点击的标签中的文字
	        });
	    })
			
		$('.theme-popover .close').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.theme-popover').slideUp(200);
		})
		
		//点击绿色区域，绿色区域滚动放大
		$('.popoutLine3Green').click(function(){
			hasAbility = true;
			$('.popoutLine3GreenText').addClass("line3Selected");//表明绿色选中
			$('.popoutLine3GreenText').addClass("line3GreenSelected");//表明绿色选中
			$('.popoutLine3RedText').removeClass("line3Selected");//删除红色选中
			$('.popoutLine3RedText').removeClass("line3RedSelected");//删除红色选中
			$('.popoutLine3RedText').addClass("line3RedUnselected");//表明红色未选中					
			$('.popoutLine3GreenText').html("<b>目前已掌握</b>（若未掌握该能力，请点击红色按钮）");	
			$('.popoutLine3RedText').html("×");
			$('.popoutLine3Green').animate({width:'700px'},"middle");
			document.getElementById("abilityDetail").disabled=false;//使能输入框	
		})
		
		//点击红色区域，红色区域滚动放大
		$('.popoutLine3Red').click(function(){
			hasAbility = false;
			$('.popoutLine3RedText').addClass("line3Selected");
			$('.popoutLine3RedText').addClass("line3RedSelected");
			$('.popoutLine3GreenText').removeClass("line3Selected");
			$('.popoutLine3RedText').removeClass("line3RedUnselected");
			$('.popoutLine3GreenText').removeClass("line3GreenSelected");		
			$('.popoutLine3RedText').html("<b>目前未掌握</b>（若已掌握该能力，请点击绿色按钮）");		
			$('.popoutLine3GreenText').html("√");
			$('.popoutLine3Green').animate({width:'100px'},"middle");
			document.getElementById("abilityDetail").disabled=true;//禁用输入框
			$('.abilityDetailCover').css("display","none");//不显示遮罩
		})
		
		//点击弹窗详细能力遮罩，激活textarea开始编辑
		$('.abilityDetailCover').click(function(){
			//点击弹窗之后，使弹窗消失
			$('.abilityDetailCover').css("display","none");
			
			//弹窗消失之后，textarea获得焦点
			document.getElementById("abilityDetail").focus();		
	        if(hasAbility == true){//若选择了该项能力
	            document.getElementById("abilityDetail").disabled=false;//使能输入框
	        }
	        else{//若未选择该项能力      
	           	document.getElementById("abilityDetail").disabled=true;//禁用输入框
	        } 
		})
		
		
		//鼠标移入textarea，显示遮罩提示
		$('.abilityDetailContainer').mouseenter(function(){	
			//若能力激活，且textarea没有在编辑状态下，显示提示遮罩
			if ((hasAbility == true)&&(!$(":focus").hasClass('abilityDetail')))	$('.abilityDetailCover').css("display","block");
		})
		
		$('.abilityDetailCover').mouseleave(function(){
			//鼠标立刻能力说明范围，提示遮罩消失
			$('.abilityDetailCover').css("display","none");
		})

		//点击更新能力的保存按钮
		$('.theme-popover .popoutLine1Save').click(function(){
	        //取出能力说明框中的内容
	        var abilityDetail = $(".abilityDetail").val();

	        //判断其是否为默认值，若是默认值，则能力说明框中的值为null
	        if (abilityDetail == "在此添加经历或认证，进一步说明此项能力")
	            abilityDetail = "";
	        
	        var json2selfCommentPHP = 
	        			'abilityName=' + lastPickedCheckbox +
	        			'&selfComment='+ abilityDetail + 
	        			'&hasAbility=' + hasAbility;
	        
//		        alert(app_url);
	        
	        $.ajax({//将用户名以及最新点击的能力标签返回给后台，后台处理后，返回给前台此标签对应的selfComment，并显示
	            url: app_url + "/Custom/ability/checkAbility" ,//处理此功能的PHP地址，其值在ability.html中全局引用
	            data : json2selfCommentPHP,//交给PHP处理的输入数据
	            type: "POST", //请求方式
	            async: false,
	            success: function (result) {
	            	switch (result) {
					case 'insert_success':
						break;
					case 'update_success':
						break;
					case 'delete_success':
						break;
					default:
						break;
					}
	            	//$(".abilityDetail").val(selfCommentData.selfComment);
	            	//alert(selfCommentData.selfComment);
	            }
	        });
	        if (hasAbility == false)
	    		checkStateItem.iCheck('uncheck');
	    	else
	    		checkStateItem.iCheck('check');
	        
	    });
	};

	$(document).ready(function() {
		
		// 获取当前用户的已有能力
		function getUserAbility() {
			$.ajax({
	            url: app_url + "/Custom/ability/getAbility" ,
	            async: false,
	            dataType: 'JSON',
	            success: function (result) {
	            	user_ability_json = result;
	            	// mixitup初始化 + 弹出框初始化
	            	InitAbilityChooser();
	            }
	        });
		}
		
		// js代码从这里开始执行，请求后台生成json格式的数据
		$.ajax({url: app_url + "/Custom/Ability/genDB",
			type: "GET",
	        async:false,
	        dataType: 'JSON',
	        success: function(result) {
	        	ability_json = result;
	        	var cnt1 = new Number(1);
	            for (l1 in ability_json) {
	            			
		            var obj1 = $("<div></div>");
					obj1.attr("id", "L1_" + cnt1.toString());
					obj1.addClass("tags hvr-radial-out");
					obj1.html(l1);
					obj1.appendTo("#L1");
					
					var cnt2 = new Number(1);
					for (l2 in ability_json[l1]) {
						
						var obj2 = $("<div></div>");
						obj2.attr("id", "L1_" + cnt1.toString() + "_" + cnt2.toString());
						obj2.attr("data-cat", "L1_" + cnt1.toString());
						obj2.addClass("tags_1 " + "L1_" + cnt1.toString() + " hvr-radial-out");
						obj2.html(l2);
						obj2.appendTo("#L2");
						
						for (l3 in ability_json[l1][l2]) {
							var obj3 = $("<input type='checkbox' class='hvr-radial-out'>");
							obj3.addClass("L1_" + cnt1.toString() + "_" + cnt2.toString());
							obj3.attr("data-cat", "L1_" + cnt1.toString() + "_" + cnt2.toString());
		    				obj3.appendTo("#L3");
							var label = $("<label></label>");
							label.html(ability_json[l1][l2][l3]["name"]);
							label.appendTo("#L3");
						}
						cnt2 = cnt2 + 1;
					}
					cnt1 = cnt1 + 1;
	            }
	        }
		});
		$('<div id="index" class="filter" style="display:none"></div>').appendTo('#L1');
		$('<div id="index2" class="filter" style="display:none"></div>').appendTo('#L2');
		getUserAbility();
	});

}
