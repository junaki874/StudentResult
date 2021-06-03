<?php 
session_start();
if(!isset($_SESSION["user_admin"])){
  header("location:../index.php");
} else {
//include header
//include dataabs econnection
include('includes/config.php');

if(isset($_POST['submit'])){

$pid=$_POST['id']; 
$class_id=$_POST['class_id'];
$year =$_POST['year'];
$subject_id=  $_POST['subject_id'];
$student_id=  $_POST['student_id'];
$marks=  $_POST['marks'];
$count= count($student_id);

$Check = mysqli_fetch_assoc(mysqli_query($con,"SELECT marks FROM marks WHERE class_id ='$class_id' AND subject_id='$subject_id' AND student_id='$student_id[0]' AND year='$year' ")); 

if(empty($Check)){

					for($i=0;$i<$count;$i++){

					$query="INSERT INTO marks VALUES ('$pid','$student_id[$i]','$subject_id','$class_id','$marks[$i]',$year)";

						
					if(mysqli_query($con, $query))
					{

					  echo "<script>alert('Your Submited Data Inserted Succesfully')</script>";
					              echo "<script>window.open('addmarks.php','_self')</script>";
					}

					else {
					echo "ERROR" . mysqli_error($con);
					}

					}		

			}else{
				$marksid=$_POST['marksid'];
	
				for($i=0;$i<$count;$i++){

				$sql = mysqli_query($con,"DELETE FROM marks WHERE id='$marksid[$i]'");
				 // "UPDATE marks set student_id='$student_id[$i]',subject_id='$subject_id',class_id='$class_id',marks='$marks[$i]',year='$year' where id='$marksid[$i]'";
				$query="INSERT INTO marks VALUES ('$pid','$student_id[$i]','$subject_id','$class_id','$marks[$i]',$year)";

					// if successfully insert data into database, displays message "Successful".

					if (mysqli_query($con, $query)) {
						// echo "<div class='alert alert-success'>";
						// echo "<center>Your Edited data Succesfully</center>";
						// echo "</div>";
						echo "<script>alert('Your Edited data Succesfully')</script>";
				              echo "<script>window.open('addmarks.php','_self')</script>";
					} else {
						echo "ERROR".mysqli_error($con);
					}
				}
			}

}
}

?> 