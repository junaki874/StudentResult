<?php
session_start();
if(!isset($_SESSION["user_name"])){
  header("location:../index.php");
} else {
//include header
  include('includes/header.php');
 //include sider design
  include('includes/sidebar.php');
//include dataabs econnection
  include('includes/config.php'); ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <div class="box">
            <center><h1>User</h1></center>

          </div>
          <div class="box-body">
          <?php
              $role_id=$_SESSION['role_id'];
              $function=mysqli_query($con,"SELECT * FROM `function_access` INNER JOIN function_tbl
                ON function_access.function_id = function_tbl.id Where function_access.role_id='$role_id' AND function_tbl.function_name='Add User' "); 
              $row2=mysqli_fetch_assoc($function);
            if($row2 !=Null || $role_id ==0){
           echo '<a style="text-decoration: none; color: white; " href="adduser.php"><button class="btn btn-success">Add User</button></a>';
             }
          ?>
           </br></br></div>
           <!-- <div class="agile-tables"> -->
            <table id="example1" class="table table-hover table-bordered table-striped">
              <thead>
               <tr>
                <th>SL</th>
                <th>Menu Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $query=mysqli_query($con,"SELECT * FROM `user` order by id Asc ");
                $count=0;
                foreach ($query as $result):
                 ?>
               <tr>
                <td><?=++$count?></td>
                <td><?=$result['email']?></td>
                <td>
                <?php
                 $id=$result['role_id'];
                 $role=mysqli_query($con,"SELECT * FROM `role_tbl` where id='$id' ");
                 foreach ($role as $thisrole):
                 echo $thisrole['role_name'];
                 endforeach;
                 ?>
                 <td><?=$result['status']?></td>
                   
                 </td>
                <?php
                echo "<td>";
                $function2=mysqli_query($con,"SELECT * FROM `function_access` INNER JOIN function_tbl
                ON function_access.function_id = function_tbl.id Where function_access.role_id='$role_id' ");
               foreach($function2 as $Thisfunction):

               if($Thisfunction['function_name'] =='Edit User'){
                 echo "<a href=edituser.php?id=".md5($result['id'])."><button class='btn btn-primary'>Edit</button></a>";
                   }
               if($Thisfunction['function_name'] =='Delete User'){

                 echo  "<a href=deleteuser.php?id=".md5($result['id'])."><button class='btn btn-danger'>Delete</button></a>";
               }
                 endforeach;
                if($role_id==0){
               echo "<a href=edituser.php?id=".md5($result['id'])."><button class='btn btn-primary'>Edit</button></a><a href=deleteuser.php?id=".md5($result['id'])."><button class='btn btn-danger'>Delete</button></a>";

                }
                 echo "</td>";
                   
                  ?>

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
<script>
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
</script>
<?php include('includes/footer.php');  } ?>

