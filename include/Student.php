<?php

include_once "db_conn.php";

	class Student{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.Something Went wrong!!";
			        exit;
			}
		}

		//For student registration.
		public function reg_user($fname, $lname,$dob, $contact){
				// echo $contact;die();
			
				$sql1 = "INSERT INTO student 
							SET 
							fname='$fname', 
							lname='$lname', 
							dob ='$dob', 
							contact='$contact',
							is_active = 1 ";
				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
		}
		//get all students from DB
		public function get_students(){
    		$sql2 ="SELECT `fname`,`lname`,`stud_id` FROM student WHERE is_active = 1";
    		
	        $result = mysqli_query($this->db,$sql2);	        
	  		$user_data = array();
			while ($row = mysqli_fetch_assoc($result)) {
			  $user_data[] = $row;
			}
	        if(count($user_data))
	        	return $user_data;
	        else
	        	return false;
    	}
    	//deactivate student
    	public function deactivateStudent($stud_id){
    		$sql3 = "UPDATE student SET is_active= 0  WHERE `stud_id`=$stud_id";
    		// echo $sql3;
			if (mysqli_query($this->db, $sql3)) {
			  echo true;
			} else {
			  echo "Error updating record: " . mysqli_error($this->db);
			}
    	}
    	//update fname lname
    	public function updateStudentDetails($fname,$lname,$stud_id){
    		$sql4 = "UPDATE student SET fname= '$fname',lname='$lname' WHERE `stud_id`=$stud_id";
    		
			if (mysqli_query($this->db, $sql4)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($this->db);
			}
    	}
    	//enroll student
    	public function enrolCourse($enrolArr){    		
    		foreach ($enrolArr as $enrolCourse) {
    			$course_id =  $enrolCourse['course_id'];
    			$stud_id =  $enrolCourse['stud_id'];
    			$sql1 = "INSERT INTO student_course_mapping 
							SET 
							stud_id='$stud_id', 
							course_id='$course_id'";				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
    		}

        	return $result;
    	}

    	//get student course mapping
    	// echo json_encode($products);
    	public function getStudentCourseList()
    	{
    		$sql_stmt = "SELECT fname,course_name FROM `student_course_mapping` 
    					JOIN student ON 
    					`student_course_mapping`.`stud_id` = `student`.`stud_id` 
    					JOIN course ON 
    					`course`.`course_id`= `student_course_mapping`.`course_id` LIMIT 0 , 5";	

    		$result = mysqli_query($this->db,$sql_stmt);	        
	  		$user_course_data = array();
			while ($row = mysqli_fetch_assoc($result)) {
			  $user_course_data[] = $row;
			}
	        if(count($user_course_data))
	        	return $user_course_data;
	        else
	        	return false;

    	}
    	//load more courses
    	public function loadMoreStudentCourseList($page)
    	{
    		$limit = 5;
    		if($page == 1)
			{
				$start = 0;	
			}
			else
			{
				$start = ($page - 1) * $limit;	
			}
    		// calculate here the total number
    		$sql_stmt = "SELECT fname,course_name FROM `student_course_mapping` 
    					JOIN student ON 
    					`student_course_mapping`.`stud_id` = `student`.`stud_id` 
    					JOIN course ON 
    					`course`.`course_id`= `student_course_mapping`.`course_id` LIMIT $start , $limit";	

    		$result = mysqli_query($this->db,$sql_stmt);	        
	  		$user_course_data = array();
			while ($row = mysqli_fetch_assoc($result)) {
			  $user_course_data[] = $row;
			}

	        if(count($user_course_data))
	        	echo json_encode($user_course_data);
	        else
	        	return false;

    	}
    	//get student course mapping total count
    	public function getStudentCourseCount()
    	{
    		$sql_stmt = "SELECT fname,course_name FROM `student_course_mapping` 
    					JOIN student ON 
    					`student_course_mapping`.`stud_id` = `student`.`stud_id` 
    					JOIN course ON 
    					`course`.`course_id`= `student_course_mapping`.`course_id`";	

    		$result = mysqli_query($this->db,$sql_stmt);	
    		$totalRecord=mysqli_num_rows($result);  
	        
	        return $totalRecord;

    	}
		

	}


?>