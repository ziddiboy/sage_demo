<?php
	
	include_once 'include/Course.php';
  include_once 'include/Student.php';
  include_once 'include/common_includes.php';
	$course_obj1 = new Course();
  $student_obj1 = new Student();
  $studentArray = $student_obj1->get_students();
  $courseArray = $course_obj1->get_courses();


?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script>
$(document).ready(function(){
  var courses = <?php echo json_encode($courseArray); ?>;
  var students = <?php echo json_encode($studentArray); ?>;
  var total_elements =1;

  console.log(courses);
  var html="";
  
  $(document).on("click", ".addFields", function() {
    total_elements += 1;
    html = '<div style="padding: 5px !important" >'+
            '<select name="student[]" style="padding:2px !important; margin: 4px !important;">'+
              '<option value="">Select Student</option>';
    $.each(students, function(index, students){
      html += '<option value="'+students.stud_id +'">'+students.fname +' '+students.lname +'</option>';
    });
      
      html +='</select>';

    html += '<select name="course[]" style="padding:2px !important; margin: 4px !important;">'+
              '<option value="">Select Course</option>';
    $.each(courses, function(index, courses){
      html += '<option value="'+courses.course_id +'">'+courses.course_name +'</option>';
    });
      
      html +='</select>'+
            '<button style="padding:2px !important; margin: 4px !important;" class="removeFields" data-count="1">Remove</button>'+
            '</div>';
    $("#listContainer").append(html);

  });
  $("#enrolStudent").click(function(){
    var emptyField =0;
      var courses = $.map($('select[name="course[]"]'), function (e) {
                    if($('option:selected', e).val()=="")
                      {
                        emptyField +=1;
                        return false;
                      }
                     return $('option:selected', e).val();
                 });
      var students = $.map($('select[name="student[]"]'), function (e) {
                      if($('option:selected', e).val()=="")
                      {
                        emptyField +=1;
                        
                        return false;
                      }
                     return $('option:selected', e).val();
                 });
      if(emptyField>0)
      {
        alert("Please select course in all dropdown");
        return false;
      }
      var myAssociativeArr = [];
      for (var i=0; i < total_elements; i++) {
        myAssociativeArr.push({
            course_id: courses[i],
            stud_id: students[i]
        });
    }
    console.log(myAssociativeArr);
    $.ajax({
              type: "POST",
              url: "ajaxHandler.php",
              data: {"action":"enrolCourse","enrolArr": myAssociativeArr},
              success: function(response) {                                  
                location.reload();
              }
    });
    
  });
  
  //to get click event for dynamically created fields
  $(document).on("click", ".removeFields", function() {
      total_elements -= 1;
      $(this).parent().remove(); 
  });
  

});
</script>

<div class="well" id="container">
<a class="button" href="index.php">Home</a>
<h1>Student Course Registration</h1>
<hr>
  <div id="listContainer">
    <div style="padding: 5px !important;">
      <select name="student[]"  style="padding:2px !important; margin: 4px !important;">
        <option value="">Select Student</option>
        <?php
            foreach ($studentArray as $student) { ?>
               <option value="<?= $student['stud_id']?>"><?= $student['fname']." "?><?= $student['lname']?></option>
            <?php }
        ?>
      </select>
      <select name="course[]" style="padding:2px !important;">
        <option value="">Select Course</option>
        <?php
            foreach ($courseArray as $course) { ?>
               <option value="<?= $course['course_id']?>"><?= $course['course_name']?></option>
            <?php }
        ?>
      </select>
      <button class="addFields" data-count="1" style="padding:2px !important; margin: 4px !important;">Add</button>
    </div>    
  </div>
  <button id="enrolStudent" data-count="1">enrol</button>

</div>
