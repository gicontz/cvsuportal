<?php 
include('functions.php');
    session_start();
    if (isset($_SESSION['users_details'])) {
      $accessibility = $_SESSION['users_details']['account_type'];
      switch ($_SESSION['users_details']['account_type']) {
              case 'instructor':
                header('Location: '.$domain_header.'/profile-instructor');
                break;
              case 'student':
                header('Location: '.$domain_header.'/profile-student');
                break;
                case 'head':
                header('Location: '.$domain_header.'/profile-head');
                break;
            }
    }
    $mode = "";
    if(isset($_REQUEST['mode'])) :
    $mode = $_REQUEST['mode'];
    $uname = $_REQUEST['u'];
    $pwd = $_REQUEST['p'];
    endif;
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>DIT | Portal</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  
</head>

<body>

<?php 
	if ($mode == "qrscan") {
		?>
			<span id="qr-uname" style="display: none"><?php echo $uname ?></span>
			<span id="qr-pwd" style="display: none"><?php echo $pwd ?></span>
		<?php
	}

 ?>
	
	<div class="row">
		<div class="col-md-12" align="center">
			<img src="img/logo_DITportal.png" id="DPLogo"><br>
			<img src="img/LineDiv.png" id="DivLine"><br><br>
			<button type="button" class="LogBtn btn-modals" data-toggle="modal" data-target="#lgmodal">
        <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp LOG IN</button>
			<a href="newsfeed.php"><button class="SignBtn btn-modals">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp NEWSFEED</button></a>
		</div>
	</div>



<div class="modal fade" id="lgmodal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top: 140px;">
          <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center>Hello There!</center></h4>
        </div>

        <div class="modal-body">
            <div class="form-horizontal">

              <div class="form-group">
                <label class="control-label col-sm-8">Username or Student No.</label>
                <div class="col-sm-12">
                  <input type="Username" class="form-control enterInputSignin" id="btn-login-username" placeholder="Username" autofocus>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-8" for="pwd">Password:</label>
                <div class="col-sm-12"> 
                  <input type="password" class="form-control enterInputSignin" id="btn-login-password" placeholder="Enter password" >
                </div>
              </div>

               <div class="form-group">
                <div class="col-sm-12">
                  <div class="alert fade in">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <p>Wrong Password or Username.</p>
                  </div>
                </div>  
                </div>  

              <div class="form-group"> 
                <div class="col-sm-offset-1 col-sm-10">
                  <button type="submit" class="btn btn-submit" id="btn-login-login">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp Log in</button>
                    <img width="100%" height="10px" src="img/loading.gif" id="login-loading">
                </div>
              </div>

            </div>
        </div>
      </div>
    </div>
</div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>

</body>
</html>