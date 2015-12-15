/**
 * This js is for the using of searchPeople Page
 */

var allAcademy;
var allSelectedAbility = new Array();
var selectedUser = new Array();
var RecipientIndex;
var RecipientId;

function autoResize() {
	$("#SearchPeople_frame",parent.document).css("height",$("body").height() + "px");
};

function initToolTip(){
	$('.tooltip').tooltipster({
		theme: 'tooltipster-noir'
	});
};

function showHotAbility(){
	// 向后台请求所有的热门能力，并显示
	$.ajax({url: app_url + "/Custom/SearchPeople/getHotAbility",
		type: "GET",
        success: function(result) {
        	var directionCnt = 0;
        	for (directionCnt in result){
        		$(".abilitySearchBox #L3").append('<div class="searchTag abilityTag">'+result[directionCnt]+'</div>');
        	}
        	result.slice(0,result.length);
        }
	});
}

function showHotDirectionAndAbility(){
	$.ajax({url: app_url + "/Custom/SearchPeople/getHotDirection",
		type: "GET",
        success: function(result) {
        	var directionCnt = 0;
        	for (directionCnt in result){
        		$(".abilitySearchBox #L2").append('<div class="searchTag directionTag">'+result[directionCnt]+'</div>');
        	}        	
        	showHotAbility();
        	result.slice(0,result.length);
        }
	});
}

/***
 * 在selector中选择一个tag处于TagActive状态
 * @param selector 选择某一个selector处于只能单选TagActive状态
 * @param parentSelector selector的父节点selector
 */
function allowSingalChoose(selector, parentSelector){
	$(parentSelector).on("click", selector, function() {
		//让所有的selector只能一个选中
		if($(this).hasClass('TagActive')){
			$(this).removeClass('TagActive');
		}
		else{
			$(selector).each(function(){
				$(this).removeClass('TagActive');
			});
			$(this).addClass('TagActive');
		}
		
	});
}

/***
 * 在selector中选择一个tag处于TagActive状态
 * @param selector 选择某一个selector处于只能单选TagActive状态
 * @param parentSelector selector的父节点selector
 */
function allowMultiChoose(selector, parentSelector){
	$(parentSelector).on("click", selector, function() {
		//让所有的selector只能一个选中
		if($(this).hasClass('TagActive')){
			$(this).removeClass('TagActive');
		}
		else{
			$(this).addClass('TagActive');
		}
	});
}

/**
 * 初始化所有的点击事件，由于使用了Jquery的 On动态绑定方法，所以无需在新加标签后重新绑定这些标签的事件
 */
