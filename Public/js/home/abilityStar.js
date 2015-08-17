/**
 * This js is designed to finish the star-remarking of the abilities
 */
$(function () {	
	$('.abilityStar').raty({ 
		  number   : 10,
		  score    : 5.5,
		  starOff  : starOffIcon,
		  starOn   : starOnIcon,
		  starHalf : starHalfIcon,
		  readOnly : true,
		  
	});
})