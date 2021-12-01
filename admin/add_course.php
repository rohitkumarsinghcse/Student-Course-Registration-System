<?php
 include '../connection.php';


 include('include/header.php'); 
	
	$addMsg="";
	$course_code=$course_name=$l=$t=$p=$cr='';

	if(isset($_POST['add'])){
		
		$course_code=$_POST['course_code'];
		$course_name=$_POST['course_name'];
		$l=$_POST['l'];
		$t=$_POST['t'];
		$p=$_POST['p'];
		$cr=$_POST['cr'];

		$sql = "INSERT INTO tbl_course (course_code,course_name,l,t,p, cr) VALUES('$course_code','$course_name','$l','$t','$p','$cr')";

		if (mysqli_query($conn, $sql)) {
		  $addMsg= "<h3 class='bg-success text-white text-center mt-2'>Course Added successfully</h3>";
		} else {
		  $addMsg= "<h3 class='bg-danger text-white text-center mt-2'>Course Addition Failed</h3>";
		}
	}


 ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
	    <div class="text-green p-2"><h1>Add More Course</h1>
		</div>
		<?php echo $addMsg;?>
        <div class="mt-4 border">
        	<div class="container">
				<form class="form-group" method="POST">

		        	<table class="table table-hover">
					    <thead class="thead-dark">
					      <tr>
					        <th>COURSE CODE</th>
					        <th>COURSE NAME</th>
					        <th>L</th>
					        <th>T</th>
					        <th>P</th>
					        <th>Cr</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr><td>
						      	<input class="form-control" type="text" name="course_code" placeholder="Enter Course Code" required></td>
						      <td><input class="form-control" type="text" name="course_name" placeholder="Enter Course Name" required></td>
						      <td><input class="form-control" type="text" name="l" placeholder="L" required></td>
						      <td><input class="form-control" type="text" name="t" placeholder="T" required></td>
						      <td><input class="form-control" type="text" name="p" placeholder="P" required></td>
						      <td><input class="form-control" type="text" name="cr" placeholder="Cr" required></td>
					        
					      </tr>
					    </tbody>
				  	</table>
		  		<input class="btn btn-primary col-6" type="submit" name="add" value="Add Now">
		  		<div class="mt-4">Go To<a href="manage_course.php"> Manage Course</a></div>
			</form>
			</div>
        </div>
        <hr class="my-4">
    </div>
  </div>

<?php include('include/footer.php'); 
?>