function initClickEvent() {
	// 设置哪些种类的标签可以被单选
	allowSingalChoose(".majorTag", ".majorTags");
	allowSingalChoose(".directionTag", ".directionTags");
	allowSingalChoose(".departmentTag", ".departmentTags");
	allowSingalChoose(".academyTag", ".academyTags");
	allowSingalChoose(".fieldTag", ".fieldTags");
	
	// 设置哪些种类的标签可以被多选
	allowMultiChoose(".abilityTag", ".abilityTags");
	
	// 点击学院，显示系别
	$(".academyTags").on("click", ".academyTag", function(){
		$.ajax({
			url:app_url + "/Custom/SearchPeople/getDepartment",
			type:"GET",
			data:"aimedAcademy="+$(this).text(),
			success:function(result){
				loadDepartment(result);
			}
		});	
	})
	
	//点击系别，显示专业
	$(".departmentTags").on("click", ".departmentTag", function(){
		$.ajax({
			url:app_url + "/Custom/SearchPeople/getMajor",
			type:"GET",
			data:"aimedDepartment="+$(this).text(),
			success:function(result){
				loadMajor(result);
			}
		});
	})
	
	// 点击专业，添加入搜索条件
	$(".majorTags").on("click", ".majorTag", function(){
		var clickOne = $(this);
		$(".selectedConditionRow").append('<div class="selectedTags fromMajors">'+$(this).text()+'×</div>');
	});
	
	// 点击领域
	$(".fieldTags").on("click", ".fieldTag", function(){	
		// 如果是选中filed，则载入选中field对应的方向和能力
		if($(this).hasClass("TagActive")){
			var selectedFieldName = $(this).html();
			$.ajax({
				url:app_url + "/Custom/SearchPeople/getSelectedDirectionAndAbility",
				type:"GET",
				data:"selectedFieldName=" + selectedFieldName,
				success:function(result){
					$(".abilitySearchBox #L2").empty();	
					$(".abilitySearchBox #L3").empty();	
					var directionCnt = 0;
					var abilityCnt = 0;
		        	for (directionCnt in result[0]){
		        		$(".abilitySearchBox #L2").append('<div class="searchTag directionTag">'+result[0][directionCnt]+'</div>');
		        	}
		        	for (abilityCnt in result[1]){
		        		$(".abilitySearchBox #L3").append('<div class="searchTag abilityTag">'+result[1][abilityCnt]+'</div>');
		        	}
				}
			});
		}
		else{
			$(".abilitySearchBox #L2").empty();	
			$(".abilitySearchBox #L3").empty();	
			$(".abilitySearchBox #L2").append('<div class="titleTag">热门方向：</div>');
			$(".abilitySearchBox #L3").append('<div class="titleTag">热门能力：</div>');
			showHotDirectionAndAbility();
		}
	})
	
	// 点击方向
	$('.directionTags').on("click", ".directionTag", function(){
		if($(this).hasClass('TagActive')){

			var selectedDirectionName = $(this).html();
			$.ajax({
				url:app_url + "/Custom/SearchPeople/getSelectedAbility",
				type:"GET",
				data:"selectedDirectionName=" + selectedDirectionName,
				success:function(result){
					$(".abilitySearchBox #L3").empty();	
					
					//若点击的direction Tag已经是选择条件（已经在allSelectedDirection中）
					//if (jQuery.inArray(selectedDirectionName, allSelectedAbility)!=-1){
					if (jQuery.inArray(selectedDirectionName, allSelectedDirection)!=-1){
						//在ability栏中添加“添加所有XXX领域能力",其allDirectionVal属性为其direction,并添加TagActive
						$(".abilitySearchBox #L3").append('<div class="TagActive searchTag abilityTag allDirectionActive" allDirectionVal='+selectedDirectionName+'>添加所有'+selectedDirectionName+'领域能力</div>');
					}
					else{
						//在ability栏中添加“添加所有XXX领域能力",其allDirectionVal属性为其direction
						$(".abilitySearchBox #L3").append('<div class="searchTag abilityTag allDirectionActive" allDirectionVal='+selectedDirectionName+'>添加所有'+selectedDirectionName+'领域能力</div>');
					}
					
					var abilityCnt = 0;
					for (abilityCnt in result){
						//若欲添加的ability已经在allSelectedAbility中了
						if(jQuery.inArray(result[abilityCnt], allSelectedAbility)!=-1){
							$(".abilitySearchBox #L3").append('<div class="searchTag abilityTag TagActive">'+result[abilityCnt]+'</div>');
						}
						else{
							$(".abilitySearchBox #L3").append('<div class="searchTag abilityTag">'+result[abilityCnt]+'</div>');
						}
					}
				}
			});
		}
		else {
			$(".abilitySearchBox #L3").empty();
			$(".abilitySearchBox #L3").append('<div class="titleTag">热门能力：</div>');
			showHotAbility();
		}	
	})
	
	//点击能力
	$(".abilityTags").on("click", ".abilityTag", function(){
		//欲激活ability Tag
		if($(this).hasClass('TagActive')){
			//如果是选中了添加全部direction能力
			if($(this).hasClass('allDirectionActive')){
				//选中了添加全部direction能力，将此direction写入allSelectedDirection数组
				//allSelectedAbility.push($(this).attr("allDirectionVal"));	
				allSelectedDirection.push($(this).attr("allDirectionVal"));	
				
				//将平级的非“选中全部”的tag取消激活状态
				$(this).siblings(":not(.allDirectionActive)").removeClass("TagActive");
				
				
				//点中选择所有能力后，删除所属于此direction的ability
				$(this).siblings(":not(.allDirectionActive)").each(function(){
					if($.inArray($(this).html(),allSelectedAbility)!=-1){	
						//使平级的选中所属所有ability从allSelectedAbility数组中删除
						allSelectedAbility.splice($.inArray($(this).html(),allSelectedAbility),1);
						//去除allSelectedAbility的空项
						allSelectedAbility = DelNullInArray(allSelectedAbility);
					}
				})
			}
			
			//如果是选中了非添加全部direction能力
			else{
				//使平级的选中所属所有direction处于非激活状态
				$(this).siblings(".allDirectionActive").removeClass("TagActive");
				
				
				//var DirPosInArray = $.inArray($(this).siblings(".allDirectionActive").attr("alldirectionval"),allSelectedAbility)
				var DirPosInArray = $.inArray($(this).siblings(".allDirectionActive").attr("alldirectionval"),allSelectedDirection)
				
				if (DirPosInArray!=-1)
				{
					//使平级的选中所属所有direction从allSelectedDirection数组中删除
					allSelectedDirection.splice(DirPosInArray,1);
				}
				
				//去除selectedDirection的空项
				allSelectedDirection = DelNullInArray(allSelectedDirection);
				
//				//将选中的能力添加入allSelectedAbility数组
				allSelectedAbility.push($(this).html());
//				alert(allSelectedAbility);
			}
			
			$("#resultContainer").empty();
		}
		//欲取消激活ability Tag
		else{
			//如果是选中了添加全部direction能力
			if($(this).hasClass('allDirectionActive')){
				//将选中的Direction从allSelectedDirection删除
				if($.inArray($(this).attr("allDirectionVal"),allSelectedDirection)!=-1){
					allSelectedDirection.splice($.inArray($(this).attr("allDirectionVal"),allSelectedDirection),1);
				}
				//去除selectedDirection的空项
				allSelectedDirection = DelNullInArray(allSelectedDirection);	
			}
			//如果是选中了非添加全部direction能力
			else{
				
				if($.inArray($(this).html(),allSelectedAbility)!= -1){
					//将选中的ability从allSelectedAbility删除
					allSelectedAbility.splice($.inArray($(this).html(),allSelectedAbility),1);
					//去除selectedDirection的空项
					allSelectedAbility = DelNullInArray(allSelectedAbility);
				}
			}
			
		}
		
		addAllDirection();
		addAllAbility();
	})
	
	// 点击已选条件中.fromAcadem的tag取消他们
	$(".selectedConditionRow").on("click", ".fromAcademy", function(){
//		var selectedTagsText = $(this).text();
		$(this).remove();
		
		// 故而触发自定义事件事件，进行query
		$(".selectedConditionRow").trigger("ManifyChanged");
		
//		//如果majorTags中存在欲点击删除的Tag,删除此majortag中的TagActive类
//		$("#majorTags").children().each(function(){
//			if (($(this).text()+'×') == selectedTagsText){
//				$(this).removeClass("TagActive");
//			}
//		});	
	});
	
	// 点击已选条件中.fromAbility的tag取消他们
	$(".selectedConditionRow").on("click", ".fromAbility", function(){
		var s=$(this).html();
		s=s.substring(0,s.length-1);
		
		$(".abilitySearchBox #L3").children().each(function(){
			if(($(this).text()==s)||($(this).attr("alldirectionval")==s)){
				$(this).removeClass("TagActive");
			}			
		})
		
		if($.inArray(s,allSelectedAbility)!= -1){
			//将选中的ability从allSelectedAbility删除
			allSelectedAbility.splice($.inArray(s,allSelectedAbility),1);
			//去除selectedDirection的空项
			allSelectedAbility = DelNullInArray(allSelectedAbility);
		}
		
		$(this).remove();
		
		// 实际上是触发query事件
		// 因为DOMNodeRemoved是在节点彻底移除前触发的，所以无法将变更后的条件传给后台。
		// 故而触发Inserted事件，强行query
		$(".selectedConditionRow").trigger("ManifyChanged");
	});
	
	
	// 点击已选条件中.fromDirection的tag取消他们
	$(".selectedConditionRow").on("click", ".fromDirection", function(){
		var s=$(this).html();
		s=s.substring(0,s.length-1);
		
		$(".abilitySearchBox #L3").children().each(function(){
			if(($(this).text()==s)||($(this).attr("alldirectionval")==s)){
				$(this).removeClass("TagActive");
			}			
		})
		
		if($.inArray(s,allSelectedDirection)!= -1){
			//将选中的ability从allSelectedDirection删除
			allSelectedDirection.splice($.inArray(s,allSelectedDirection),1);
			//去除selectedDirection的空项
			allSelectedDirection = DelNullInArray(allSelectedDirection);
		}
		
		$(this).remove();
		
		// 实际上是触发query事件
		// 因为DOMNodeRemoved是在节点彻底移除前触发的，所以无法将变更后的条件传给后台。
		// 故而触发Inserted事件，强行query
		$(".selectedConditionRow").trigger("ManifyChanged");
	});
	
	
	// 点击已选筛选栏中来自于文本搜索框的tag
	$(".selectedConditionRow").on("click",".fromSearchResult",function() {  
		var selectedTagsText = $(this).text();				
		var has = false;
		$("#searchResultContent").children().each(function(){
			if (selectedTagsText == ($(this).text() +'×')) {
				has = true;
			}
		});
		
		$(this).remove();
		// 实际上是触发query事件
		// 因为DOMNodeRemoved是在节点彻底移除前触发的，所以无法将变更后的条件传给后台。
		// 故而触发Inserted事件，强行query
		$(".selectedConditionRow").trigger("ManifyChanged");
		
		if (!has) {
			var abilityName = selectedTagsText.replace(/×$/,"");
			$("#searchResultContent").append("<p class='resultTag'>"+ abilityName + "</p>");
		}		
	});  
	
	// 点击文本搜索框的结果tag
	$("#searchResultContent").on("click",".resultTag",function() { 
		var resultTagText = $(this).text();
		var has = false;
		
		$(".selectedConditionRow").children().each(function(){
			if ($(this).text() == (resultTagText+'×')) {
				has = true;
			}
		});
		 if (!has) {
			 $(".selectedConditionRow").append('<div class="selectedTags fromSearchResult">'+$(this).text()+'×</div>');
		 }
		 $(this).remove();
		 $(".selectedConditionRow").trigger("ManifyChanged");
	});
	
	
	$("#searchResult").on("click", ".searchResultClose", function(){
		$("#searchResult").fadeOut(200);
	});
	//发送站内信表单发送按钮的事件
	$("#noteModal").on("click","#sendConfirm",function(){
		var note_content = $("#user_note_detail").val();
		if((note_content).length == 0){
			window.parent.myAlert("发送内容不能为空");
		}
		else{
			$.ajax({
				url: model_url + "/sendNotification", //请求验证页面 
			    type: "POST", //请求方式
			    data:"RecipientId=" + RecipientId + "&NoteContent=" + note_content,
			    success: function (result){
			    	switch (result){
			    	case "success":
			    		window.parent.myAlert("发送成功!");
			    		break;
			    	case "forbidden":
			    		window.parent.myAlert("今天您已经向该用户发送过消息，请明天再发！");
			    		break;
		    		default:
		    			break;
			    	}
			    }
			});
		}
	})
	
}

