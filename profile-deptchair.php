<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>DIT Portal | <?php echo $deptchair_page_title; ?></title>        
        <?php
        session_start();
          getHeaderAssets();
          if(isset($_SESSION['users_details'])){
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
                    <li>
                        <a href="#">
                            <i class="fa fa-user-o"></i>
                            Faculties
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
					         	 	<li><a href="#" class="nav-text"><span class="fa fa-gear"></span> Settings</a></li>
					            	<li><a href="lib/logout.php" class="nav-text"><span class="fa fa-sign-out"></span> Logout</a></li>
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
                
                <!-- Popup Modal View Subject -->
                      <div class="modal fade" id="modal" role="dialog" style="overflow-y: hidden;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">DCIT 65 - Web Developnent</h4>
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
                            </div>
                          </div>
                        </div>
                      </div>


                <!-- Popup Modal Sections Activity -->
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

                <!-- Popup Modal View Class -->
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
                            </div>
                          </div>
                        </div>
                      </div>

                <!-- Popup Modal View Student -->
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
                            </div>
                          </div>
                        </div>
                      </div>        

                <div class="col-md-12" style="background-color: white;">
                       <h2>Faculties</h2>
                            <table class="table table-striped table-hover" id="faculties-table">
                                <tr>
                                    <th>Action</th>
                                    <th>Surname</th>
                                    <th>First Name</th>   
                                    <th>Middle Name</th>   
                                    <th>Ext.</th>   
                                    <th>Total Units</th>   
                                </tr>
                                <tr>
                                    <td><button class="fa fa-user" data-toggle="modal" data-target="#modal-viewinstructor" onclick="loadSubjectById(1);"></button></td>
                                    <td>Dela Cruz</td>
                                    <td>Juan</td>
                                    <td>Cortez</td>
                                    <td></td>
                                    <td>30</td>
                                </tr>                                
                                <tr>
                                    <td><button class="fa fa-user" data-toggle="modal" data-target="#modal-viewinstructor" onclick="loadSubjectById(2);"></button></td>
                                    <td>Dela Cruz</td>
                                    <td>Juan</td>
                                    <td>Cortez</td>
                                    <td>Jr</td>
                                    <td>30</td>
                                </tr>                                
                                <tr>
                                    <td><button class="fa fa-user" data-toggle="modal" data-target="#modal-viewinstructor" onclick="loadSubjectById(1);"></button></td>
                                    <td>Dela Cruz</td>
                                    <td>Juan</td>
                                    <td>Cortez</td>
                                    <td>III</td>
                                    <td>30</td>
                                </tr>
                             </table>
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
                                <div class="row">

                                </div> 
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-viewclass" data-dismiss="modal">Back</button>
                            </div>
                          </div>
                        </div>
                      </div>

                <!-- Popup Modal View Instructor -->
                      <div class="modal fade" id="modal-viewinstructor" role="dialog" style="overflow-y: hidden;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Dela Cruz, Juan C.</h4>
                            </div>
                            <div class="modal-body">
                              <div class="container-fluid">
                                <div class="row"><br>
                                  <div class="col-md-3 col-sm-3 col-xs-3 text-center center-block">
                                    <a href="" data-toggle="modal" data-target="#modal-viewStudent"><img src="img/sample.jpg" data-dismiss ="modal" id="view-class" class="img-circle"></a>
                                  </div>
                                  <div class="col-md-9 col-sm-9 col-xs-9 text-center center-block">   

                                  <table class="table table-striped table-hover" id="subj-table"> 
                                                                                                            
                                  </table>

                                    <button type="button" class="btn btn-primary" id="addLoad">Add Load</button>
                                    <button type="button" class="btn btn-primary" id="addAdvisory">Add Advisory Class</button>
                                  </div>

                                  
                                        <script type="text/javascript">
                                        function loadSubjectById($user_id){
                                          $("#subj-table tbody *").remove();  
                                          $("#subj-table").prepend('<tr><th>Course Code</th><th>Course Description</th><th>Course</th><th>Year</th><th>Section</th></tr>');                                       
                                          $.post("inc/subjects_byload.php", {
                                                  uid: $user_id, 
                                                  ay: '<?php echo $_SESSION['users_details']['acad_year'];?>'},
                                            function(callback){   
                                            var subload = JSON.parse(callback);   
                                              subload.subjects.forEach(function(item){
                                                $("#subj-table tbody").append("<tr>" + "<td>" + item.course_code +"</td>" + "<td>" + item.course_title +"</td>" + "<td>" + item.course +"</td>" + "<td>" + item.year +"</td>" + "<td>" + item.section +"</td>" + "</tr>");                                                
                                              });
                                            }
                                          );
                                        }   

                                        function loadInstructorsByDept($user_id){
                                          $("#faculties-table tbody *").remove();  
                                          $("#faculties-table").prepend('<tr><th>Action</th><th>Last Name</th><th>First Name</th><th>Middle Name</th><th>Ext.</th><th>Total Units</th></tr>');                                       
                                            $.post("inc/instructors_bydept.php", {
                                                    uid: $user_id},
                                              function(callback){   
                                              var faculties = JSON.parse(callback);   
                                                faculties.instructors.forEach(function(item){
                                                  $("#faculties-table tbody").append("<tr>" + "<td><button class='fa fa-user' data-toggle='modal' data-target='#modal-viewinstructor' onclick='loadSubjectById(" + item.instructor_id +")'></button></td>" + "<td>" + item.last_name +"</td>" + "<td>" + item.first_name +"</td>" + "<td>" + item.middle_name +"</td>" + "<td>" + item.extension +"</td>" + "<td>" + item.total_units +"</td>" + "</tr>");                                                
                                                });
                                              }
                                            );
                                          }
                                        loadInstructorsByDept('<?php echo $_SESSION['users_details']['user_id'];?>');
                                        </script> 

                                 </div> 
                              </div>
                            </div>
                            <div class="modal-footer">
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
    header("Location: /test/cvsuportal");
  }
?>  