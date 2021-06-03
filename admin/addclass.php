<?php 
session_start();
if(!isset($_SESSION["user_admin"])){
  header("location:../index.php");
} else {
//include header
include('includes/header.php');
//include sider design
include('includes/sidebar.php');
//include dataabs econnection
include('includes/config.php');

if(isset($_POST['submit'])){

//Getting input data into a variable
  
$pid='P'.$_POST['id']; 
$name=$_POST['name'];
// $description=$_POST['description'];
// $description=$_POST['description'];


//Insert Query..For insert data into the database.

$query="INSERT INTO class VALUES ('$pid','$name')";

// var_dump($query); exit();

// if successfully insert data into database, displays message "Successful".

if(mysqli_query($con, $query))
{
// echo "<div class='alert alert-success'>";
// echo "<center>Your Submited Data Inserted Succesfully</center>";
// echo "</div>";
  echo "<script>alert('Your Submited Data Inserted Succesfully')</script>";
              echo "<script>window.open('class.php','_self')</script>";
}

else {
echo "ERROR" . mysqli_error($con);
}
}

?> 
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
<div class="row">
<div class="col-md-8 col-md-offset-0">

<div class="box">
  <center><h1>Add Class</h1></center>
</div>

<form action="" method="post" accept-charset="utf-8">
  
<input type="hidden" class="form-control" name="id" placeholder="Enter Buyer Name">

<div class="form-group">
<label for="group name">Name</label>
<input type="text" name="name" class="form-control" required  placeholder="Enter Name" >
</div>
<div class="form-group">
<center><input type="submit" name="submit" class="btn btn-success"></center>
</div>

</form>


</div>

<!-- </div> -->
</div></div></div></div>

<?php include('includes/footer.php');  } ?>