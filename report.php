<?php
	
	include_once 'include/Student.php';
	include_once 'include/common_includes.php';
	$user = new Student();
?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<script>
$(document).ready(function(){
	var start = 1;
	var end = 5
	var size = 5;
	  $("#next_btn").click(function(){
	    var page_num = $(this).data("page");
	    var total_pages = $('#total_pages').val();
	    var total_records = $('#total_records').val();

	    if(page_num == total_pages)
	    {
	    	$("#next_btn").attr('disabled', true); 	

	    }else{
	    	// $("#prev_btn").attr('disabled', false);
	    	$("#next_btn").data('page', page_num+1);
	    }
	    $("#prev_btn").attr('disabled', false);    
	    $("#prev_btn").data('page', page_num-1);
	    if(page_num >1){
	    	 start = ((page_num-1)*size)+1;
	    	if(((page_num-1)*size)+size > total_records)
	  			end = ((page_num-1)*size)+(total_records-((page_num-1)*size));
			else
	    		end = ((page_num-1)*size)+size;
	    }
	    $("#start_num").html(start);
	    $("#end_num").html(end);
	    var html = "";
	    console.log($("#next_btn").data("page"));
	    $.ajax({
	            type: "POST",
	            url: "ajaxHandler.php",
	            data: {"action":"getMoreCourses","page_num": page_num},
	            success: function(response) {
	                  
	                 // console.log(response);                
	                  // $("#next_btn").data('page', page_num+1);
	                  $('#table_data').html('');

	                  data = JSON.parse(response);
					$.each(data, function(index, course){
						html += '<tr>'+
									'<td>'+course.fname +'</td>'+
									'<td>'+course.course_name +'</td>'+
								'<tr>';
					});
					$('#table_data').html(html);
			            }
		});
});

  $("#prev_btn").click(function(){
	    var page_num = $(this).data("page");
	    var total_pages = $('#total_pages').val();
	    
	    $("#next_btn").attr('disabled', false); 
	    	
	    if(page_num <2)
	    		$("#prev_btn").attr('disabled', true);
	    else
	    	$("#prev_btn").data('page', page_num-1);
	   
	    $("#next_btn").data('page', page_num+1);
	    if(page_num >1){
	    	 start = ((page_num-1)*size)+1;
	    	 end = ((page_num-1)*size)+size;
	    }else{
	    	start =1;
	    	end= 5
	    }
	    $("#start_num").html(start);
	    $("#end_num").html(end);
	    var html = "";
	    console.log($("#prev_btn").data("page"));
	    
	    $.ajax({
	            type: "POST",
	            url: "ajaxHandler.php",
	            data: {"action":"getMoreCourses","page_num": page_num},
	            success: function(response) {
	                 
	                              
	                  // $("#next_btn").data('page', page_num+1);
	                  $('#table_data').html('');

	                  data = JSON.parse(response);
					$.each(data, function(index, course){
						html += '<tr>'+
									'<td>'+course.fname +'</td>'+
									'<td>'+course.course_name +'</td>'+
								'<tr>';
					});
					$('#table_data').html(html);
			            }
		});
	});

  

  

});
</script>
<div class="well" id="container">
<a class="button" href="index.php">Home</a>
<h1>Report</h1>
<hr>
<?php
		$total_records = $user->getStudentCourseCount();		
		if($total_records >0) { 
			$student_course_mapping = $user->getStudentCourseList(); ?>
		
		<table >
			<tr>
				<th>StudentName</th>
				<th>CourseName</th>
			</tr>
			<tbody id="table_data">
		<?php 
		foreach ($student_course_mapping as $report) { ?>
			<tr>
			    <td><?= $report['fname']?></td>
			    <td><?= $report['course_name']?></td>
			  </tr>
		<?php }
	?>
		</tbody>
 
</table>
	
	<hr>
	<h5 style="text-align:center">Showing <span id="start_num">1</span> to <span id="end_num">5 records</span> of <span><?= $total_records?></span></h5>
	<?php
		if($total_records % 5 == 0)
			$total_pages = $total_records/5;
		else
			 $total_pages = ceil($total_records/5);
	?>
	<input type="hidden" type="text" name="total_pages" value="<?= $total_pages?>" id="total_pages" />
	<input type="hidden" type="text" name="total_records" value="<?= $total_records?>" id="total_records" />
	<?php
		if($total_pages >1) {?>
		<div>
		<button  style="margin:10px" disabled data-page="1" id= "prev_btn">Previous</button>
		<button  id="next_btn" data-page="2">Next</button>
	</div>
	
	
 <?php } }  else { ?>
      <h4 style="text-align:center">No course mapping available</h4>
    <?php } ?>
</div>