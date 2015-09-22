var ability_json;

$(document).ready(function() {
	
	// 请求后台生成json格式的数据
	$.ajax({url: app_url + "/Custom/Ability/genDB",
            type: "GET",
            async:false,
            dataType: "json",
            success: function(result) {
            		ability_json = result;
            		var cnt1 = new Number(1);
            		for (l1 in ability_json) {
            			
            			var obj1 = $("<div></div>");
            			obj1.attr("id", "L1_" + cnt1.toString());
            			obj1.addClass("tags hvr-radial-out");
            			obj1.html(l1);
            			obj1.appendTo("#L1");
            			
            			var cnt2 = new Number(1);
            			for (l2 in ability_json[l1]) {
            				
            				var obj2 = $("<div></div>");
            				obj2.attr("id", "L1_" + cnt1.toString() + "_" + cnt2.toString());
            				obj2.attr("data-cat", "L1_" + cnt1.toString());
            				obj2.addClass("tags_1 " + "L1_" + cnt1.toString() + " hvr-radial-out");
            				obj2.html(l2);
            				obj2.appendTo("#L2");
            				
            				for (l3 in ability_json[l1][l2]) {
            					var obj3 = $("<input type='checkbox' class='hvr-radial-out'>");
            					obj3.addClass("L1_" + cnt1.toString() + "_" + cnt2.toString());
            					obj3.attr("data-cat", "L1_" + cnt1.toString() + "_" + cnt2.toString());
                				obj3.appendTo("#L3");
            					var label = $("<label></label>");
            					label.html(ability_json[l1][l2][l3]["name"]);
            					label.appendTo("#L3");
            				}
            				cnt2 = cnt2 + 1;
            			}
            			cnt1 = cnt1 + 1;
            		}
            	}
			})
	$('<div id="index" class="filter" style="display:none"></div>').appendTo('#L1');
	$('<div id="index2" class="filter" style="display:none"></div>').appendTo('#L2');
	
});