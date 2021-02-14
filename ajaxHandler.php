<?php
    require_once("include/Student.php");
    require_once("include/Course.php");
    $student1 = new Student();
    
    if($_POST['action'] == 'delete'){
    	$student1->deactivateStudent($_POST['stud_id']);
        unset($student1);
    }
    elseif($_POST['action'] == 'update'){
    	$student1->updateStudentDetails($_POST['fname'],$_POST['lname'],$_POST['stud_id']);
        unset($student1);
    }
    elseif($_POST['action'] == 'deleteCourse'){
        $scourse1 = new Course();
    	$scourse1->deactivateCourse($_POST['course_id']);
        unset($scourse1);
    }
    elseif($_POST['action'] == 'updateCourse'){
    	$scourse1->updateCourseDetails($_POST['name'],$_POST['course_id']);
        unset($scourse1);
    }
    elseif($_POST['action'] == 'getMoreCourses'){
        $student1->loadMoreStudentCourseList($_POST['page_num']);
        unset($student1);
    }
    elseif($_POST['action'] == 'enrolCourse'){
        $student1->enrolCourse($_POST['enrolArr']);
        unset($student1);
    }
   

?>