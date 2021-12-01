<?php

 include '../connection.php';

 include('include/header.php'); 
	$msg="";

	if(isset($_POST['edit'])){

		$course_code=$_POST['course_code'];
		$course_name=$_POST['course_name'];
		$l=$_POST['l'];
		$t=$_POST['t'];
		$p=$_POST['p'];
		$cr=$_POST['cr'];
		$id=$_POST['id'];
		
		  $sql = "UPDATE tbl_course SET course_code='$course_code',course_name='$course_name',l='$l',t='$t',p='$p' ,cr='$cr' WHERE id=$id";

			if (mysqli_query($conn, $sql)) {
			  $msg= "<h3 class='bg-success p-3 text-white text-center mt-2'>Course updated successfully</h3>";

			} else {
			  $msg= "<h3 class='bg-danger p-3 text-white text-center mt-2'>Course updation Failed</h3>";

			}
		
	}

	if(isset($_POST['del'])){
		$id=$_POST['id'];
		  
		  // sql to delete a record
		$sql = "DELETE FROM tbl_course WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
		  $msg="<div class='container bg-warning p-3 text-white text-center mt-2'><h3>Course Deleted successfully</h3></div>";
		} else {
		  $msg="<div class='container bg-danger p-3 text-white text-center mt-2'><h3>Course Failed</h3></div>";
		}

	}

 ?>
<div class="jumbotron jumbotron-fluid">

		<?php echo $msg;?>

    <div class="container">
	    
        <div class="mt-4 border">
        	<div class="container">
				
		        	<table class="table table-hover border">
		        		
					         <?php
					            $a_q="select * from tbl_course";
					            $re=mysqli_query($conn, $a_q);
					            if (mysqli_num_rows($re)>0) {
					            	?>

					    <div class="text-dark text-center"><h1>Course Details:</h1></div>
					    <thead class="thead-dark">
					      <tr>
					      	<th>#</th>
					        <th>COURSE CODE</th>
					        <th>COURSE NAME</th>
					        <th>L</th>
					        <th>T</th>
					        <th>P</th>
					        <th>Cr</th>
					        <th>UPDATE</th>
					        <th></th>
					      </tr>
					    </thead>
					    <tbody>
						
						<?php
					        $c=1;
					        while ($r=mysqli_fetch_assoc($re)) {
					                	
					    ?>
					                
					   <tr>
					   	<form class="form-group" method="POST">
					   		<input type="hidden" name= "id" value="<?php echo $r['id']?>">
					   	  <td>
					   	  	<?php echo $c;?>
					   	  </td>
					      <td><input class="form-control" type="text" name="course_code" required value="<?php echo $r['course_code']?>"></td>
					      <td><input class="form-control" type="text" name="course_name" required value="<?php echo $r['course_name']?>"></td>
					      <td><input class="form-control" type="text" name="l" required value="<?php echo $r['l']?>"></td>
					      <td><input class="form-control" type="text" name="t" required value="<?php echo $r['t']?>"></td>
					      <td><input class="form-control" type="text" name="p" required value="<?php echo $r['p']?>"></td>
					      <td><input class="form-control" type="text" name="cr" required value="<?php echo $r['cr']?>"></td>
					      <td><input class="btn btn-primary" type="submit" name="edit" value="UPDATE"></td>
					      <td></i><button class="bg-danger" type="submit" name="del"><i class="fa fa-trash"></button></td>
					      </form>
					    </tr>
					         <?php
					              $c++;  }//while end
					                }
					                else{
					                	?>
					    <tr>
					       <td><div class="bg-warning text-white text-center"><h3> No Course Found! Add more course now...</h3></div>
					       </td>
					      
					    </tr>
					                	<?php
					            }
					        ?>
					    </tbody>
				  	</table>
			
			</div>
        </div>
        <div class="container">
        		<a class="btn btn-success col-4" href="add_course.php">Add more Course</a>
        </div>
        <hr class="my-4">
     
    </div>
  </div>

<?php include('include/footer.php'); 
?>
