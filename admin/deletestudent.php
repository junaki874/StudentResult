<?php
session_start();
if(!isset($_SESSION["user_admin"])){
  header("location:../index.php");
} else {
include('includes/config.php');

   $sql = "DELETE FROM student WHERE id='$_GET[id]'";
   if(mysqli_query($con,$sql))
	   header("refresh:1; url=student.php");
   else
	   echo "Not Deleted!";

}
?>
