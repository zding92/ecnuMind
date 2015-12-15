/**
 * 
 */

var MetroCard = {
	container: null,
	x: 0,
	y: 0,
	init: function(containerID) {
		container = $("#"+containerID);
	},
	newCard: function(index,fieldName,description,bgColor) {
		container.append("<div class='metro-wrapper' id='" + index + "' style='left:"+MetroCard.x+"px; top:"+MetroCard.y+"px;background-color:"+bgColor+";'>\
											<img class='img' id='img"+ index +"' src='"+public_url+"/img/abilityIconRedo/"+ index +".png'>\
											<p class='inner_comment'>" + fieldName + "</p>\
											<div class='metroLabel' id='metroLabel"+ index +"'>\
												"+ description +"\
											</div>\
									</div>"
		);
		MetroCard.x = (index%4)*255;
		MetroCard.y = parseInt(index/4)*261;
	}
};
