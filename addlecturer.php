<?php
if (session_id()=="") {
  session_start(); 
} 
if(isset($_SESSION['username']))
{
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
<?php 
include("lecturer_nonadmin.php");
 ?><br>
<div id="footer" style="color:white; clear:both; text-align:center; padding:5px; " class="bg-info fixed-bottom">
Copyright © SQI INC
</div>
</body>
</html>
<script>
  function validateForm(){
    var a=document.forms['f1']['username'].value;
    var b=document.forms['f1']['password'].value;
    var c=document.forms['f1']['surname'].value;
    var d=document.forms['f1']['lastname'].value;
    var e=document.forms['f1']['middlename'].value;
    var f=document.forms['f1']['email'].value;
    if(a==null||a==""||b==null||b==""||c==null||c==""||d==null||d==""||e==null||e==""||f==null||f==""){
      document.getElementById('alert').innerHTML="<i>!!You have to fill all the fields</i>";
      return false;
    }
  }
</script>
<?php }else{
  include('lecturer_login.php');
}
?>