/**
 * This js is for the using of searchPeople Page
 */
$(document).ready(function() {
	$("#searchPeoplePart2Row3 .searchPeopleTag").click(function() {
		/* Act on the click event,点击能力标签，添加至筛选池 */

		/* TagHasClicked = 0 means the tag has not been clicked; TagHasClicked = 1 means the tag has been clicked*/
		var TagHasClicked = 0;

		/*take out the text of the tag just clicked*/
		var clickedText = $(this).text();

		/*get the offset of the Brower*/
		/*xPositon是点击位置的div相对浏览器位置*/
		var xPosition=$($(this)).offset(); 

		/*xParent是已选能力框位置的div相对浏览器位置*/
		var xParent =  $(".selectedTags").offset();

    	/*xLeft、xTop是能力筛选池标签相对于此筛选池的位置，也是使用的left和top*/
    	var xLeft = xPosition.left-xParent.left;
    	var xTop = xPosition.top-xParent.top;

		/*Judge each clickedText whether has appeared in the SelectedTags*/
		$(".selectedTag").each(function() {
			if ($(this).text() == (clickedText+'  ×')) {
				TagHasClicked = 1;				
			};
		});

		/*If the Tag just clicked has not appeared, then display it*/
		if (TagHasClicked == 0)	{
			$(".selectedTags").append('<div class="selectedTag tag_'+ $(this).text() +'" title="点击删除该条件" style="-webkit-transform:translate('+xLeft+'px,'+xTop+'px);">'+$(this).text()+'  ×</div>');
			var tagsName = ".tag_" + $(this).text();
			$(tagsName).ready(function(){
				setTimeout(function(){
					$(tagsName).removeAttr('style');
				}, 0);
			});
			
			//$(".selectedTags").append('<div class="selectedTag" title="点击删除该条件">'+$(this).text()+'  ×</div>');		
		}
		else alert(clickedText+"已经在筛选条件中了");

		$('.selectedTag').click(function() {
			/* Act on the click event,点击能力池中的标签，取消此筛选条件 */
			$(this).remove();
		});
	});
});

