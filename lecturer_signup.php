<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery.js"></script>
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.css">
  <script src="bootstrap4/dist/js/bootstrap.js"></script>
  <script src="fontawesome-all.min.js"></script>
</head>
<body>
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
<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-5">
			<div class="panel panel-success">
 				<div class="panel-heading text-center"><h3>Registration Form</h3></div>
 				<div class="panel-body">
 					<form role="form" method="post" action="lecturer_signup_process.php" enctype="multipart/form-data" onsubmit="return validateForm()" name="f1">
 						<div class="form-group">
 							<label for="surname">Surname:</label>
 							<div class="input-group">
 								<span></span><input type="text" class="form-control" id="surname" name="surname">
 							</div><br>
 							<label for="middlename">Middlename:</label>
 							<div class="input-group">
 								<span></span><input type="text" class="form-control" id="middlename" name="middlename">
 							</div><br>
 							<label for="lastname">Lastname:</label>
 							<div class="input-group">
 								<span></span><input type="text" class="form-control" id="lastname" name="lastname">
 							</div><br>
 							<label for="firstname">Email Address:</label>
 							<div class="input-group">
 								<span class=""></span><input type="text" class="form-control" id="email" name="email">
 							</div><br>
 							<label for="firstname">Username:</label>
 							<div class="input-group">
 								<span class=""></span><input type="text" class="form-control" id="uname" name="username">
 							</div><br>
 							<label for="firstname">Password:</label>
 							<div class="input-group">
 								<span class=""></span><input type="text" class="form-control" id="uname" name="password">
 							</div><br>
 							<label for="pport">Passport:</label>
 							<div class="input-group">
 								<span class=""></span><input type="file" class="form-control" id="pport" name="passport">
 							</div><br>
 							<p id="alert" style="text-align: center; color: red"></p>
 							<input type="submit" name="" class="btn btn-md btn-success" value="Submit">
 						</div>
 					</form>
 				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer" style="color:white; clear:both; text-align:center; padding:5px;" class="bg-info sticky-bottom">
Copyright © SQI INC
</div>
</body>
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
</html>