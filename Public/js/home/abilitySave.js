/**
 * 此js用于能力输入保存时向后台提交能力数据
 */
$(document).ready(function() {
	$(".abilitySave").click(function(event) {
		var allAblitySelected = '';
		/* Act on the event 能力输入保存按钮点击时*/
		//alert("abilitySave Clicked");
		$("ins").each(function() {
			if($(this).parent().children("input").attr("checked") == 'checked'){//挑选出已选择了的能力
				var abilitySelected = $(this).parent().text();
				allAblitySelected = allAblitySelected + abilitySelected;
			}
		});
		alert(allAblitySelected);
	});
});