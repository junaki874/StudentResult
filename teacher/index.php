<?php 
session_start();
if(!isset($_SESSION["user_teacher"])){
  header("location:../index.php");
} else {
//include header
include('includes/header.php');
include('includes/sidebar.php');

?>
<div class="row">
<div  class ="col-md-8">
<center><h3>STUDENT RESULT MANAGEMENT SYSTEM FOR VADUN HIGH SCHOOL</h3></center>
<img src="../image/school.jpg" style="width:auto">
</div>
</div>
  

              
 <?php include('includes/footer.php');  } ?>