<!DOCTYPE html>
<html>
<head>
	<title>Student Registration Page</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap4/dist/js/bootstrap.js"></script>
  <link src="fontawesome/web/css/fontawesome-all.css">
  <script src="fontawesome/svg-with-js/js/fontawesome-all.js"></script>
</head>
<body style="background-color: #CDF9F8">
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
        <a class="dropdown-item" href="student_login_page.php">Login</a>
        <a class="dropdown-item" href="#">Timetable</a>
      </div>
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
<div><h3 style="text-align: center;">Registration Form</h3></div>
<form role="form" method="post" action="student_registration_process.php" enctype="multipart/form-data" name="f1"  onsubmit="return validateForm()">
<div class="container">
	<div class="row">
		<div class="col-md-6">		
 				<div>
 				<h5 style="text-align: center">BIODATA INFORMATION</h5>
		 			<div class="panel">
		 				<div class="panel-body text-primary">
		 				<div class="form-group">
			    			<label for="sur">Surname:</label>
			   			 	<input type="text" class="form-control" id="sur" name="surname">
			 			</div>
			  			<div class="form-group">
					    	<label for="mdn">Middlename:</label>
					    	<input type="text" class="form-control" id="mdn" name="middlename">
				  		</div>
				  		<div class="form-group">
					    	<label for="lnm">Lastname:</label>
					    	<input type="text" class="form-control" id="lnm" name="lastname">
				  		</div>
				  		<div class="form-group">
  							<label for="sel1">Gender:</label>
  							<select class="form-control" id="sel1" name="gender">
    							<option>Male</option>
    							<option>Female</option>
  							</select>
						</div>
		 			</div>	
		 			</div>
		 			<h5 style="text-align: center">CONTACT INFORMATION</h5>
		 			<div class="panel panel-success">
		 				<div class="panel-body text-success">
			  			<div class="form-group">
					    	<label for="dav">Telephone No:</label>
					    	<input type="text" class="form-control" id="dav" name="number">
				  		</div>
				  		<div class="form-group">
					    	<label for="emm">E-mail Address:</label>
					    	<input type="text" class="form-control" id="emm" name="email">
				  		</div>
				  		<div class="form-group">
					    	<label for="hma">Home Address:</label>
					    	<textarea class="form-control" id="hma" name="address"></textarea>
				  		</div>
		 			</div>
		 			</div>	
		 			<h5 style="text-align: center">SPONSOR INFORMATION</h5>
		 			<div class="panel panel-success">
		 				<div class="panel-body">
		 				<div class="form-group">
			    			<label for="spon">Name:</label>
			   			 	<input type="text" class="form-control" id="spon" name="sponsorname">
			 			</div>
			  			<div class="form-group">
					    	<label for="tel">Telephone No:</label>
					    	<input type="text" class="form-control" id="tel" name="sponsorno">
				  		</div>
				  		<div class="form-group">
					    	<label for="ema">E-mail Address:</label>
					    	<input type="text" class="form-control" id="ema" name="sponsormail">
				  		</div>
		 			</div>	
		 			</div>		
 				</div>
		</div>
		<div class="col-md-6">
		<br><br>
				<div class="panel">
				<div class="panel-body text-primary">
					<label for="Username">Username:</label>
 							<div class="input-group">
 								<span class="fas fa-user fa-2x"> </span><input type="text" class="form-control" id="Username" name="username">
 							</div>
 							<label for="Password">Password:</label>
 							<div class="input-group">
 								<span class="fas fa-lock fa-2x"></span><input type="text" class="form-control" id="Password" name="password">
 							</div>
 							<label for="Password1">Confirm Password:</label>
 							<div class="input-group">
 								<span class="fas fa-lock fa-2x"></span><input type="text" class="form-control" id="Password1" name="password1">
 							</div>
				</div>
 				<label for="pport">Passport:</label>
 							<div class="input-group">
 								<input type="file" class="form-control" id="pport" name="passport">
 							</div>
 			</div>
		</div>
	</div>
</div>
	<div id="alert" style="text-align: center; color: red"></div>
	<button type="submit" class="btn btn-danger" style="position: relative; right:-450px">Submit</button>
	</form><br>
	<div id="footer" style="color:white; clear:both; text-align:center; padding:5px; " class="bg-info sticky-bottom">
Copyright © SQI INC
</div>
</body>
</html>
<script>
	function validateForm(){
		var a=document.forms['f1']['surname'].value;
		var b=document.forms['f1']['middlename'].value;
		var c=document.forms['f1']['lastname'].value;
		var d=document.forms['f1']['number'].value;
		var e=document.forms['f1']['email'].value;
		var f=document.forms['f1']['address'].value;
		var g=document.forms['f1']['sponsorname'].value;
		var h=document.forms['f1']['sponsorno'].value;
		var i=document.forms['f1']['sponsormail'].value;
		var j=document.forms['f1']['username'].value;
		var k=document.forms['f1']['password'].value;
		var l=document.forms['f1']['password1'].value;
		if(a==""||b==""||c==""||d==""||e==""||f==""||g==""||h==""||i==""||j==""||k==""){
			document.getElementById('alert').innerHTML="<i>!!You have to fill all inputs</i>";
			return false;
		}
		if(k!==l){
			document.getElementById('alert').innerHTML="<i>!!Password not the same</i>";
			return false;
		}
	}
</script>