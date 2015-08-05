var ChangePage = function () {

var btn_valid = true;

$("#btn_edit").click(function () {
    if (btn_valid) {
        btn_valid = false;
        $("#Page2").css('display', 'inline-block');
        $("#ChangePage").animate({
            right: "800px"
        }, 300, function () {
            $("#Page2").css('left', '800px');
            $("#Page1").css('display', 'none');
            btn_valid = true;
        });
    }
});

$("#btn_photo").click(function () {
    if (btn_valid) {
        btn_valid = false;
        $("#Page1").css('display', 'inline-block');
        $("#Page2").css('left', '0px');
        $("#ChangePage").animate({
            right: "0px"
        }, 300, function () {
            $("#Page2").css('display', 'none');
            btn_valid = true;
        });
    }
});

$("#image_file").hover(function(){
    $("#btn_upload").css("background","rgb(59,169,222)");
})

$("#image_file").mouseout(function(){
    $("#btn_upload").css("background","#2b99ce");
})

};