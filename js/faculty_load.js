var facultyNames = [];

function loadSubjectById(user_id, index, ay){

  $(".modal-title.instructor-name").text(facultyNames[index]);
  $("#subj-table tbody *").remove();  
  $("#subj-table").prepend('<tr><th>Course Code</th><th>Course Description</th><th>Course</th><th>Year</th><th>Section</th><th>Mode</th></tr>');                                       
  $.post("inc/subjects_byload.php", {
    uid: user_id, 
    ay: ay},
    function(callback){   
      var subload = JSON.parse(callback);   
      subload.subjects.forEach(function(item){
        $("#subj-table tbody").append("<tr>" + "<td>" + item.course_code +"</td>" + "<td>" + item.course_title +"</td>" + "<td>" + item.course +"</td>" + "<td>" + item.year +"</td>" + "<td>" + item.section +"</td>" + "<td>" + item.mode +"</td>" +"</tr>");                                                
        $("#addLoad").attr('data-id', user_id);
      });
    }
    );
}   

function loadInstructorsByDept(user_id, ay){
  var counter = 0;
  $("#faculties-table tbody *").remove();  
  $("#faculties-table").prepend('<tr><th>Action</th><th>Last Name</th><th>First Name</th><th>Middle Name</th><th>Ext.</th><th>Total Units</th></tr>');
  $.post("inc/instructors_bydept.php", {
    uid: user_id},
    function(callback){   
      var faculties = JSON.parse(callback);   
      faculties.instructors.forEach(function(item){
        $("#faculties-table tbody").append("<tr>" + "<td><button class='fa fa-user' data-toggle='modal' data-target='#modal-viewinstructor' onclick='loadSubjectById(" + item.instructor_id +", "+ counter +", \""+ ay +"\")'></button></td>" + "<td>" + item.last_name +"</td>" + "<td>" + item.first_name +"</td>" + "<td>" + item.middle_name +"</td>" + "<td>" + item.extension +"</td>" + "<td>" + item.total_units +"</td>" + "</tr>");    
        facultyNames[counter] = item.last_name + ", " + item.first_name + " " + item.middle_name.charAt(0) +".";                              
        counter++;
      });
    }
    );
}