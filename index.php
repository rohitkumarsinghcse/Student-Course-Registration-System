<?php
 session_start();
 include('include/header.php'); 
 include 'connection.php';
 $msg="";
 if (isset($_POST['remove'])) {
 	// sql to delete a record
 	$c_c= $_POST['course_code'];
	$del = "DELETE FROM user_course WHERE course_code='$c_c';";

	if (mysqli_query($conn, $del)) {
	  $msg="<h3 class='bg-success mt-5 p-2 text-white text-center'>Course Removed successfully</h3>";
	} else {
	  $msg="<h3 class='bg-success mt-5 p-2 text-white text-center'>Course Remove Failed! try again</h3>";
	}
 }
 ?>

  <div class="jumbotron jumbotron-fluid">
  	<div class="bg-warning shadow-lg p-2">
  		<h1 class="text-center">Welcome <?php echo $_SESSION['fullname']?></h1>
  	</div>
  	<div class="container"><?php echo $msg;?></div>
    <div class="container">
        
        <div class="mt-4 border">
        	<table class="table table-hover border">
			  
			         <?php
			            $a_q="select * from user_course where user_id=".$_SESSION['user_id'].";";
			        
			            $re=mysqli_query($conn, $a_q);
			        if (mysqli_num_rows($re)>0) {
			        		
			            	?>

			    <thead class="thead-dark">
			    	<tr>
					    <h3 class="text-center">Your Course Details:</h3>
					</tr>
			      <tr>
			      	<th>S. N.</th>
			        <th>COURSE CODE</th>
			        <th>COURSE NAME</th>
			        <th>L</th>
			        <th>T</th>
			        <th>P</th>
			        <th>Cr</th>
			        <th>Remove</th>
			      </tr>
			    </thead>
			    <tbody>

			       <?php
			       $co=1;
			          while ($r=mysqli_fetch_assoc($re)) {
			       ?>
			     <tr> 
			      <td><?php echo $co;?></td>
			      <td><?php echo $r['course_code']?></td>
			      <td><?php echo $r['course_name']?></td>
			      <td><?php echo $r['l']?></td>
			      <td><?php echo $r['t']?></td>
			      <td><?php echo $r['p']?></td>
			      <td><?php echo $r['cr']?></td>
			      <td>
			      	<form method="POST">
			      		<input type="hidden" name="course_code" value="<?php echo $r['course_code']?>">
			      		<i class="fa fa-trash"></i><input type="submit" name="remove" value="Remove" class="bt bg-danger" title="Click to Remove Course">
			     	</form>
			     </td>
			     
			     </tr>
			         <?php
			             $co++;
			             }
			        }else{
			          ?>
			            <tr>
					       <td>
					       	<div class="text-dark text-center"><h3> No Course Found! Add more course now...</h3></div>
					       </td>  	
					    </tr>
			           <?php
			       	}
			       	?>
			    </tbody>
			    
		  	</table>
		  	<div class="container">
				<a class="btn btn-primary btn-end" href="add_course.php">Add more Course</a>
			</div>
        </div>
        <hr class="my-4">
     
    </div>
  </div>

<?php include('include/footer.php'); ?>