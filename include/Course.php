<?php

include_once "db_conn.php";

	class Course{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.Something Went wrong!!";
			        exit;
			}
		}

		//function for course registration
		public function course_registration($name, $details){				
			
				$sql1 = "INSERT INTO course 
							SET 
							course_name='$name', 
							course_details='$details',
							is_active = 1 ";
				
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
		}
		//deactivate course
    	public function deactivateCourse($course_id){
    		$sql3 = "UPDATE course SET is_active= 0  WHERE `course_id`=$course_id";
    		// echo $sql3;
			if (mysqli_query($this->db, $sql3)) {
			  echo "Record deactivated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($this->db);
			}
    	}
    	//update fname lname
    	public function updateCourseDetails($name,$course_id){
    		$sql4 = "UPDATE course SET course_name= '$name' WHERE `course_id`=$course_id";
			if (mysqli_query($this->db, $sql4)) {
			  echo "Record updated successfully";
			} else {
			  echo "Error updating record: " . mysqli_error($this->db);
			}
    	}
    	//get all students from DB
		public function get_courses(){
    		$sql2 ="SELECT `course_name`,`course_id` FROM course WHERE is_active = 1";
	        $result = mysqli_query($this->db,$sql2);	        
	  		$course_data = array();
			while ($row = mysqli_fetch_assoc($result)) {
			  $course_data[] = $row;
			}
	        if(count($course_data))
	        	return $course_data;
	        else
	        	return false;
    	}

	}


?>