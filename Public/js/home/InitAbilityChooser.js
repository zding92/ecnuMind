// 全局变量，在abilityNew.js中还可以调用
var ability_json;

/**
 * tooltip显示错误内容
 * @param selector 何处显示错误(id名称)
 * @param errorInfo 错误信息
 */
function indexShowTooltip(selector,errorInfo){
	var tips = $("#"+selector);
	if (tips.tooltipster() != null)
		tips.tooltipster("destroy");
	$("#"+selector).attr("title",errorInfo);
	$("#"+selector).tooltipster({
		trigger: 'custom',
		theme: 'tooltipster-noir',
		position: 'right'
	});
	// show a tooltip (the 'callback' argument is optional)
	$("#"+selector).tooltipster('show',function(){
		setTimeout(function(){
			$("#"+selector).tooltipster('hide');
		},2000)
	});
}

function ability() {
	var user_ability_json;
	//判断用户当前点击的能力时，是否已经具备该能力
	var hasAbility = false;
	//最后一次点击、操作的能力标签
    var lastPickedCheckbox = '';
    //当前点击的能力
    var checkStateItem;
	
	/*
	 * 限制个人能力描述输入字数为100字
	 */
	 $("#newAbilityDetail").keyup(function detailCommentTextCount(){
		//如果当前输入字数超过100字，截断多余的字并弹窗。
		//否则显示当前剩余字数
		var abilitySelfCommentLength = $('#newAbilityDetail').val().length;
		if(abilitySelfCommentLength > 100){
			var currentComment = $('#newAbilityDetail').val().slice(0,100);
			$('#newAbilityDetail').val(currentComment);
			myAlert("多余的字会被截断");
			$("#selfDetailTextCount").text(0);
		}
		else {
			$("#selfDetailTextCountNew").text(100 - $('#newAbilityDetail').val().length);
		}
	});
	 /*
	  * 限制个人能力描述输入字数为100字
	  */
	 $("#abilityDetail").keyup(function detailCommentTextCount(){
			var abilitySelfCommentLength = $('#abilityDetail').val().length;
			//如果当前输入字数超过100字，截断多余的字并弹窗。
			//否则显示当前剩余字数
			if(abilitySelfCommentLength > 100){
				var currentComment = $('#abilityDetail').val().slice(0,100);
				$('#abilityDetail').val(currentComment);
				myAlert("多余的字会被截断");
				$("#selfDetailTextCount").text(0);
			}
			else {
				$("#selfDetailTextCount").text(100 - $('#abilityDetail').val().length);
			}
		});
	 
	function abilityResize() {
		$("#Ability_frame",parent.document).css("height",$("body").height() + "px");
	}
	
	/* 获取能力的自我评价数据
	 * 用于显示弹出框里的自我评价
	 * 在InitAbilityChooser()里被调用
	 */
	function fillAbilityEditInfo(ability_name, newSelfComment) {
		var handinPHP = "abilityName=" + ability_name;
		$.ajax({
            url: app_url + "/Custom/ability/getAbilityEditInfo",
            data: handinPHP,
            success: function (result) {
            	eval(result);
            	$(".popoutLine2Line1 b").html(peopleCount + "人");
            	$(".popoutLine2Line2 b").html(abilityTag.substr(1, abilityTag.length - 2));
            	if (newSelfComment == "")
            		$(".theme-popover .abilityDetail").val(selfComment);
            	else
            		$(".theme-popover .abilityDetail").val(newSelfComment);
            	//当点击能力标签且用户拥有该能力时，刷新selfComment的剩余字数
        		$("#selfDetailTextCount").text(100 - selfComment.length);	
        		$(".selfDetailTextCount").show();  
            }
        });
	}
	
	/*
	 * 初始化能力框
	 */
	function initAbilityFrame(selector, newSelfComment) {
		//将获取最新的标签文字以及说明添加至页面中
	    $(selector).click(function() {//点击能力标签后执行函数，能力标签被icheck转化为了ins标签
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
	    		$('.popoutLine3Red').css("cursor","default");
	    		$('.popoutLine3Green').css("cursor","pointer");
	       		$('.popoutLine3Green').animate({width:'100px'},"fast",function(){
	        		$('.popoutLine3RedText').html("<b>目前未掌握</b>（若已掌握该能力，请点击绿色按钮）");		
		        	$('.popoutLine3GreenText').html("√");
	        		$('.selfDetailTextCount').hide();
		        	$(".abilityDetail").val("");// 不具备的能力肯定没有自我评价
		        	document.getElementById("abilityDetail").disabled=true;//禁用输入框
	        	});
	        } 
	        else{
	        	document.getElementById("abilityDetail").disabled=false;//使用输入框
	        	$('.popoutLine3GreenText').addClass("line3Selected");//表明绿色选中
	        	$('.popoutLine3GreenText').addClass("line3GreenSelected");//表明绿色选中
	        	$('.popoutLine3RedText').removeClass("line3Selected");//删除红色选中
	        	$('.popoutLine3RedText').removeClass("line3RedSelected");//删除红色选中
	        	$('.popoutLine3RedText').addClass("line3RedUnselected");//表明红色未选中		
	    		$('.popoutLine3Green').css("cursor","default");
	    		$('.popoutLine3Red').css("cursor","pointer");
	        	$('.selfDetailTextCount').show();
	        	$('.popoutLine3Green').animate({width:'700px'},"fast",function(){
	        		$('.popoutLine3GreenText').html("<b>目前已掌握</b>（若未掌握该能力，请点击红色按钮）");	
	        		$('.popoutLine3RedText').html("×");
	       		});
	       	}
        	
	       	//点击选择能力的标签，出现弹出框
	       	fillAbilityEditInfo($(this).parent().text(), newSelfComment);
	  		$('.theme-popover .popoutAbilityName').text($(this).parent().text());
	 		$('.theme-popover-mask').fadeIn(100);
	 		$('.theme-popover').slideDown(200);
	    		
	        lastPickedCheckbox = $(this).parent().text();//获取最新点击的标签中的文字
	    });
	}
	
	/*
	 * 编辑能力框
	 */
	function editAbility() {
	    $('.theme-popover .close').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.theme-popover').slideUp(200);
		})
		
		//点击绿色区域，绿色区域滚动放大
		$('.popoutLine3Green').click(function(){
			hasAbility = true;
			if ($('.popoutLine3GreenText').hasClass("line3Selected")) return;
			$('.popoutLine3GreenText').addClass("line3Selected");//表明绿色选中
			$('.popoutLine3GreenText').addClass("line3GreenSelected");//表明绿色选中
			$('.popoutLine3RedText').removeClass("line3Selected");//删除红色选中
			$('.popoutLine3RedText').removeClass("line3RedSelected");//删除红色选中
			$('.popoutLine3RedText').addClass("line3RedUnselected");//表明红色未选中					
			$('.popoutLine3RedText').html("×");
			$('.popoutLine3GreenText').html("");
			$('.selfDetailTextCount').show();
			$('.popoutLine3Green').css("cursor","default");
			$('.popoutLine3Red').css("cursor","pointer");
			$('.popoutLine3Green').animate({width:'700px'},"fast",function(){
				$('.popoutLine3GreenText').html("<b>目前已掌握</b>（若未掌握该能力，请点击红色按钮）");
				document.getElementById("abilityDetail").disabled=false;//使能输入框
			});
				
		})
		
		//点击红色区域，红色区域滚动放大
		$('.popoutLine3Red').click(function(){
			hasAbility = false;
			if ($('.popoutLine3RedText').hasClass("line3Selected")) return;
			$('.popoutLine3RedText').addClass("line3Selected");
			$('.popoutLine3RedText').addClass("line3RedSelected");
			$('.popoutLine3GreenText').removeClass("line3Selected");
			$('.popoutLine3RedText').removeClass("line3RedUnselected");
			$('.popoutLine3GreenText').removeClass("line3GreenSelected");		
			$('.popoutLine3GreenText').html("√");
			$('.popoutLine3RedText').html("");
			$('.selfDetailTextCount').hide();
			$('.popoutLine3Red').css("cursor","default");
			$('.popoutLine3Green').css("cursor","pointer");
			$('.popoutLine3Green').animate({width:'100px'},"fast",function(){
				$('.popoutLine3RedText').html("<b>目前未掌握</b>（若已掌握该能力，请点击绿色按钮）");		
				document.getElementById("abilityDetail").disabled=true;//禁用输入框
			});
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
	        	        
	        $.ajax({//将用户名以及最新点击的能力标签返回给后台，后台处理后，返回给前台此标签对应的selfComment，并显示
	            url: app_url + "/Custom/ability/checkAbility" ,//处理此功能的PHP地址，其值在ability.html中全局引用
	            data : json2selfCommentPHP,//交给PHP处理的输入数据
	            type: "POST", //请求方式
	            async: false,
	            success: function (result) {
	            	switch (result) {
					case 'insert_success':
						window.location.reload(true);
						break;
					case 'update_success':
						window.location.reload(true);
						break;
					case 'delete_success':
						window.location.reload(true);
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
	}
	
	/*
	 * 添加新的能力
	 */
	function addNewAbility(abilityInfo) {
		swal({
			title: "您确定要添加吗？", 
			//text: "您确定要添加这项能力？", 
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "是的，我要添加",
			confirmButtonColor: "#ec6c62",
			cancelButtonText: "不，我不添加"
			},
			function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: app_url + "/custom/Ability/addAbility",
						type: "GET",
						data: abilityInfo,
						async: false,
						success: function(result) {
							$('.theme-popover-mask').fadeOut(100);
							switch (result) {
								case 'add_success':
									//swal("操作成功!", "已成功添加！", "success");
									setTimeout(function() {
										window.location.reload(true);
									} , 100);
									break;
								default:
									swal("OMG", "添加失败了!", "error");
									$('.theme-popover-mask').fadeOut(100);
									break;
							}
						}
					});
				}
				else {
					$('.recommend-popover').slideUp(200);
					$('.theme-popover-mask').fadeOut(100);
				}
			});
	}
	
	/*
	 * 推荐能力的框
	 */
	function recommendFrame(result, abilitySelfComment, judgeData) {
		for (var index in result) {	
			var obj = $("<input type='checkbox' class='hvr-radial-out'>");
			obj.appendTo(".similarAbilityGallery");
			var label = $("<label></label>");
			label.html(result[index]);
			label.appendTo(".similarAbilityGallery");
		}
		$('.similarAbilityGallery :input').each(function () {
			var self = $(this),
		    label = self.next(),
		    label_text = label.text();
		    label.remove();
		    self.iCheck({
		        checkboxClass: 'icheckbox_line-blue',
		        radioClass: 'iradio_line-blue',
		        insert: '<div class="icheck_line-icon"></div>' + label_text
		    });
		    self.parent().css('display', 'inline-block');
            self.parent().css('font-family', '微软雅黑');
		    // 已经有的能力要勾选
		    for (idx in user_ability_json)
		    	if (user_ability_json[idx]['ability_name'] == label_text)
		    		self.iCheck("check");
		});
		$('.recommend-popover').slideDown(200);
		
		initAbilityFrame(".similarAbilityGallery ins", abilitySelfComment);
		
		$(".similarAbilityPopLine1Right .popoutLine1Cancel").click(function() {
			$('.recommend-popover').slideUp(200);
			$('.theme-popover-mask').fadeOut(100);
		});
		
		$('.oldAbilityButton').click(function() {
			addNewAbility(judgeData);
		});
	}
	
	/* 
	 * 添加个人新的能力
	 */
	$(".newAbilityIcon").click(function() {
		// 弹出新增能力框
		$('.theme-popover-mask').fadeIn(100);
		$('.new-popover').slideDown(200);
		$('#newAbilityName').val("");
		$('.addAbilityPopLine4 .abilityDetail').val("");
		// 关闭新增能力框
		$('.new-popover .popoutLine1Cancel').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.new-popover').slideUp(200);
		});
		// 将用户编辑的数据传送到后台
		$('.new-popover .popoutLine1Save').click(function(){
			var chosenField = $('#cmbProvince option:selected').html();
			var chosenDirection = $('#cmbCity option:selected').html();
			var addedAbility = $('.addAbilityName input').val();
			var abilitySelfComment = $('.addAbilityPopLine4 .abilityDetail').val();
			var judgeData = "fieldName=" + chosenField +
							"&directionName=" + chosenDirection +
							"&abilityName=" + addedAbility + 
							"&selfComment=" + abilitySelfComment;
			//判断是否有重复添加能力或者添加了空能力
			$.ajax({
				url: app_url + "/custom/Ability/judgeAbility",
				type: "GET",
				data: judgeData,
				success: function(result){
					switch(result) {
						case 'ability_empty':
							indexShowTooltip('newAbilityName','能力名不能为空');
							break;
						case 'ability_exist':
							indexShowTooltip('newAbilityName', '能力已经存在')
							break;
						case 'ability_normal':
							$.ajax({
								url: app_url + "/custom/Ability/searchAbilityByText",
								type: "GET",
								data: "searchText=" + $('#newAbilityName').val(),
								success: function(result){
										$('.new-popover').slideUp(200);
										if (result != null) {
											recommendFrame(result, abilitySelfComment, judgeData);
										}
										else{
											addNewAbility(judgeData);
										}
									}
							});
							break;
					}
				}
			});
		});

	});
	
	/*
	 * mixitup初始化 + 弹出框初始化，在getUserAbility()里被调用
	 */ 
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
	            $(this).parent().css('font-family', '微软雅黑');
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
	                },
	                callbacks: {
	            		onMixEnd: function(state){
	            		    abilityResize();

	            		}	
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
	                },
	                callbacks: {
	            		onMixEnd: function(state){
	            		    abilityResize();
	            		}	
	            	}
	            });
	        }
	    }.init();

		/*
		 * 关联第一级和第二级的能力
		 */ 
	    $('.tags').click(function () {
	    	
	    	var filter12 = "";
	    	var preState = $(this).hasClass('active');

            if ($(this).attr('id') == "L1_all") {
	            filter12 = "all";
		    	$('.tags').removeClass('active'); 			// 同一级的所有部分，取消选择
	            $('.tags_1').removeClass('active'); 		// 下一级的所有内容，取消选择
	            $('#L2_all').addClass('active');			// 选中下一级的“全部”
	            $(this).addClass('active');					// 选中同一级的“全部”
	        }
	        else if (!preState) {
	            filter12 = "." +  $(this).attr('id') + ",.L2_all";
		    	$('.tags').removeClass('active'); 			// 同一级的所有部分，取消选择
	            $('.tags_1').removeClass('active'); 		// 下一级的所有内容，取消选择
	            $('#L2_all').addClass('active');			// 选中下一级的“全部”
	            $(this).addClass('active');					// 选中同一级的“全部”
	        }
            
            if (filter12 != "") {
                $('#L2').mixItUp('filter', filter12);
    	        $('#L3').mixItUp('filter', filter12);
            }
	    });
	    
	    /*
	     * 关联第二级和第三级的能力
	     */
	    $('.tags_1').click(function() {
	    	var filter23 = "";
	    	var preState = $(this).hasClass('active');
	    	if ($(this).attr('id') == "L2_all") {
	            $(".tags_1").removeClass('active');
	            $(this).addClass('active');
	            // 如果第一级勾选了“全部”
	            if ($('#L1_all').hasClass('active'))
	            	filter23 = "all";
	            // 如果第一级勾选了某一个领域
	            else {
	            	$('#L1_all ~ div').each(function() {
	            		if ($(this).hasClass('active')) {
	            			filter23 = "." + $(this).attr('id');
	            		}
	            	});
	            }
		        $('#L3').mixItUp('filter', filter23);
	    	}
	        else if (!preState) {
	            $(".tags_1").removeClass('active');
	            $(this).addClass('active');
	            filter23 = "." +  $(this).attr('id');
	    	    $('#L3').mixItUp('filter', filter23);
	        }
	    });
	    initAbilityFrame("ins", "");
	    editAbility();
	};

	$(document).ready(function() {
		
		var abilityLoaded = false;

		// 获取当前用户的已有能力
		function getUserAbility() {
			$.ajax({
	            url: app_url + "/Custom/ability/getAbility" ,
	            async: false,
	            dataType: 'JSON',
	            success: function (result) {
	            	abilityLoaded = true;
	            	user_ability_json = result;
	            	// mixitup初始化 + 弹出框初始化
	        		InitAbilityChooser();

        		    $(".loading").css("display", "none");
	        		$(".ability_container").css("display", "block");
	            	addressInit('cmbProvince', 'cmbCity', 'cmbArea', '陕西', '宝鸡市', '金台区');
	            }
//	            complete:function (result) {
//	            	if (!abilityLoaded) {
//	            		alert(2);
//	            		getUserAbility();
//	            	}
//	            }
	        });
		}
		
		// js代码从这里开始执行，请求后台生成json格式的数据
		$.ajax({url: app_url + "/Custom/Ability/genDB",
			type: "GET",
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
							obj3.attr("data-cat", "L1_" + cnt1.toString() + " L1_" + cnt1.toString() + "_" + cnt2.toString());
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

		setTimeout(function() {
			getUserAbility();
		}, 300);
	});

}
