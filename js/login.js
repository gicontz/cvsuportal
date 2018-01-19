// If the popped up login button is clicked 
$("#btn-login-login").click(function(){
    loginCheck();
});

$(".enterInputSignin").keypress(function(e) {
    if(e.which == 13) {
        loginCheck();
    }
});



$(".btn-modals").click(function(){
	$('.alert').hide();
});



function loginCheck(){
	var data = new Object();
	data["request_type"] = "request-login";
	data["username"] = $("#btn-login-username").val();
	data["password"] = $("#btn-login-password").val();

    $.post("lib/login.php", {data: data}, function(callback){
        if(callback == "GOTO PROFILE"){
        	window.open("profile-instructor.php", '_self');
        }else{
            $('.alert').show();
        }
    });
}
