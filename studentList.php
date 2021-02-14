<?php
	
	include_once 'include/Student.php';
  include_once 'include/common_includes.php';
	$user = new Student();

?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script>
$(document).ready(function(){
  $(".deleteStudent").click(function(){
    var row_id = $(this).data("id");
    $.ajax({
            type: "POST",
            url: "ajaxHandler.php",
            data: {"action":"delete","stud_id": $(this).data("id")},
            success: function(response) {
                 // $("#results").html(response);
                  $('#row_'+row_id).remove();
            }
        });
  });

  $(".editStudent").click(function(){
    $('#exampleModal').modal('show');
    $('#fname_modal').val($(this).data("fname"));
    $('#lname_modal').val($(this).data("lname"));
    $('#studID').val($(this).data("id"));
  });
  $("#exampleModalLabel").on('hide.bs.modal', function(){
    $('#fname_modal').val("");
    $('#lname_modal').val("");
    $('#studID').val("");
  });

  $("#update_details").click(function(){
    console.log("here");
    var fname = $('#fname_modal').val();
    var lname = $('#lname_modal').val();
    var stud_id = $('#studID').val();
    if(fname == "" || lname =="")
    {
      alert("firstname or Lastname cant be empty");
      return false;
    }
    $.ajax({
            type: "POST",
            url: "ajaxHandler.php",
            data: {"action":"update","stud_id": stud_id,"fname": fname,"lname": lname},
            success: function(response) {     
            	$('#exampleModal').modal('hide');     
            	$('#update_'+stud_id).data('fname', $('#fname_modal').val());
            	$('#update_'+stud_id).data('lname', $('#lname_modal').val());

                $('#fname_col_'+stud_id).html($('#fname_modal').val());
    			$('#lname_col_'+stud_id).html($('#lname_modal').val());
            }
        });
  });

});
</script>

<div class="well" id="container">
<a class="button" href="index.php">Home</a>
<h1>Student List</h1>
<hr>
<?php
    $studentList = $user->get_students();
    if(!empty($studentList)){ ?>
    <table>
    	<tr>
    		<th>Firstname</th>
    		<th>Lastname</th> 
    		<th></th>
    	</tr>
	 <?php
		foreach ($studentList as $student) { ?>
			<tr id="row_<?= $student['stud_id']?>">
			    <td id="fname_col_<?= $student['stud_id']?>"><?= $student['fname']?></td>
			    <td id="lname_col_<?= $student['stud_id']?>"><?= $student['lname']?></td>
			    <td><button  style="margin:10px" class="deleteStudent" data-id="<?= $student['stud_id']?>">Delete</button>
			    	<button  id="update_<?= $student['stud_id']?>" class="editStudent" data-fname="<?= $student['fname']?>" data-lname="<?= $student['lname']?>"data-id="<?= $student['stud_id']?>">Edit</button></td>
			</tr>
		<?php }?>
 
  </table>
  <?php } else { ?>
      <h4 style="text-align:center">No students available</h4>
    <?php } ?>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		  <div class="form-group">
		    <label>First Name</label>
		    <input class="form-control" type="text" name="fname" id="fname_modal" required="" />
		    </div>
		  <div class="form-group">
		    <label>Last Name</label>
		    <input class="form-control" type="text" name="lname" id="lname_modal" required="" />
		    <input type="hidden" class="form-control" type="text" name="studID" id="studID" />
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update_details" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>