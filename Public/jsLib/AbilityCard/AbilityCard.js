/**
 * 此插件用于“个人能力”界面，点击“领域”后加载“方向”、“能力”。
 */
var AbilityCard = {
	container:null,
	curDir:0,

	init: function(container){
		container = $("."+ container);
		curDir = 0;
	},
	
	refresh: function(){
		curDir = 0;
	},
	
	newCard: function(fieldInfo){
		$(".DirContainer").append("<div class='abilityCard' id='Dir"+ curDir +"'></div>");
		$("#Dir"+curDir).append("<div class='abilityCardDirection' id='abilityCardDirection"+ curDir +"' >\
					<h1 class='abilityCardDirectionLabel'>\
				" + fieldInfo.name +"</h1>\
				</div>\
				<div id='abilityCardDirectionLabel"+ curDir +"' class='abilityCardAbility'>\
			</div>"
			);
		
		for(ability in fieldInfo.ability_name){
//			$("#abilityCardDirectionLabel"+ curDir +"").append("<div  class='abilityLabel'>"+ fieldInfo.ability_name[ability] +"</div>");
			$("#abilityCardDirectionLabel"+ curDir +"").append("<input type='checkbox' class='hvr-radial-out'><label>"+ fieldInfo.ability_name[ability] +"</label>");
		}
		
		var selector = "#abilityCardDirectionLabel"+ curDir +" :input"; 
		
		$(selector).each(function () {
	        var self = $(this),
	        label = self.next(),
	        label_text = label.text();
	        label.remove();
	        self.iCheck({
	            checkboxClass: 'icheckbox_line-blue',
	            radioClass: 'iradio_line-blue',
	            insert: '<div class="icheck_line-icon" style="left: 7px;"></div>' + label_text
	        });
	        // 已经有的能力要勾选
	        for (idx in user_ability_json)
	        	if (user_ability_json[idx]['ability_name'] == label_text)
	        		self.iCheck("check");
	    });
	   
        $(selector).each(function () {
        	$(this).parent().addClass('abilityLabel');
        })
		
		$("#abilityCardDirection"+curDir).css('height', $("#abilityCardDirectionLabel"+ curDir).css('height'));
		
		curDir += 1;
	}

};