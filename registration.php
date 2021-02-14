<?php 

	include_once 'include/Student.php';  
	include_once 'include/common_includes.php';
	$stud = new Student(); 

	if (isset($_REQUEST['submit'])){
		extract($_REQUEST);
		$register = $stud->reg_user($fname, $lname,$dob, $contact);
		if ($register) {
			// Registration Success			
			echo "Student Registration done successfully";
		} else {
			// Registration Failed
			echo 'Registration failed. Email or Username already exits please try again';
		}
	 }
?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<script type="text/javascript" language="javascript">
 function submitreg() {
	 var form = document.registration;
	 if(form.fname.value == ""){
		 alert( "Enter first name." );
		 return false;
	 }
	 else if(form.lname.value == ""){
		 alert( "Enter last name." );
		 return false;
	 }
	 else if(form.dob.value == ""){
		 alert( "Enter date of birth." );
		 return false;
	 }
	 else if(form.contact.value == ""){
		 alert( "Enter contact." );
		 return false;
	 }
 }
</script>
<div class="well" id="container">
<a class="button" href="index.php">Home</a>
<h1>Student Registration</h1>
<hr>
<form action="" method="post" name="registration">
  <div class="form-group">
    <label>First Name</label>
    <input class="form-control" type="text" name="fname" required="" />
    </div>
  <div class="form-group">
    <label>Last Name</label>
    <input class="form-control" type="text" name="lname" required="" />
    </div>
  <div class="form-group">
    <label>DOB</label>
    <input class="form-control" type="date" name="dob" required="" />
    </div>
  <div class="form-group">
    <label>Contact</label>
    <input class="form-control" type="tel" name="contact" placeholder="(012) 123 9868" pattern="[0-9]{10}" required="" />
    </div>

<input class="form-control" onclick="return(submitreg());" type="submit" name="submit" value="Register" />
</form>
</div>
