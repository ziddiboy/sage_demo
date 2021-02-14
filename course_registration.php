<?php 

	include_once 'include/Course.php'; 
	include_once 'include/common_includes.php'; 
	$course = new Course(); 

	if (isset($_REQUEST['submit'])){
		extract($_REQUEST);
		$register = $course->course_registration($name, $details);
		if ($register) {
			// Registration Success
			echo 'Course Registration done successful';
		} else {
			// Registration Failed
			echo 'Course Registration failed.  please try again';
		}
	 }
?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script type="text/javascript" language="javascript">
 function submitreg() {
	 var form = document.course_registration;
	 if(form.name.value == ""){
		 alert( "Enter course name." );
		 return false;
	 }
	 else if(form.details.value == ""){
		 alert( "Enter course details." );
		 return false;
	 }
	 
 }
</script>


<div class="well" id="container">
<a class="button" href="index.php">Home</a>
<h1>Course Registration</h1>
<hr>
<form action="" method="post" name="course_registration">
  <div class="form-group">
    <label>Name  : </label>
    <input class="form-control" type="text" name="name" required="" />
    </div>
  <div class="form-group">
    <label>Details:</label>
    <textarea class="form-control" name="details" rows="4" cols="50" required=""></textarea>
   </div>

<input onclick="return(submitreg());" type="submit" name="submit" value="Register" />
</form>
</div>
