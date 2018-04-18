<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>DIT Portal | <?php echo $instructors_page_title; ?></title>
  <?php
  $pager = "";
   if(isset($_REQUEST['content'])) :
    $pager = $_REQUEST['content'];
  endif;
  session_start();
  getHeaderAssets();
  if(isset($_SESSION['users_details'])){
    switch ($_SESSION['users_details']['account_type']) {
      case 'instructor':
                // header('Location: /cvsuportal/profile-instructor');
      break;
      case 'deptchair':
      header('Location: /cvsuportal/profile-deptchair');
      break;
      case 'student':
      header('Location: /cvsuportal/profile-student');
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
       $navicons = ["fa-user-o", "fa-book", "fa-calendar-o", "fa-hand-grab-o", "fa-plus"];
       ___user_navigation("img/profile/".getProfilePicture(), array(
          'Profile' => "profile-instructor",
          'Subjects' => "#",
          'Schedule' => "#",
          'Advisory' => "#",
          'Generate Student' => "?content=generatepass"
        ), $navicons);
        ?>
      </nav>
      <div id="content">

        <?php if($pager == 'generatepass') {
          ___generate_student();
        }else if ($pager == 'profileImg') {
          ___profile_image();
        }else {
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
              <p>Professor's Name : <?php $XDLINE::getfullname($_SESSION['users_details']); ?></p>
              <p>Department : Department of Information Technology</p>
            </div>
          </div>   
        </div>
      </nav>

      <!-- Popup Modal View Subject -->
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
            
         </div>
       </div>
     </div>


     <div class="col-md-12" style="background-color: white;">
       <h2>Subject</h2>
       <table class="table table-striped table-hover table-responsive table-responsive">
        <?php include_once('inc/subjectload_perinstructor.php'); ?>
      </table>
    </div><br><br>

    <div class="col-md-12" style="background-color: white;">
     <h2>Advisory</h2>
     <table class="table table-striped table-hover table-responsive table-responsive">        
      <tr>
        <th>Action</th>
        <th>Course</th>
        <th>Year/Section</th>   
      </tr>
      <tr>
        <td><button class="fa fa-user" data-toggle="modal" data-target="#modal-viewclass"></button></td>
        <td>BS Information Technology</td>
        <td>4th Year - A</td>
      </tr>
      <tr>
        <td><button class="fa fa-user" data-toggle="modal" data-target="#modal-viewclass"></button></td>
        <td>BS Computer Science</td>
        <td>3rd Year - B</td>
      </tr>
      <tr>
        <td><button class="fa fa-user" data-toggle="modal" data-target="#modal-viewclass"></button></td>
        <td>BS Information Technology</td>
        <td>2nd Year - C</td>
      </tr>
    </table>
  </div>
  <div class="modal fade" id="modal-viewclass" role="dialog" style="overflow-y: hidden;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BS Information Technology - 4A</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row"><br>
              <div class="col-md-3 col-sm-3 col-xs-3 text-center center-block">
                <a href="" data-toggle="modal" data-target="#modal-viewStudent"><img src="img/sample.jpg" data-dismiss ="modal" id="view-class" class="img-circle"></a><p>Joyce Byers</p>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3 text-center center-block">
                <img src="img/sample.jpg" id="view-class" class="img-circle"><p>Mike Wheeler</p>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3 text-center center-block">
                <img src="img/sample.jpg" id="view-class" class="img-circle"><p>Jonathan Byers</p>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3 text-center center-block">
                <img src="img/sample.jpg" id="view-class" class="img-circle"><p>Jim Hopper</p>
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-viewStudent" role="dialog" style="overflow-y: hidden;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">BS Information Technology - 4A</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row"><br>
             <div class="col-md-12">
               <img src="img/sample.jpg" id="view-class" class="img-circle center-block"><p class="text-center"><br>Joyce Byers</p><hr style="width: 300px;"><br>
             </div>
             <div class="col-md-6 col-sm-6">
               <p><b>Full Name:</b> Joyce Byers</p>
               <p><b>Course:</b> BS Information Tech.</p>
               <p><b>Student No:</b> 2016-01-526</p>
             </div>
             <div class="col-md-6 col-sm-6">
               <p><b>Address:</b> Hawkins, Indiana</p>
               <p><b>Year/Sec:</b> 4A</p>
               <p><b>Validation No:</b> 0188</p>
             </div>
           </div> 
         </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-viewclass" data-dismiss="modal">Back</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>        

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