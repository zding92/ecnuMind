/**
 * 
 */
$(document).ready(function () {
	//alert('into the function');
    $.ajax({
        url: compJSON,
        async: false,
        success: function (result) {
        	//alert('In to json ajax');
            $("tbody tr").detach();
            eval(result);
            for (var i = 0; i < json_string.length; i++) {
                if (json_string[i].link !== "")
                    $("tbody").append("<tr><td data-title='ID'>" + json_string[i].no +
                                        "</td><td data-title='Name'>" + json_string[i].name +
                                        "</td><td data-title='Link'><a href='" + json_string[i].link + " 'target='_blank' >Link</a></td>" +
                                        "</td><td data-title='Status'>" + json_string[i].status + "</td></tr>");
                else
                    $("tbody").append("<tr><td data-title='ID'>" + json_string[i].no +
                                        "</td><td data-title='Name'>" + json_string[i].name +
                                        "</td><td data-title='Link'>Link</td>" +
                                        "</td><td data-title='Status'>" + json_string[i].status + "</td></tr>");

            }

        }
    });

    parent.document.getElementById("Comp_frame").height = document.body.scrollHeight;
    $("tbody tr").mouseenter(function(){$(this).css("background-color","#B3E5FC");});
    $("tbody tr").mouseleave(function(){$(this).css("background-color","#fff");});
});

$(document).ready(function(){

}); 