function loadMajor(result) {
	$("#majorTags").empty();	
	var majorCnt = 0;
	for (majorCnt in result){
		
		//此变量说明是否major标签已经添加在selectedTag
		var majorHasAdded = false;
		
		//便利每个selectedTag，看与目前载入的majortag是否符合
		$(".selectedConditionRow").children().each(function(){
			if ($(this).text() == (result[majorCnt]+'×'))
				majorHasAdded = true;
		});
		
		//若majortag未在selectedTag中
		if (majorHasAdded == false){
			$("#majorTags").append('<div class="searchTag majorTag">'+result[majorCnt]+'</div>');
		}
		//若majortag已在selectedTag中
		else{
			$("#majorTags").append('<div class="searchTag majorTag TagActive">'+result[majorCnt]+'</div>');
		}
	}
}

function loadDepartment(result) {
	//alert('get departmentData');
	$("#departmentTags").empty();	
	$("#majorTags").empty();
	var departmentCnt = 0;
	for (departmentCnt in result){
		$("#departmentTags").append('<div class="searchTag departmentTag">'+result[departmentCnt]+'</div>');
	}
}

function loadAcademy(result) {
	allAcademy = result;
	$("#academyTags").empty();	
	var academyCnt = 0;
	for (academyCnt in result){
		if (academyCnt == 0) continue;
		$("#academyTags").append('<div class="searchTag academyTag">'+result[academyCnt]+'</div>');
		$(".academySearchSelect").append('<option class="searchTag academyTag"value="'+result[academyCnt]+'">'+result[academyCnt]+'</option>');
	}
	initJquerySelect(".academySearchSelect");
}

