/**
 * 主页使用的js
 */
var indexCheckTime;
$(document).ready(function(){
	if (indexCheckTime != undefined) {
		clearTimeout(indexCheckTime);
	}
	indexCheckTime = setTimeout(function () {
		$('.indexPage1H2').fadeIn(1000);
	}, 8000);

});