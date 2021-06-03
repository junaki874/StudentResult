<?php
include('admin/includes/config.php');
if(isset($_POST["submit"])){
// echo "ok";
// exit();
if(!empty($_POST['email']) && !empty($_POST['password'])) {
  $email=$_POST['email'];
  $password=$_POST['password'];

  $a=mysqli_escape_string($con,$email);

  $b=mysqli_escape_string($con,$password);


  $query=mysqli_query($con,"SELECT * FROM user WHERE email='".$a."' AND password='".$b."'");
  $numrows=mysqli_num_rows($query);
  if($numrows!=0)
  {
  while($row=mysqli_fetch_assoc($query))
  {
  $dbemail=$row['email'];
  $dbpassword=$row['password'];
  }

  if($email == $dbemail && $password == $dbpassword)
  {
  session_start();
  $_SESSION['user_admin']=$email;

  if(empty($_SESSION['url'])){
  header("Location: admin");
}else{

  header("Location:".$_SESSION['url']);

}
  }
  } else {
 echo "<script>alert('Sorrry! Wrong user name password , Try again')</script>";
  }

} else {
  echo "<script>alert('All fields are required!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Log in</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/includes/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/simple-line-icons/css/simple-line-icons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin/includes/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin/includes/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth login-full-bg">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-dark text-left p-5">
              <h2>Login</h2>
              <h4 class="font-weight-light"></h4>
  
                <form action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="email" name="email" class="form-control" id=""  placeholder="Username">
                    <i class="mdi mdi-account"></i>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password"  name="password" class="form-control" id="" placeholder="Password">
                    <i class="mdi mdi-eye"></i>
                  </div>
                  <div class="mt-5">
                     <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div>
                  <div class="mt-3 text-center">
                    <a href="teacher.php" class="auth-link text-white">Teacher Login</a>
                    <a href="student.php" class="auth-link text-white">Student Login</a>
                  </div>
                </form>                  
             
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
</body>

</html>


