<?php
session_start();
if(!isset($_SESSION["user_student"])){
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
$student_id = $_SESSION['user_studentid'];
}?>
<script>
    function printDiv(divName){
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
 }
</script>
  <!-- <div class="main-panel"> -->
    <button style=" float: right;" class="btn btn-info" onclick="printDiv('printMe')" id="printbtn">Print</button>             
            <div id='printMe'>
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <div class="box">
           <?php $getStudent = mysqli_fetch_assoc(mysqli_query($con,"SELECT *,student.name as sname, class.name as cname FROM `student` Join class ON student.class_id=class.id Where student.id='$student_id' AND student.year='$year'"));
           ?>
           <center><h1>Marks Sheet</h1></center>
           <center><h4>Name: <?=$getStudent['sname']?></h4></center>
           <center><h4>Class: <?=$getStudent['cname']?></h4></center>
           <center><h4>Year: <?=$getStudent['year']?></h4></center>

         </div>
         <div class="box-body">
       </br></br></div>

       <!-- <div class="agile-tables"> -->
        <table id="example1" class="table table-hover table-bordered table-striped">
          <thead>
           <tr>
            <th>SL</th>
            <th>Subject Name</th>
            <th>Marks</th>
            <th>GPA</th>
            <th>Grade</th>

          </tr>
        </thead>
        <tbody>
          <?php $query=mysqli_query($con,"SELECT * FROM `marks` Join subject ON marks.subject_id=subject.id Where marks.student_id='$student_id' AND marks.class_id='$class_id' AND marks.year='$year'");
          $total=0;
          $count=0;
          $gpa=0;
          $tgpa=0;
          foreach ($query as $result):
           ?>
           <tr>

            <td><?=++$count?></td>
            <td><?=$result['name']?></td>
            <td><?=$result['marks']?></td>
            <?php $total +=$result['marks']; ?>
            <?php 
            if($result['marks']<33){
            $grade='F';
            $gpa =0;
            $tgpa +=0;
            }
            if($result['marks']>=33 && $result['marks']<40){
            $grade='D';
            $gpa =1;
            $tgpa +=1;
            }
            if($result['marks']>=40 && $result['marks']<50){
            $grade='C';
            $gpa =2;
            $tgpa +=2;
            }
            if($result['marks']>=50 && $result['marks']<60){
            $grade='B';
            $gpa =3;
            $tgpa +=3;
            }
            if($result['marks']>=60 && $result['marks']<70){
            $grade='-A';
            $gpa =3.5;
            $tgpa +=3.5;
            }
            if($result['marks']>=70 && $result['marks']<80){
            $grade='A';
            $gpa =4;
            $tgpa +=4;
            }
            if($result['marks']>=80){
            $grade='A+';
            $gpa =5;
            $tgpa +=5;
            }
            ?>
            <td><?=number_format($gpa,2)?></td>
            <td><?=$grade?></td>
         </tr>
       <?php endforeach; ?>
       <tr>
         <td>Total</td>
         <td></td>
         <td><?=$total?></td>
         <?php 
            if(($tgpa/$count)<1){
            $tgrade='F';
            }
            if(($tgpa/$count)>=1 && ($tgpa/$count)<2){
            $tgrade='D';
            }
            if(($tgpa/$count)>=2 && ($tgpa/$count)<3){
            $tgrade='C';
            }
            if(($tgpa/$count)>=3 && ($tgpa/$count)<3.5){
            $tgrade='B';
            }
            if(($tgpa/$count)>=3.5 && ($tgpa/$count)<4){
            $tgrade='-A';
            }
            if(($tgpa/$count)>=4 && ($tgpa/$count)<5){
            $tgrade='A';
            }
            if(($tgpa/$count)>=5){
            $tgrade='A+';
            }
            ?>
         <td><?=number_format($tgpa/$count,2)?></td>
         <td><?=$tgrade?></td>
       </tr>
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

