<?php
 $class_id = $_GET['class_id'];
include('includes/config.php');?>
<div class="form-group">
<label for="group name">Subject</label>
<select name="subject_id"  class="form-control" required="">
		<option value="">Select Subject</option>
<?php $subject=mysqli_query($con,"SELECT * FROM subject Where class_id = '$class_id'");
 foreach($subject as $value2){?>
	<option value="<?=$value2['id']?>"><?=$value2['name']?></option>
<?php } ?>
</select>
</div>