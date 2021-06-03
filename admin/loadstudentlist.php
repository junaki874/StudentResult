<?php
 $class_id = $_GET['class_id'];
include('includes/config.php');?>
<div class="form-group">
<label for="group name">Student</label>
<select name="student_id"  class="form-control" required="">
		<option value="">Select Student</option>
<?php $student=mysqli_query($con,"SELECT * FROM student Where class_id = '$class_id'");
 foreach($student as $value2){?>
	<option value="<?=$value2['id']?>"><?=$value2['name']?></option>
<?php } ?>
</select>
</div>