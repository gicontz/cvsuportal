<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>DIT Portal | <?php echo $students_page_title; ?></title>
  <?php
  $pager = "";
  if(isset($_REQUEST['content'])) :
    $pager = $_REQUEST['content'];
  endif;
  session_start();
  $_SESSION['course_id'] = $subjectClass->getCourseId($_SESSION['users_details']['user_id']); 
  getHeaderAssets();
  if(isset($_SESSION['users_details'])){
    switch ($_SESSION['users_details']['account_type']) {
      case 'instructor':
      header('Location: /cvsuportal/profile-instructor');
      break;
      case 'deptchair':
      header('Location: /cvsuportal/profile-deptchair');
      break;
      case 'student':
      //header('Location: /cvsuportal/profile-student');
      break;
      case 'admin':
      header('Location: /cvsuportal/profile-admin');
      break;
      default:
      header("Location: /cvsuportal");
      break;
    }
    ?>        
  </head>
  <body>
    <div class="wrapper">
      <nav id="sidebar">
       <?php 
       $navicons = ["fa-user-o", "fa-book", "fa-calendar-o", "fa-file", "fa-certificate", "fa-book"];
       ___user_navigation("img/profile/".getProfilePicture(), array(
          'Profile' => "profile-student",
          'Subjects' => "#",
          'Schedule' => "#",
          'Pre-Reg' => "?content=prereg",
          'COG' => "#",
          'Checklist' => "#"
        ), $navicons);
        ?>
      </nav>
      <div id="content">

        <?php if($pager == 'prereg') {
      		___student_prereg();
        }else if ($pager == 'profileImg') {
        	___profile_image();
        }
          else{
        ?>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="col-md-3 col-xs-3">
              <div class="row">
               <div class="navbar-header">
                <button type="button" id="sidebarCollapse" class="navbar-btn">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-xs-9"><br>
            <div class="dropdown show pull-right" style="list-style: none">
              <a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" href="#">Account&nbsp;&nbsp;
               <span class="fa fa-angle-down"></span></a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a href="#" class="nav-text"><i class="fa fa-gear"></i> Settings</a></li>
                <li><a href="lib/logout" class="nav-text"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12 col-xs-12">
            <div class="row">
              <h2>Profile</h2>
              <p>Student's Name : <?php $XDLINE::getfullname($_SESSION['users_details']); ?></p>
              <p>Department : Department of Information Technology</p>
            </div>
          </div>   
        </div>
      </nav>

      <div class="modal fade" id="modalsections_subject" role="dialog" style="overflow-y: hidden;">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-footer">
              <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="modal-addhomework" role="dialog" style="overflow-y: hidden;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">BS Computer Science - 3A</h4>
            </div>
            <div class="modal-body"><br><br>
              <button  class="btn btn-default">Add homework</button>
              <button class="btn btn-default">Add Project</button>
              <button class="btn btn-default">Upload Grades</button>


            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" data-dismiss="modal">Back</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </div>


     <div class="col-md-12" style="background-color: white;">
       <h2>Subject</h2>
       <table class="table table-striped table-hover table-responsive table-responsive">
        <?php //include_once('inc/subjectload_perinstructor.php'); ?>
      </table>
    </div><br><br>      

<?php 
}
getFooterContents();
?>            
</div>
</div>

<script type="text/javascript">
 $(document).ready(function () {
   $('#sidebarCollapse').on('click', function () {
     $('#sidebar').toggleClass('active');
     $(this).toggleClass('active');
   });
 });
</script>
</body>
</html>
<?php
}

else{
  header("Location: /cvsuportal");
}
?>  