function handleSearchResult(call) {	
	if (null !== call) {
		$("#searchResultContent").html("");
		$("#searchResultContent").append("<p class='searchResultTitle'>筛选出以下结果，点击立即筛选</p>");
		$("#searchResultContent").append("<p class='searchResultDivide'></p>");
		for (var index in call) {	
			$("#searchResultContent").append("<p class='resultTag'>"+ call[index] + "</p>");
		}
	} else {
		$("#searchResultContent").html("");
		$("#searchResultContent").append("<p class='searchResultNull'>未找到相关条件<br>请检查输入文字</p>");
	}
	$("#searchResult").fadeIn(1000);
}

var offset = 0;
var isFinished = false;
var oldAbilities = '';
var oldDirections = '';
var oldAcademies = '';

/**
 * 正式查询用户，每次5个人
 */
function queryNow() {
	var abilities='', directions='', academies='';

	$(".selectedTags").each(function(){
		
		var source = $(this).attr("class");
		
		// 去字符串后几位，以知道标签来自于哪里
		source = source.substring(13, source.length);
		
		switch (source) {
			case 'fromSearchResult':
			case 'fromAbility':
				if (abilities != "") {
					abilities += ",";
				}
				// 替换最后一个x为空
				abilities += $(this).text().replace(/×$/, "");
				break;
			case 'fromDirection':
				if (directions != "") {
					directions += ",";
				}
				// 替换最后一个x为空
				directions += $(this).text().replace(/×$/, "");
				break;
			case 'fromAcademy':
				if (academies != "") {
					academies += ",";
				}
				// 替换最后一个x为空
				academies+= $(this).text().replace(/×$/, "");
				break;
			default:
				break;
		}
	})

	var isSecondTime = true;
	// 没有条件就不搜索
	if (abilities == '' && directions == '' && academies == '') {
		return;
	}
	// 条件存在不同就要重置初始状态
	if (abilities != oldAbilities || directions != oldDirections || academies != oldAcademies) {
		oldAbilities = abilities;
		oldDirections = directions;
		oldAcademies = academies;
		offset = 0;
		isFinished = false;
		isSecondTime = false;
		// 初始化结果显示容器
		$("#resultContainer").empty();
		PersonCardView.refresh();
		autoResize();
	}
	
	// 发送检索请求
	$.ajax({
		url: app_url + "/custom/SearchPeople/searchByCondition",
		type: "GET",
		data: "abilities=" + abilities
			+ "&directions=" + directions
			+ "&academies=" + academies
			+ "&offset=" + offset,
		success: function(call) {
			// 转为json
			call = eval("("+call+")");
			user = call;
			
			// 没有符合条件的人了
			if (call == null) {
				isFinished = true;
				if (isSecondTime) {
					$('.theme-popover-mask').fadeIn(100);
//					$('.messagePopout').css("bottom", "356px");
					window.parent.myAlert("没有更多的人了");
					$('.messagePopButton').click(function() {
						$('.theme-popover-mask').fadeOut(500);
					});
				}
				else {
					$('.theme-popover-mask').fadeIn(100);
//					$('.messagePopout').css("bottom", "356px");
					window.parent.myAlert("没有符合条件的人了");
					$('.messagePopButton').click(function() {
						$('.theme-popover-mask').fadeOut(500);
					});
				}
	    		return;
			}
			$(".showMore").remove();
			for (var index in call) {
				PersonCardView.newCard(call[index]);
			}
			$(".abilityDetail").fadeIn(700, function(){
	    		//标签显示之后，初始化其tooltip功能
	      	  initToolTip();
	    	});
			
			$("#resultContainer").append('<div class="showMore"><div class="showMoreText" onclick="showMore()">显示更多</div></div>')
			
			autoResize();
			
			//个人名片上发送站内信功能	
			$(".tableBackground2ed").on("click",".glyphicon-envelope",function(){
				$(".modal-dialog").css("top",$(this).offset().top-200);
				RecipientIndex = this.id.substring(12,this.id.length);
				RecipientId = call[RecipientIndex]['user_id'];
			});
			
			$(".tableBackground2ed").on("click",".glyphicon-plus",function(){
				window.parent.myAlert("该功能暂未开放，敬请期待");
			});
			
		}
	})

}

