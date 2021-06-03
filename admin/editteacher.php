<?php
session_start();
if(!isset($_SESSION["user_admin"])){
  header("location:../index.php");
} else {
//include header
include('includes/header.php');
//include sider design
include ('includes/sidebar.php');
//include dataabs econnection
include ('includes/config.php');

if (isset($_POST['submit'])) {

	//Getting input data into a variable

	$pid     = $_POST['id'];
	$name=$_POST['name'];
	$fathername=$_POST['fathername'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	// $description = $_POST['description'];


	//Insert Query..For insert data into the database.

	$query = "UPDATE student set name='$name',fathername='$fathername',email='$email',password='$password' where id='$pid'";

	// if successfully insert data into database, displays message "Successful".

	if (mysqli_query($con, $query)) {
		// echo "<div class='alert alert-success'>";
		// echo "<center>Your Edited data Succesfully</center>";
		// echo "</div>";
		echo "<script>alert('Your Edited data Succesfully')</script>";
              echo "<script>window.open('student.php','_self')</script>";
	} else {
		echo "ERROR".mysqli_error($con);
	}
}
?>
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
<div class="row">
<div class="col-md-8 col-md-offset-0">

<div class="box">
	<center><h1>Edit Student Infromation</h1></center>
</div>


<?php
// Query for geeting input id value
$query = mysqli_query($con, "SELECT * FROM `student` where id='$_GET[id]' ");

foreach ($query as $result):?>
<form action="" method="post" accept-charset="utf-8">

<input type="hidden" class="form-control" name="id" value="<?=$result['id']?>">

<div class="form-group">
<label for="group name">Name</label>
<input type="text" name="name" class="form-control" value="<?=$result['name']?>" required  placeholder="Enter Name" >
</div>
<div class="form-group">
<label for="group name">Father Name</label>
<input type="text" name="fathername" class="form-control" value="<?=$result['fathername']?>" required  placeholder="Enter Father Name" >
</div>
<div class="form-group">
<label for="group name">Email</label>
<input type="text" name="email" class="form-control" required value="<?=$result['email']?>"  placeholder="Enter Email Name" >
</div>
<div class="form-group">
<label for="group name">Password</label>
<input type="text" name="password" class="form-control" value="<?=$result['password']?>" required  placeholder="Enter Password" >
</div>
<div class="form-group">
 <!-- <label for="email">Email</label> -->
<center><input type="submit" name="submit" class="btn btn-success"></center>
</div>

</form>
<?php endforeach;?>
</div>

</div>

</div>
</div>
</div>
</div>
<?php include('includes/footer.php');  } ?>
