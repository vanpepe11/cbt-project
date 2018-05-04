<?php
if (session_id()=="") {
  session_start(); 
} 
if(isset($_SESSION['username']))
{
?>
<?php 
$a=$_GET['code'];
$b=$_GET['id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SQI COLLEGE</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap4/dist/js/bootstrap.js"></script>
  <script src="fontawesome-all.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-info navbar-dark sticky-top">
  <a class="navbar-brand" href="#"><?php
      $a= $_SESSION['username'];
      $con=mysqli_connect("localhost","root","","project");
      $count= mysqli_query($con, "SELECT * FROM lecturers_tb where Username='$a' ");
      while($row = mysqli_fetch_assoc($count)) {
         $p=$row["Passport_link"];
         $d=$row["Surname"];
         $e=$row["lecturer_id"];
         // echo "Welcome ".$d;
         echo "<img class='rounded-circle' width='40' height='40' src=".$p."><p id='lecId' hidden=''>".$e."</p>";
    } 
    ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">HOME</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="#">HELP</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="#">LOGOUT</a>
      </li>
    </ul>
  </div> 
</nav>
 <div class="container">
 	  <h1 style="text-align: center;" class="text-info"><?php $a=$_GET['code']; echo $a; ?></h1>
    <div class="row">
      <div class="col-md-8">
        <div id="space">
          
        </div><br><br>
          <h3>Add Exam</h3>
        <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <p id="course_id" hidden=""><?php $a=$_GET['id']; echo $a; ?></p>
            <label for="Course-Name" class="text-warning">Exam Title:</label>
              <input type="text" placeholder="Title" class="form-control" name="title" id="etitle">
          </div>
        </div>
        </div>
        <input type="submit" value="Submit" style="margin-left: 40%" name="submit" class="btn btn-warning" id="submit">
      </div>
    </div>
 </div>
 <div id="footer" style="color:white; clear:both; text-align:center; padding:5px; " class="bg-info fixed-bottom">
Copyright © SQI INC
</div>
<div class="modal fade" id="Modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        Exam Title: <input type="text" name="" id="mtitle"><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="doedit">Ok</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Modaldel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="warning"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      DELETE EXAM
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete">Ok</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php }else{
  header('location:lecturer_login.php');
}
?>
<script>
  $(document).ready(function(){
    var a;
    var b;
    $(window).load(function(){
      b=$("#course_id").html();
      $.post("displayexam_process.php", {course_id:b}, function(resp){
          $("#space").html(resp);
    });
    });
    $("#submit").click(function(){
      a=$("#etitle").val();
      b=$("#course_id").html();
      if(a==""){
      alert("fill all available fields");
      }
      else{
        $.post("addexam_process.php", {title:a, course_id:b}, function(resp){
          $("#space").html(resp);
          $("#etitle").val("");
        });
      }
    });
    $(document).on("click", ".delete", function(){
    k=$(this).closest("tr").attr("id");
    j=$(this).closest("tr").children("td.title").html();
      $("body").find('#warning').html('You are trying to delete '+j);
      $("#Modaldel").modal({backdrop:'static', keyboard:false});
      b=k;
    });
    $(document).on("click", ".edit", function(){
    k=$(this).closest("tr").attr("id");
    j=$(this).closest("tr").children("td.title").html();
      $("body").find('#title').html('You are trying to edit '+j);
      $("#mtitle").val(j);
      $("#Modaledit").modal({backdrop:'static', keyboard:false});
      a=k;
    });
    $(document).on("click", "#delete", function(){
      d=$("#course_id").html();
    $.post("deleteexam_process.php", {exam_id:b, course_id:d}, function(resp){
         $("#space").html(resp);
         });
    });
    $(document).on("click", "#doedit",  function(){
      d=$("#course_id").html();
      e=$("#mtitle").val();
    if(e==""){
      alert("fill all available fields");
    }
    else{
      $.post("editexam_process.php", {title:e, course_id:d, exam_id:a}, function(resp){
        $("#space").html(resp);
         });
    }
    });
  });
</script>