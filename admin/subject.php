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
           <center><h1>Subject Infromation</h1></center>

         </div>
         <div class="box-body">
       </br></br></div>

       <!-- <div class="agile-tables"> -->
        <table id="example1" class="table table-hover table-bordered table-striped">
          <thead>
           <tr>
            <th>SL</th>
            <th>Class</th>
            <th>Name</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php $query=mysqli_query($con,"SELECT * FROM `subject` order by id DESC ");
          $count=0;
          foreach ($query as $result):
           ?>
           <tr>
            <td><?=++$count?></td>
            <?php $class=mysqli_query($con,"SELECT * FROM `class` Where id='$result[class_id]' ");
            foreach ($class as $value):
              ?>
            <td><?=$value['name']?></td>
            <?php endforeach; ?>
            <td><?=$result['name']?></td>
            <td>
             <a href="editsubject.php?id=<?=$result['id']?>"><button class='btn btn-primary'>Edit</button></a> <a href="deletesubject.php?id=<?=$result['id']?>"><button class='btn btn-danger'>Delete</button></a>
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