/**
 * 点击“显示更多”按钮事件响应
 */
function showMore(){
	if(isFinished){
		$('.theme-popover-mask').fadeIn(100);
//		$('.messagePopout').css("bottom", "356px");
		window.parent.myAlert("没有更多的人了");
		$('.messagePopButton').click(function() {
			$('.theme-popover-mask').fadeOut(500);
		});
		return;
	}
	offset += 5;
	queryNow();
}



/**
 *导航栏点击事件汇总
 */
function initNavClickEvent() {
	var setHeight = 363;
	var expendAblity = false;
	var expendAcademy = false;
	var clickPos;
	
	$('#abilitySearchToggle').click(function(e){
		clickPos = "abilityToggle"
		if (!expendAblity){
			expendAblity = true;
			expendAcademy = false;
			$('.abilitySearchBox').css("display","block");
			$('.academySearchBox').css("display","none");
			$(".dropdown2").removeClass("open");
			$(".dropdown1").addClass("open");
		}else if(expendAblity){
			expendAblity = false;
			$('.abilitySearchBox').css("display","none");
			$(".dropdown1").removeClass("open");
		}
		autoResize();
		e.stopPropagation();
	});
	
	$('#academySearchToggle').click(function(e){
		clickPos = "academyToggle"
		if (!expendAcademy){
			expendAcademy = true;
			expendAblity = false;
			$('.academySearchBox').css("display","block");
			$('.abilitySearchBox').css("display","none");
			$(".dropdown1").removeClass("open");
			$(".dropdown2").addClass("open");
		}else if(expendAcademy){
			expendAcademy = false;
			$('.academySearchBox').css("display","none");
			$(".dropdown2").removeClass("open");
		}
		e.stopPropagation();
	});
	
	$(".tableContent,.form-control,.btn").click(function(){
		if (expendAblity || expendAcademy){
			clickPos = "cancelToggle";
			expendAblity = false;
			expendAcademy = false;
			$(".dropdown1").removeClass("open");
			$(".dropdown2").removeClass("open");
			$('.abilitySearchBox').css("display","none");
			$('.academySearchBox').css("display","none");
			autoResize();
		}
	});
	
//	$(".nav,.navContainer,.navbar,body,html").click(function(e){
//		if (clickPos == null || clickPos == "cancelToggle") {
//			e.stopPropagation();
//		} else {
//			clickPos = null;
//		}
//	});
}

