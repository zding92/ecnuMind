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

		var x=$($(this)).offset();
    	alert("Top: " + x.top + " Left: " + x.left);


		/*Judge each clickedText whether has appeared in the SelectedTags*/
		$(".selectedTag").each(function() {
			if ($(this).text() == (clickedText+'  ×')) {
				TagHasClicked = 1;				
			};
		});

		/*If the Tag just clicked has not appeared, then display it*/
		if (TagHasClicked == 0)	{
			$(".selectedTags").append('<div class="selectedTag" title="点击删除该条件">'+$(this).text()+'  ×</div>');
			// var $w = $(".selectedTag:last").width();
			// var $h = $(".selectedTag:last").height();
			// var $w2 = $w+20;
			// var $h2 = $h+20;
			// $(".selectedTag:last").stop().animate({height:$h2,width:$w2},500,
			// 	function(){$(".selectedTag:last").stop().animate({height:$h,width:$w+3},500);});
			
		}
		else alert(clickedText+"已经在筛选条件中了");

		$('.selectedTag').click(function() {
			/* Act on the click event,点击能力池中的标签，取消此筛选条件 */
			$(this).remove();
		});
	});
});
