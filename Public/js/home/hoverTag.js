/**
 * when hover on the target, a tag appears
 */
$(function() {
    $(document).tooltip({
      items: ".tabs p",
      content: function() {
        var element = $(this);
        var tagText = $(this).text();
        if ( element.is( ".tabs p" ) ) {
          return "<b>"+tagText+"</b>"+"的获评分数：<br><div class='hoverTagStar'></div>"+"<b>"+tagText+"</b>"+"的获评次数：";
        }
		$('.hoverTagStar').raty({ 
			  number   : 10,
			  score    : 10,
			  starOff  : starOffIcon,
			  starOn   : starOnIcon,
			  starHalf : starHalfIcon,
			  readOnly : true,		  
	  	});
      }
    });
});