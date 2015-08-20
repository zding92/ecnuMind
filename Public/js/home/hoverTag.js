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
          return "<b>"+tagText+"</b>"+"的获评分数：<br>"+"<b>"+tagText+"</b>"+"的获评次数：";
        }
      }
    });
});