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

$class_id=$_POST['class_id'];
$year =$_POST['year'];
$subject_id=  $_POST['subject_id'];
}

?> 
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
<div class="row">
<div class="col-md-12 col-md-offset-0">

<div class="box">
  <center><h1>Add Marks</h1></center>
  <?php $classname=mysqli_query($con,"SELECT * FROM class Where id='$class_id'");
 foreach($classname as $value3){?>
 	<center><h4>Class: <?=$value3['name']?></h4></center>
 <?php } ?>
 <?php $subjectname=mysqli_query($con,"SELECT * FROM subject Where id='$subject_id'");
 foreach($subjectname as $value4){?>
 	<center><h4>Subject: <?=$value4['name']?></h4></center>
 <?php } ?>
 <center><h4>Year: <?=$year?></h4></center>

</div>

<form action="marksAction.php" method="post" accept-charset="utf-8">
  
<input type="hidden" class="form-control" name="id" placeholder="Enter Buyer Name">
<div class="row">
<?php $class=mysqli_query($con,"SELECT * FROM student Where class_id='$class_id' AND year='$year'");
 foreach($class as $value){?>
 <input type="hidden" name="student_id[]" class="form-control" value="<?=$value['id']?>">
 <input type="hidden" name="class_id" class="form-control" value="<?=$class_id?>">
 <input type="hidden" name="subject_id" class="form-control" value="<?=$subject_id?>">
 <input type="hidden" name="year" class="form-control" value="<?=$year?>">
<div class="col-md-4 col-md-offset-0">
<div class="form-group">
<label for="group name">Student ID</label>
<input type="text" name="" class="form-control" value="<?=$value['student_id']?>" required readonly=""  placeholder="Enter Year Name" >
</div>
</div>
<div class="col-md-4 col-md-offset-0">
<div class="form-group">
<label for="group name">Student Name</label>
<input type="text" name="" class="form-control" value="<?=$value['name']?>" required readonly=""  placeholder="Enter Year Name" >
</div>
</div>
<?php $getID = mysqli_fetch_assoc(mysqli_query($con,"SELECT id,marks FROM marks WHERE class_id ='$class_id' AND subject_id='$subject_id' AND student_id='$value[id]' AND year='$year' ")); if(empty($getID)){$getID['marks']=0;}  ?>
<div class="col-md-4 col-md-offset-0">
<div class="form-group">
<label for="group name">Marks</label>
<input type="hidden" name="marksid[]" class="form-control" required value="<?=$getID['id']?>"  placeholder="Enter Year Name" >
<input type="text" name="marks[]" class="form-control" required value="<?=$getID['marks']?>"  placeholder="Enter Year Name" >
</div>
</div>
<?php } ?>
</div>

<div class="form-group">
<center><input type="submit" name="submit" class="btn btn-success"></center>
</div>

</form>


</div>

<!-- </div> -->
</div></div></div></div>

<?php include('includes/footer.php');  } ?>