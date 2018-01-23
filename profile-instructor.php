<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>DIT Portal | <?php echo $instructors_page_title; ?></title>
  <?php
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
        <div class="sidebar-header">
          <a href="#"><img src="img/sample.jpg" id="img" title="Profile" class=" center-block"></a>
          <a href="#"><img src="img/sample.jpg" id="collapsed" title="Profile" class=" center-block"></a><br>
          <h2 class="text-center" id="hide"><?php $XDLINE::getfullname($_SESSION['users_details']); ?></h2>
        </div>
        <ul class="list-unstyled components" style="font-size: 15px;">
          <li>
            <a href="#">
              <i class="fa fa-user-o"></i>
              Profile
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              Subject
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar-o"></i>
              Schedule
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-hand-grab-o"></i>
              Advisory
            </a>
          </li>
        </ul>
      </nav>
      <div id="content">
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
            <li class="dropdown pull-right" style="list-style: none">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account&nbsp;&nbsp;
               <span class="fa fa-angle-down"></span></a>
               <ul class="dropdown-menu">
                <li><a href="#" class="nav-text"><i class="fa fa-gear"></i> Settings</a></li>
                <li><a href="lib/logout" class="nav-text"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </div>
            <div class="col-md-12 col-xs-12">
              <div class="row">
                <h2>Profile</h2>
                <p>Professor's Name : Juan Dela Cruz</p>
                <p>Department : Department of Information Technology</p>
              </div>
            </div>   
          </div>
        </nav>
        
        <div class="modal fade" id="modal" role="dialog" style="overflow-y: hidden;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">DCIT65 - Web Developnent</h4>
              </div>
              <div class="modal-body">
                <table class="table table-striped">
                  <tr><br>
                    <th>Action</th>
                    <th>Course</th>
                    <th>Year/Section</th>
                  </tr>
                  <tr>
                    <td><button class="fa fa-pencil"  data-toggle="modal" data-target="#modal-addhomework" title="Add Work" data-dismiss="modal"  title="Add Work"></button></td>
                    <td>BS Computer Science</td>
                    <td>3A</td>
                  </tr>
                  <tr>
                    <td><button class="fa fa-pencil" title="Add Work"></button></td>
                    <td>BS Information Technology</td>
                    <td>4B</td>
                  </tr>
                  <tr>
                    <td><button class="fa fa-pencil" title="Add Work"></button></td>
                    <td>BS Computer Science</td>
                    <td>2E</td>
                  </tr>

                </table>
              </div>
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
         <table class="table table-striped table-hover">
          <tr>
            <th>Action</th>
            <th>Course Code</th>
            <th>Course Title</th>
          </tr>
          <tr>
            <td><button class="fa fa-pencil-square-o" data-toggle="modal" data-target="#modal"></button></td>
            <td>DCIT65</td>
            <td>Web Development</td>
          </tr>
          <tr>
            <td><button class="fa fa-pencil-square-o" data-toggle="modal" data-target="#modal"></button></td>
            <td>DCIT50</td>
            <td>Object Oriented Programming</td>

          </tr>
          <tr>
            <td><button class="fa fa-pencil-square-o" data-toggle="modal" data-target="#modal"></button></td>
            <td>COSC70</td>
            <td>Database Systems</td>

          </tr>
        </table>
      </div><br><br>

      <div class="col-md-12" style="background-color: white;">
       <h2>Advisory</h2>
       <table class="table table-striped table-hover">
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
  getFooterContents();
  ?>            
</div>
</div>

<script src = "js/jquery.min.js"></script>
<script src = "js/bootstrap.min.js"></script>

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