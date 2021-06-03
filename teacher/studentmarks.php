<?php 
session_start();
if(!isset($_SESSION["user_teacher"])){
  header("location:../index.php");
} else {
//include header
include('includes/header.php');
//include sider design
include('includes/sidebar.php');
//include dataabs econnection
include('includes/config.php');



?> 
<!-- <div class="main-panel"> -->
<div class="content-wrapper">
<div class="row">
<div class="col-md-8 col-md-offset-0">

<div class="box">
  <center><h1>Student Wise Marks</h1></center>
</div>

<form action="studentmarksheet.php" method="post" accept-charset="utf-8">
  
<input type="hidden" class="form-control" name="id" placeholder="Enter Buyer Name">

<div class="form-group">
<label for="group name">Class</label>
<select name="class_id" id="class_id"  class="form-control" required="" onchange="getStudent(this.value,'displaystudent')">
	<option value="">Select Class</option>
<?php $class=mysqli_query($con,"SELECT * FROM class");
 foreach($class as $value){?>
	<option value="<?=$value['id']?>"><?=$value['name']?></option>
<?php } ?>
</select>
</div>


<div id="displaystudent"></div>

<div class="form-group">
<label for="group name">Year</label>
<input type="text" name="year" class="form-control" required  placeholder="Enter Year Name" >
</div>
<div class="form-group">
<center><input type="submit" name="submit" class="btn btn-success"></center>
</div>

</form>


</div>

<!-- </div> -->
</div></div></div></div>
</script>

        <script type="text/javascript">
                function getStudent(class_id, divid){

                  console.log(class_id);
                $.ajax({
                    url: 'loadstudentlist.php?class_id='+class_id, //call storemdata.php to store form data
                    success: function(data) {
                      $("#" + divid).html(data);
                    }
                });
            }
            
 </script>

<?php include('includes/footer.php');  } ?>