/**
 * documen ready initialization
 */
$(document).ready(function(){
	
	// 表单提交事件
	$("#searchTextForm").submit(function(e){
		e.preventDefault();
		$.ajax({
			url: app_url + "/custom/Ability/searchAbilityByText",
			type: "GET",
			data: "searchText=" + $("#searchText").val().toUpperCase(),
			success: function(call) {
				handleSearchResult(call);
			}
		})
	})
	
	// 筛选条件结果变化监测
	$(".selectedConditionRow").bind("ManifyChanged", function(){
		queryNow();
	});

	
	// 向后台请求所有的领域，并显示
	$.ajax({url: app_url + "/Custom/SearchPeople/getAllFields",
		type: "GET",
        success: function(result) {
        	var fieldCnt = 0;
        	for (fieldCnt in result){
        		$(".abilitySearchBox #L1").append('<div class="searchTag fieldTag">'+result[fieldCnt]+'</div>');
        	}
        	// 向后台请求所有的热门领域，并显示
        	showHotDirectionAndAbility();
        }
	});

	// 获取所有的院列表
	$.ajax({
		url:app_url + "/Custom/SearchPeople/getAllAcademy",
		type:"GET",
		success:function(result){
			loadAcademy(result);
		}
	});
	
	PersonCardView.init("resultContainer");
	initNavClickEvent();
	initClickEvent();
	autoResize();
})


/***
 * 实现自动补全下拉插件初始化
 * @param selector 在哪个selector中实现自动补全下拉插件
 */
