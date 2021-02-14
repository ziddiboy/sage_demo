<?php
	include_once 'include/common_includes.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Epic-student</title>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="/epic_student/include/css/main.css"> -->
	</head>
	<body>

  		<div style="margin-top:20px">
    		<h3 style="text-align:center">Epic Student project</h3>
    		<hr>          
  		</div>

		<button class="button" type="button" onclick="window.open('registration.php', '_self')">Add Student</button>
		<button class="button" type="button" onclick="window.open('studentList.php', '_self')">View Students</button>
		<button class="button" type="button" onclick="window.open('course_registration.php', '_self')">Add Course</button>
		<button class="button" type="button" onclick="window.open('courseList.php', '_self')">View Courses</button>
		<button class="button" type="button" onclick="window.open('course_enrol.php', '_self')">Course Enroll</button>
		<button class="button" type="button" onclick="window.open('report.php', '_self')">Reporting</button>
	</body>
</html>