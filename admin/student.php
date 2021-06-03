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
  include('includes/config.php'); ?>
  <!-- <div class="main-panel"> -->
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <div class="box">
           <center><h1>Student Infromation</h1></center>

         </div>
         <div class="box-body">
       </br></br></div>

       <!-- <div class="agile-tables"> -->
        <table id="example1" class="table table-hover table-bordered table-striped">
          <thead>
           <tr>
            <th>SL</th>
            <th>Student ID</th>
            <th>Class</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Email</th>
            <th>Year</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php $query=mysqli_query($con,"SELECT *,class.name as cname,student.name as sname FROM `student` Join `class` ON class.id=student.class_id ");
          $count=0;
          foreach ($query as $result):
           ?>
           <tr>

            <td><?=++$count?></td>
            <td><?=$result['student_id']?></td>
            <td><?=$result['cname']?></td>
            <td><?=$result['sname']?></td>
            <td><?=$result['fathername']?></td>
            <td><?=$result['email']?></td>
            <td><?=$result['year']?></td>
            <td>
             <a href="editstudent.php?id=<?=$result['id']?>"><button class='btn btn-primary'>Edit</button></a> <a href="deletestudent.php?id=<?=$result['id']?>"><button class='btn btn-danger'>Delete</button></a>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
 </div>
</div>

</div>

</div>
</div>
</div>
</div>
<!-- <script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script> -->
<?php include('includes/footer.php');  } ?>

