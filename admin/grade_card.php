<?php
include "../connection.php";

 include('include/header.php'); 
 $msg='';
if (isset($_POST['save'] )) {
	$user_id= $_POST['user_id'];
	$course_code=$_POST['course_code'];
	$grade= $_POST['grade'];
	if ($grade==="Choose course") {
		$msg ="<div class='p-2 mb-4 text-warning text-center'><h3>Select any Grade!</h3></div>";
	}else{
		$qq="INSERT INTO tbl_grade(user_id,course_code,grade) values('$user_id', '$course_code', '$grade')";
		if (mysqli_query($conn,$qq)) {
			$msg ="<div class='p-2 mb-4 text-success text-center'><h3>Save Success</h3></div>";
		}else{
			$msg ="<div class='p-2 mb-4 text-danger text-center'><h3>Already given or something error!</h3></div>";
		}
	}
}
?>
<div class="container-fluid mt-5">

<div class="container">
	<div class="bg-primary p-3 mb-4"><h2 class="text-white">GRADE ENTRY FORM</h2> </div>
</div>

<div class="container">
	<?php echo $msg; ?>
<form method="POST">
	<div class="row">
	   <div class="col-3">
	   		<label for="grade">Select Available Course:</label>
	   </div>
	   <div class="col-7">
	    <select class="custom-select" name="co">
	    	<option selected>Choose course...</option>
	    	<?php
	    		$a_q="select * from tbl_course;";
				$re=mysqli_query($conn, $a_q);
			if (mysqli_num_rows($re)>0) {
					while ($r=mysqli_fetch_assoc($re)) {
					?>
					<option value="<?php echo $r['course_code'] ?>">
						<?php echo $r['course_name'] ?>
					</option>
					 	
					<?php
				}
			}
	    	?>
	    </select>
		</div>
	  <div class="col-2">
	    <button class="btn btn-outline-secondary" type="submit" name="load">Load Content</button>
	  </div>
	</div>
  </form>
</div>
	<div class="container">
	<?php
	if (isset($_POST['load'])) {
		$course=$_POST['co'];

		$a="select * from user_course where course_code='$course';";
		$b=mysqli_query($conn, $a);
		
			if (mysqli_num_rows($b)>0) {
			$c=1;
			?>
		<table class='table table-hover'>
			<thead class="thaed-dark">
				<tr>
					<th>#</th>
					<th>Course Name</th>
					<th>User ID</th>
					<th>GRADE</th>
					<th>Click to Save</th>
				</tr>
				</thead>
			<tbody>
			<?php
			while ($row=mysqli_fetch_assoc($b)) {
				?>
			<form  class="form-control" method="POST">
				<tr>
					<td><?php echo $c;?></td>
					<td><?php echo $row['course_name'];?></td>
					<td><?php echo $row['user_id'];?></td>
					<td><?php echo "Grade";?>
						<select class="custom-select" name="grade">
	    						<option selected>Choose course</option>
	    						<option value="A+">A+</option>
	    						<option value="A">A</option>
	    						<option value="B+">B+</option>
	    						<option value="B">B</option>
	    						<option value="C">C</option>
					
					</td>
					<td>
						<input type="hidden" name="user_id" value="<?php echo $row['user_id']?>">
						<input type="hidden" name="course_code" value="<?php echo $row['course_code']?>">
						<input class="form-control btn-success m-3" type="submit" name="save" value="Save">
					</td>
				</tr>
					<?php
				$c++;

				}
				?>
			</form>
					
			<?php
		}else{?>
			<tr><td>
				<h3 class="btn-success m-3 text-center" >No Taken Course</h3>
			</td></tr>
			<?php
		}
		?>
		
			</tbody>
		</table>
		<?php
	}
?>

	</div>
</div>