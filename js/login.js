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

	$("#login-loading").show();
    $("#btn-login-login").hide();
    $('.alert').hide();

	var data = new Object();
	data["request_type"] = "request-login";
	data["username"] = $("#btn-login-username").val();
	data["password"] = $("#btn-login-password").val();

    $.post("lib/login.php", {data: data}, function(callback){
        if(callback == "GOTO PROFILE instructor"){
        	window.open("profile-instructor", '_self');
        }else if (callback == "GOTO PROFILE deptchair") {
            window.open("profile-deptchair", '_self');
        }else if (callback == "GOTO PROFILE student") {
            window.open("profile-student", '_self');
        }else if (callback == "GOTO PROFILE admin") {
            window.open("profile-admin", '_self');
        }else{
            $("#login-loading").hide();
            $('.alert').show();
            $("#btn-login-login").show();
        }
    });
}
