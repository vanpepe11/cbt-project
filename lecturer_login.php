<?php
if (session_id()=="") {
  session_start(); 
}
?>
<?php
$con=mysqli_connect("localhost","root","","project");
$count= mysqli_query($con, "SELECT * FROM lecturers_tb");
if(mysqli_num_rows($count) > 0)
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lecturer_login</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery.js"></script>
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap4/dist/js/bootstrap.js"></script>
  <script src="fontawesome-all.min.js"></script>
</head>
<body class="bg-default">
<nav class="navbar navbar-expand-md bg-info navbar-dark sticky-top">
  <a class="navbar-brand" href="#">SQI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">HOME</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        STUDENT
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Register</a>
        <a class="dropdown-item" href="#">Login</a>
        <a class="dropdown-item" href="#">Pay</a>
        <a class="dropdown-item" href="#">Timetable</a>
      </div>
    </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        LECTURER
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="lecturer_login.php">Login</a>
        <a class="dropdown-item" href="#">Mail</a>
      </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">HELP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ABOUT</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="#">LOGOUT</a>
      </li>
    </ul>
  </div> 
</nav>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-3 col-md-5">	
			<div class="panel panel-default" >
 				<div class="panel-heading text-center"><h1 style="font-family: Impact;">Sign-In</h1></div>
 				<div class="panel-body">
 					<div name="f1" id="form">
 						<div class="panel-body">
					<label for="Username">Username:</label>
 							<div class="input-group">
 								<span class="fas fa-user fa-2x"> </span><input type="text" class="form-control" id="Username" name="username">
 							</div>
 							<label for="Password">Password:</label>
 							<div class="input-group">
 								<span class="fas fa-lock fa-2x"></span><input type="text" class="form-control" id="Password" name="password">
 							</div>
				</div>
 							<br>
 							<p id="alert" style="text-align: center; color: red"></p>
 							<input type="submit" name="" class="btn btn-primary" value="Submit" id="confirm">
 							
 						</div>
 							
 						</div>
 						
 					</div>
 					
 				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer" style="color:white; clear:both; text-align:center; padding:5px; " class="bg-info fixed-bottom">
Copyright © SQI INC
</div>
</body>

</html>
<?php }else{
	header('location:lecturer_signup.php');
}
?>
<script>
  $(document).ready(function(){
    $("#confirm").click( function(){
    a=$("#Username").val();
    b=$("#Password").val();
      $.post("lecturer_login_process.php", {username:a, password:b}, function(resp){
          if(resp=="found"){
          window.location="lecturer_portal.php";
         }
         else{
            $("#alert").html(resp);
         }
      });
    });
  })
</script>