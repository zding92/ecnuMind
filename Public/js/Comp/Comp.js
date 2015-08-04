/**
 * 取Comp.dat中的json数据，以在前台显示
 */
$(document).ready(function () {
	//alert('into the function');
    $.ajax({
        url: compJSON,
        async: false,
        success: function (result) {
        	//alert('In to json ajax');
        	//先删去表格中原始的行
            $("tbody tr").detach();
            eval(result);
            //遍历所有的json数组元素
            for (var i = 0; i < json_string.length; i++) { 
            	//当json元素有link项时，从json数组中读取数据并append推送到前台页面中
                if (json_string[i].link !== "")
                    $("tbody").append("<tr><td data-title='ID'>" + json_string[i].no +
                                        "</td><td data-title='Name'>" + json_string[i].name +
                                        "</td><td data-title='Link'><a href='" + json_string[i].link + " 'target='_blank' >Link</a></td>" +
                                        "</td><td data-title='Status'>" + json_string[i].status + "</td></tr>");
              //当json元素无link项时，从json数组中读取数据并append推送到前台页面中
                else
                    $("tbody").append("<tr><td data-title='ID'>" + json_string[i].no +
                                        "</td><td data-title='Name'>" + json_string[i].name +
                                        "</td><td data-title='Link'>Link</td>" +
                                        "</td><td data-title='Status'>" + json_string[i].status + "</td></tr>");

            }

        }
    }); 
  //当鼠标进入表格某行时，此行变蓝
    $("tbody tr").mouseenter(function(){$(this).css("background-color","#B3E5FC");});
  //当鼠标移出某行时，此行变白
    $("tbody tr").mouseleave(function(){$(this).css("background-color","#fff");});
  //配合iframe显示
    parent.document.getElementById("Comp_frame").height = document.body.scrollHeight;
});