function initJquerySelect(selector){

		$(selector)
		.comboSelect()

     /**
      * on Change
      */
     
     $('.js-select').change(function(e, v){
         $('.idx').text(e.target.selectedIndex)
         $('.val').text(e.target.value)
     })

     /**
      * Open select
      */
     
     $('.js-select-open').click(function(e){
       $('.js-select').focus()
       e.preventDefault();
     })

     /**
      * Open select
      */    
     $('.js-select-close').click(function(e){
       $('.js-select').trigger('comboselect:close')
       e.preventDefault();
     })
     
     /**
      * Option Clicked
      */ 
     $('.academySearchForm .option-item').click(function(){
 		var academyText = $(this).text();
 		addAcademyTag(academyText);
     })
     
     /**
      * Disenable Submit Event
      */
     $('.academySearchForm').submit(function(e){
    	 e.preventDefault();
     })

     
     /**
      * 注册学院选择的回车事件
      */
     $('.academySearchForm').on("keydown", '.selectInput', function(e) {
    	 //如果是回车事件
    	 if(e.keyCode==13){
    		 //如果输入框中的内容是全部学院之一
    		 if(jQuery.inArray($('.selectInput').val(), allAcademy)!=-1){
    			 //将输入框中的内容以academyTag的形式加入selectedConditionRow
    			 addAcademyTag($('.selectInput').val()); 
    		 }    			  
    	}
     })
     
//     $(':not(.combo-dropdown)').click(function(){
//    	 alert(":not(.combo-dropdown) clicked");
//    	 $(".combo-dropdown").css("display","none");
//     })
     
     
}

/***
 * 将一个字符串以academyTag的形式加入selectedConditionRow
 * @param academyText 添加的字符串
 */
function addAcademyTag(academyText){
	var has = false;
	//便利所有的selectedConditionRow里面的tag，判断新添加的tag是否已经存在
	$(".selectedConditionRow").children().each(function(){
		if ($(this).text() == (academyText+'×')) {
			has = true;
		}
	});
	if (!has) {
		//若新添加的tag未存在，则添加
		 $(".selectedConditionRow").append('<div class="selectedTags fromAcademy">'+academyText+'×</div>');
	}
	// 触发自定义改变事件
	$(".selectedConditionRow").trigger("ManifyChanged");
}

//将所有allSelectedAbility数组中的项，以tag的形式添加入selectedConditionRow
function addAllAbility(){
	//先清空所有有关能力的搜索条件
	$(".selectedConditionRow").children().each(function(){
		if ($(this).hasClass("fromAbility")) {
			$(this).remove();
		}
	});
	
	var abilityCnt = 0;
	
	for (abilityCnt in allSelectedAbility){
		var has = false;
		//便利所有的selectedConditionRow里面的tag，判断新添加的tag是否已经存在
		$(".selectedConditionRow").children().each(function(){
			if ($(this).text() == (allSelectedAbility[abilityCnt]+'×')) {
				has = true;
			}
		});
		if (!has) {
			//若新添加的tag未存在，则添加
			 $(".selectedConditionRow").append('<div class="selectedTags fromAbility">'+allSelectedAbility[abilityCnt]+'×</div>');
		}
	}
	// 触发自定义改变事件
	$(".selectedConditionRow").trigger("ManifyChanged");
}

//将所有allSelectedDirection数组中的项，以tag的形式添加入selectedConditionRow
function addAllDirection(){
	//先清空所有有关能力的搜索条件
	$(".selectedConditionRow").children().each(function(){
		if ($(this).hasClass("fromDirection")) {
			$(this).remove();
		}
	});
	
	var abilityCnt = 0;
	
	for (abilityCnt in allSelectedDirection){
		var has = false;
		//便利所有的selectedConditionRow里面的tag，判断新添加的tag是否已经存在
		$(".selectedConditionRow").children().each(function(){
			if ($(this).text() == (allSelectedDirection[abilityCnt]+'×')) {
				has = true;
			}
		});
		if (!has) {
			//若新添加的tag未存在，则添加
			 $(".selectedConditionRow").append('<div class="selectedTags fromDirection">'+allSelectedDirection[abilityCnt]+'×</div>');
		}
	}
}

/***
 * 去除数组中的空元素
 * @param array 欲去除的原始数组
 */
function DelNullInArray(array){
	var result = new Array();
	var cnt = 0;
	for(cnt in array){
		if (array[cnt]!=null){
			result.push(array[cnt]);
		}
	}
	return result;
}
