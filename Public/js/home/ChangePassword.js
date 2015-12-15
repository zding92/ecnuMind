/**
 * 改变密码所用的js
 */
var btn = document.getElementById('Safe_btn');
var Safe_original_pwd = document.getElementById('Safe_original_pwd');
var Safe_new_pwd1 = document.getElementById('Safe_new_pwd1');
var Safe_new_pwd2 = document.getElementById('Safe_new_pwd2');

window.onload = function () {
	
	
    btn.onclick = function () {

        var isValidate = false;

      /*  if(Safe_new_pwd2.value != Safe_new_pwd1.value){
    		myAlert("两次输入的密码不同");
    		return;
    	}
        else{*/
        	 if (!(Safe_new_pwd1.value.match(/^.{6,20}$/))||
             		!(Safe_new_pwd2.value.match(/^.{6,20}$/))) {
             	myAlert("请输入长度为6-20位的新密码");
                 return;
             } else {
                 isValidate = true;
             }
    //}
        
       
        
        function handleReturn(call) {
        	switch (call) {
			case 'success':
				myAlert("修改成功");
				break;
			case 'password_error':
				myAlert("原始密码错误");
				break;
			case 'newpassword_error':
				myAlert("两次密码输入不同");
				break;
			default:
				break;
			}
		}
        
        if (isValidate) {
            $.ajax({
                url: PasswordChange_url, //请求验证页面 
                type: "POST", //请求方式
                data: "newpassword1=" + $("#Safe_new_pwd1").val() + 
                	"&newpassword2=" + $("#Safe_new_pwd2").val() +
                		"&password=" + $("#Safe_original_pwd").val() , 
                success: function (call) {
                    handleReturn(call);          	         
                }
            });
        }

    }
    
    
}

document.onkeydown = function(e){ 
    var ev = document.all ? window.event : e;
    if(ev.keyCode==13) {
    	$("#Safe_btn" ).click();
     }
}

