<?php
	
	include_once 'include/Course.php';
  include_once 'include/common_includes.php';
	$course_obj = new Course();

?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script>
$(document).ready(function(){
  $(".deleteCourse").click(function(){
    var row_id = $(this).data("id");
    $.ajax({
            type: "POST",
            url: "ajaxHandler.php",
            data: {"action":"deleteCourse","course_id": $(this).data("id")},
            success: function(response) {
                 // $("#results").html(response);
                  $('#row_'+row_id).remove();
            }
        });
  });

  $(".editCourse").click(function(){
    $('#exampleModal').modal('show');
    $('#fname_modal').val($(this).data("cname"));
    $('#courseID').val($(this).data("id"));
  });
  $("#exampleModalLabel").on('hide.bs.modal', function(){
    $('#fname_modal').val("");
    $('#courseID').val("");
  });

  $("#update_details").click(function(){
    if($('#fname_modal').val() ==""){
      alert("Enter course name");
      return false;
    }
    console.log("here");
    var name = $('#fname_modal').val();
    var course_id = $('#courseID').val();
    $.ajax({
            type: "POST",
            url: "ajaxHandler.php",
            data: {"action":"updateCourse","course_id": course_id,"name": name},
            success: function(response) {     
            	$('#exampleModal').modal('hide');     
            	$('#update_'+course_id).data('cname', $('#fname_modal').val());
              $('#fname_col_'+course_id).html($('#fname_modal').val());
            }
        });
  });

});
</script>

<div class="well" id="container">
<a class="button" href="index.php">Home</a>
<h1>Course List</h1>
<hr>
<?php
    $courseList = $course_obj->get_courses();
    if(!empty($courseList)) { ?>
    <table>
    	<tr>
    		<th>Course name</th>
    		<th></th>
    	</tr>
	<?php 
		foreach ($courseList as $course) { ?>
			<tr id="row_<?= $course['course_id']?>">
			    <td id="fname_col_<?= $course['course_id']?>"><?= $course['course_name']?></td>
			    <td><button  style="margin:10px" class="deleteCourse" data-id="<?= $course['course_id']?>">Delete</button>
			    	<button  id="update_<?= $course['course_id']?>" class="editCourse" data-cname="<?= $course['course_name']?>" data-id="<?= $course['course_id']?>">Edit</button></td>
			</tr>
		<?php } ?>
    </table>
    <?php } else { ?>
      <h4 style="text-align:center">No courses available</h4>
    <?php }
	?>
 

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Course Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		  <div class="form-group">
		    <label>Name</label>
		    <input class="form-control" type="text" name="fname" id="fname_modal" required="" />
		    </div>
		  <div class="form-group">
		    <input type="hidden" class="form-control" type="text" name="courseID" id="courseID" />
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update_details" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>