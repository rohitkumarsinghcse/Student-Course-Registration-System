<?php
session_start();
 include 'connection.php';

 include('include/header.php'); 
	$updateMsg="";
	$countP=$countM=0;
	

	if(isset($_POST['add']) ){

if (!empty($_POST['courses'])) {
	/*$i=0;
	echo count($_POST['courses'];
		$co=count($_POST['courses']);
		foreach ($_POST['courses'] as $course) {
		for($i=0; ;$i++){
			
				//, $_POST['course_name'] as $course_name, $_POST['l'] as $l , $_POST['t'] as $t , $_POST['p'] as $p ,$_POST['cr'] as $cr
				
		$query="INSERT INTO `user_course`(`user_id`, `course_code`, `course_name`, `l`, `t`, `p`, `cr`) VALUES ('".$_SESSION['user_id']."', '".$course[i]."','".$course_name[i]."','".$l[i]."','".$t[i]."','".$p[i]."','".$cr[i]."');";

			$result=mysqli_query($conn,$query); 
							 if($result==1){
							 	$countP++;
							 }else{
							 	$countM++;
							 }
		}
	$updateMsg= "<div class='bg-success text-white mt-2 text-center'><h3>".$countP." Course Added successfully and <i class='text-danger'>".$countM." Course Failed.</h3></div>";  
	}else{
		$updateMsg= "<div class='bg-danger text-white mt-2 text-center'><h3>Select any course.</h3></div>";
	}*/
	$checked_array=$_POST['courses'];
	foreach ($_POST['course_code'] as $key => $value) {
		if(in_array($_POST['course_code'][$key], $checked_array)){
			$course_code=$_POST['course_code'][$key];
			$course_name=$_POST['course_name'][$key];
			$l= $_POST['l'][$key];
			$t= $_POST['t'][$key];
			$p= $_POST['p'][$key];
			$cr= $_POST['cr'][$key];


			$query="INSERT INTO `user_course`(`user_id`, `course_code`, `course_name`, `l`, `t`, `p`, `cr`) VALUES ('".$_SESSION['user_id']."', '".$course_code."','".$course_name."','".$l."','".$t."','".$p."','".$cr."');";

				$result=mysqli_query($conn,$query); 
				 if($result==1){
					$countP++;
				}else{
					$countM++;
				}
		}
	}$updateMsg= "<div class='bg-success text-white mt-2 text-center'><h3>".$countP." Course Added successfully and <i class='text-danger'>".$countM." Course Failed.</h3></div>";  
	}else{
		$updateMsg= "<div class='bg-danger text-white mt-2 text-center'><h3>Select any course.</h3></div>";
	}
}




 ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
	    <div class="text-black p-2"><h1>Add more course</h1><hr>
		</div>
		<?php echo $updateMsg;?>
		
        <div class="mt-4 border">
        	<div class="container">
				
		        	<table class="table table-hover border">
		        		
					         <?php
					            
					             $a_q="select * from tbl_course where not course_code in (select course_code from user_course where user_id='".$_SESSION['user_id']."');";

					            $re=mysqli_query($conn, $a_q);
					             
					            if (mysqli_num_rows($re)>0) {
					            	?>
					<form class="form-group" method="POST">

					    <div class="text-warning text-center"><h1>Available Courses</h1></div>
					    <thead class="thead-dark">
					      <tr>
					      	<th>#</th>
					        <th>COURSE CODE</th>
					        <th>COURSE NAME</th>
					        <th>L</th>
					        <th>T</th>
					        <th>P</th>
					        <th>Cr</th>
					        <th>SELECT</th>
					      </tr>
					    </thead>
					    <tbody>
						
						<?php
					        $c=1;
					        while ($r=mysqli_fetch_assoc($re)) {
					                	
					    ?>
					                
					   <tr>
					   
					   	  <td>
					   	  	<?php echo $c;?>
					   	  </td>
					      <td><input class="form-control" type="text" name="course_code[]" readonly="readonly" value="<?php echo $r['course_code']?>"></td>
					      <td><input class="form-control" type="text" name="course_name[]" readonly="readonly" value="<?php echo $r['course_name']?>"></td>
					      <td><input class="form-control" type="text" name="l[]" readonly="readonly" value="<?php echo $r['l']?>"></td>
					      <td><input class="form-control" type="text" name="t[]" readonly="readonly" value="<?php echo $r['t']?>"></td>
					      <td><input class="form-control" type="text" name="p[]" readonly="readonly" value="<?php echo $r['p']?>"></td>
					      <td><input class="form-control" type="text" name="cr[]" readonly="readonly" value="<?php echo $r['cr']?>"></td>
					      <td><input type="checkbox" value="<?php echo $r['course_code']?>" name="courses[]"></td>
					     
					    </tr>
					         <?php
					              $c++;  }//while end
					              ?>
					          <tr>
					          	<td><input type="submit" name="add" class="btn btn-primary"></td>
					          </tr>
					</form>
					<?php
					             } else{
					                	?>
					    <tr>
					       <td><div class="bg-danger text-white text-center p-2"><h3>No more Course ! <br>Contact Admin to Add more course.</h3></div>
					       </td>
					      
					    </tr>
					                	<?php
					            }
					        ?>
					    </tbody>
				  	</table>
			
			
			</div>
        </div>
       
        <hr class="my-4">
     	<a class="btn btn-success" href="index.php">Go To Home</a>
    </div>
  </div>

<?php include('include/footer.php'); 
?>