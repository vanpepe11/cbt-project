<?php
if (session_id()=="") {
  session_start(); 
} 
?>
<nav class="navbar navbar-expand-md bg-info navbar-dark sticky-top">
  <a class="navbar-brand" href="#"><?php
      $a= $_SESSION['username'];
      $con=mysqli_connect("localhost","root","","project");
      $count= mysqli_query($con, "SELECT * FROM student_tb where Username='$a' ");
      while($row = mysqli_fetch_assoc($count)) {
         $p=$row["Passport_link"];
         $d=$row["Surname"];
         $e=$row["student_id"];
         echo "<img class='rounded-circle' width='40' height='40' src=".$p."><p id='stdId' hidden=''>".$e."</p>";
         echo $d;
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
        <a class="nav-link" href="#" id="">COURSES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="pwordedit">CHANGE PASSWORD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="infoedit">EDIT INFORMATION</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="#">LOGOUT</a>
      </li>
    </ul>
  </div> 
</nav>