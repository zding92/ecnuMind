$(window).load(function() {
	
	
	//$('#btnCrop').click();$("#idName").css("cssText","background-color:red!important");
	
	//$(".imageBox").css("cssText","background-position:88px 88px!important");$(".imageBox").css("cssText","background-size:222px 222px!important");
	var options =
	{
		thumbBox: '.thumbBox',
		spinner: '.spinner',
		imgSrc: ''
	}
	var cropper = $('.imageBox').cropbox(options);
	var img="";
	$('#upload-file').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(e) {
			options.imgSrc = e.target.result;
			cropper = $('.imageBox').cropbox(options);
		}
		reader.readAsDataURL(this.files[0]);
		this.files = [];
		//getImg();
	})
	
	$('#btnOK').on('click', function(){
		
		$.ajax({
               url: modelUrl + "/uploadPhoto", //你处理上传文件的服务端
               type:"POST",
               data: "img=" + cropper.getDataURL(),
               dataType: 'JSON',
               success: function (result) {
                       switch (result) {
					case "success":
						swal({ 
				            title: "成功O(∩_∩)O",  
				            text: "您的照片已成功上传",  
				            type: "success", 
				            showCancelButton: false, 
				            closeOnConfirm: false, 
				            confirmButtonText: "好的，朕知道了", 
				            confirmButtonColor: "#ec6c62" 
				        }, function() { 
							location.reload(true);
				        });
						break;
					case "fail":
					case "img_incorrect":
						swal('失败', '上传数据格式错误', 'error');
						break;		
					default:
						swal('失败', '上传超时', 'error');
						break;
					}
               }
        })
	})
		
	$('#btnZoomIn').on('click', function(){
		cropper.zoomIn();
	})
	$('#btnZoomOut').on('click', function(){
		cropper.zoomOut();
	})
});