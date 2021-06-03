<?php 
$con=mysqli_connect('localhost','root','') or die(mysql_error());
	mysqli_select_db($con,'school') or die("cannot select DB");
?>