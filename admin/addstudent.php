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
$sid=$_POST['sid'];
$class_id=$_POST['class_id'];
$name=$_POST['name'];
$fathername=$_POST['fathername'];
$email=$_POST['email'];
$password=$_POST['password'];
$year=$_POST['year'];
// $description=$_POST['description'];
// $description=$_POST['description'];


//Insert Query..For insert data into the database.

$query="INSERT INTO student VALUES ('$pid','$sid','$class_id','$name','$fathername','$email','$password','$year')";

// var_dump($query); exit();

// if successfully insert data into database, displays message "Successful".

if(mysqli_query($con, $query))
{
// echo "<div class='alert alert-success'>";
// echo "<center>Your Submited Data Inserted Succesfully</center>";
// echo "</div>";
  echo "<script>alert('Your Submited Data Inserted Succesfully')</script>";
              echo "<script>window.open('student.php','_self')</script>";
}

else {
echo "ERROR" . mysqli_error($con);
}
}

$students=mysqli_fetch_assoc(mysqli_query($con," SELECT id FROM student order by id desc"));

?> 
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
<div class="row">
<div class="col-md-8 col-md-offset-0">

<div class="box">
  <center><h1>Add New Student</h1></center>
</div>

<form action="" method="post" accept-charset="utf-8">
  
<input type="hidden" class="form-control" name="id" placeholder="Enter Buyer Name">

<div class="form-group">
<label for="group name">Student ID</label>
<input type="text" name="sid" class="form-control" value="ID-<?php echo $students['id']+1 ?>" required readonly  placeholder="" >
</div>
<div class="form-group">
<label for="group name">Name</label>
<input type="text" name="name" class="form-control" required  placeholder="Enter Name" >
</div>
<div class="form-group">
<label for="group name">Father Name</label>
<input type="text" name="fathername" class="form-control" required  placeholder="Enter Father Name" >
</div>
<div class="form-group">
<label for="group name">Class</label>
<select name="class_id"  class="form-control" required="">
	<option value="">Select Class</option>
<?php $class=mysqli_query($con,"SELECT * FROM class");
 foreach($class as $value){?>
	<option value="<?=$value['id']?>"><?=$value['name']?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="group name">Year</label>
<input type="text" name="year" class="form-control" required  placeholder="Enter Year Name" >
</div>
<div class="form-group">
<label for="group name">Email</label>
<input type="text" name="email" class="form-control" required  placeholder="Enter Email Name" >
</div>
<div class="form-group">
<label for="group name">Password</label>
<input type="password" name="password" class="form-control" required  placeholder="Enter Password" >
</div>
<div class="form-group">
<center><input type="submit" name="submit" class="btn btn-success"></center>
</div>

</form>


</div>

<!-- </div> -->
</div></div></div></div>

<?php include('includes/footer.php');  } ?>