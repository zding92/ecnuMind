/**
 * This js is for the using of searchPeople Page
 */

var ability_json;

$(document).ready(function() {
	
	// 请求后台生成json格式的数据
	$.ajax({url: app_url + "/Home/ability/genDB",
            type: "GET",
            dataType: "json",
            success: function(result) {
            		ability_json = result;
            		var cnt1 = new Number(1);
            		for (l1 in ability_json) {
            			
            			var obj1 = $("<div></div>");
            			obj1.attr("id", "L1_" + cnt1.toString());
            			obj1.addClass("searchPeopleTag");
            			obj1.html(l1);
            			obj1.appendTo("#L1");
            			
            			var cnt2 = new Number(1);
            			for (l2 in ability_json[l1]) {
            				
            				var obj2 = $("<div></div>");
            				obj2.attr("id", "L1_" + cnt1.toString() + "_" + cnt2.toString());
            				obj2.addClass("searchPeopleTag " + "L1_" + cnt1.toString());
            				obj2.html(l2);
            				obj2.appendTo("#L2");
            				
            				for (l3 in ability_json[l1][l2]) {
            					var obj3 = $("<input type='checkbox' class='searchPeopleTag'>");
            					obj3.addClass("L1_" + cnt1.toString() + "_" + cnt2.toString());
            					obj3.appendTo("#L3");
            					var label = $("<label></label>");
            					label.addClass("searchPeopleTag");
            					label.html(ability_json[l1][l2][l3]["name"]);
            					label.appendTo("#L3");
            				}
            				cnt2 = cnt2 + 1;
            			}
            			cnt1 = cnt1 + 1;
            		}
            	}
			})
	
	// 实例化mixitup
	var filter = {
        init: function () {
            if ($('#L2').mixItUp('isLoaded'))
        		$('#L2').mixItUp("destroy");
            $('#L2').mixItUp({
            	selectors: {
            		target: '.searchPeopleTag',
            	},
                animation: {
            		duration: 300,
                }
            });
        }
    }.init();
	
	// 定义mixitup的过滤规则
    $('.searchPeopleTag').click(function () {
    	//$(this).toggleClass('active');
        $('#L2').mixItUp('filter', '.L1_1');
    })
	
    $("#searchPeoplePart2Row3 .searchPeopleTag").click(function() {
		
		/* Act on the click event,点击能力标签，添加至筛选池 */

		/* TagHasClicked = 0 means the tag has not been clicked; TagHasClicked = 1 means the tag has been clicked*/
		var TagHasClicked = 0;

		/*take out the text of the tag just clicked*/
		var clickedText = $(this).text();

		/*get the offset of the Brower*/
		/*xPositon是点击位置的div相对浏览器位置*/
		var xPosition=$($(this)).offset(); 

		/*xParent是最后一个已选能力标签的div相对浏览器位置*/
		var xParent =  $(".tagPosition:last").offset();

    	/*xLeft、xTop是能力筛选池标签相对于最后一个能力筛选池标签的位置，并减去最后一个能力筛选标签宽度，也是使用的left和top*/
    	var xLeft = xPosition.left-xParent.left-$(".tagPosition:last").width();;
    	var xTop = xPosition.top-xParent.top;
    	
		/*Judge each clickedText whether has appeared in the SelectedTags*/
		$(".selectedTag").each(function() {
			if ($(this).text() == (clickedText+'  ×')) {
				TagHasClicked = 1;				
			};
		});

		/*If the Tag just clicked has not appeared, then display it*/
		if (TagHasClicked == 0)	{
			
			/*在.selectedTags中添加最新点击的.selectedTag，核心赋予style来实现left top偏移*/
			$(".selectedTags").append('<div class="selectedTag tagPosition tag_'+ $(this).text() +'" title="点击删除该条件" style="-webkit-transform:translate('+xLeft+'px,'+xTop+'px);">'+$(this).text()+'  ×</div>');
			
			/*去除最新添加的.selectedTag中的style属性，以实现transition动画*/
			var tagsName = ".tag_" + $(this).text();
			$(tagsName).ready(function(){
				setTimeout(function(){
					$(tagsName).removeAttr('style');
				}, 0);
			});		
		}
		else alert(clickedText+"已经在筛选条件中了");

		$('.selectedTag').click(function() {
			/* Act on the click event,点击能力池中的标签，取消此筛选条件 */
			$(this).remove();
		});
	});
});

