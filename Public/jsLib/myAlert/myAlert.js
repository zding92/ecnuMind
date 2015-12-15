/**
 * 弹出定制alert
 */
$(document).ready(function(){
		//点击弹窗的ok按钮，弹窗消失
		$('.messagePopButton').click(function(){
			$('.messagePopOut').fadeOut(100);
		})
})
function myAlert(alertMessage){
	$('.messagePopText').text(alertMessage);
	$('.messagePopOut').fadeIn(500);
}