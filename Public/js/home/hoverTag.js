/**
 * when hover on the target, a tag appears
 */
$(function() {
    $(document).tooltip({
      items: ".tabs p",
      content: function() {
        var element = $(this);
        var tagText = $(this).text();
        var starScore = 8.5;
        var scoreTimes = 66;
        if ( element.is( ".tabs p" ) ) {
          return "<b>"+tagText+"</b>"+"的获评分数：<br><div class='hoverTagStar'></div>" +
                 starScore+"分<br>"+"<b>"+tagText+"</b>"+"的获评次数：" +scoreTimes+"次"+
          		 "<script type='text/javascript'>" +
          		 	"$('.hoverTagStar').raty({" + 
          		 		"number   : 10,"+
          		 		"score    :"+starScore+","+
          		 		"starOff  : starOffIcon,"+
          		 		"starOn   : starOnIcon,"+
          		 		"starHalf : starHalfIcon,"+
          		 		"readOnly : true,"+		  
        				"});" +
          		 "</script>";         
        }	
      }
    });
});