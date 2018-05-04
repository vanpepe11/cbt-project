<?php
if(session_id()==""){
	session_start();
}
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html> 
<head>
	<title>Student Portal</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap4/dist/js/bootstrap.js"></script>
  <link src="fontawesome/web/css/fontawesome-all.css">
  <script src="fontawesome/svg-with-js/js/fontawesome-all.js"></script>
</head>
<body>
<?php include("studentnavbar.php"); ?>
<div class="container">
	<div class="row" id="editform">
		<div class="col-md-3">
			
		</div>
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
		</div>
		<div id="alert" style="text-align: center; color: red"></div>
	<button class="btn btn-danger" id="submit">Submit</button>
	</div>
	<div class="row" id="passedit">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-body text-primary">
							<label for="Username">Old Password:</label>
 							<div class="input-group">
 								<span class="fas fa-user fa-2x"> </span><input type="text" class="form-control" id="oldpass">
 							</div>
 							<label for="Password">New Password:</label>
 							<div class="input-group">
 								<span class="fas fa-lock fa-2x"></span><input type="text" class="form-control" id="newpass" name="password">
 							</div>
 							<label for="Password1">Confirm Password:</label>
 							<div class="input-group">
 								<span class="fas fa-lock fa-2x"></span><input type="text" class="form-control" id="Password1" name="confpass">
 							</div>
				</div>
				</div><br>
				<div id="alert" style="text-align: center; color: red"></div>
	<button class="btn btn-danger" style="position: relative; right:0px" id="change">Change</button>
		</div>
	</div>
</div>
<div id="footer" style="color:white; clear:both; text-align:center; padding:5px; " class="bg-info sticky-bottom">
Copyright © SQI INC
</div>
</body>
</html>
<?php
}else{
header("location:student_login_page.php");
}
?>
<script>
	$(document).ready(function(){
		$(window).load(function(){
			$("#editform").hide();
			$("#passedit").hide();
		});
		$(document).on("click", "#infoedit", function(){
			$("#passedit").hide();
			$("#editform").show();
		});
		$(document).on("click", "#pwordedit", function(){
			$("#editform").hide();
			$("#passedit").show();
		});
		$(document).on("click", "#submit", function(){
			a=$("#sur").val();
			b=$("#mdn").val();
			c=$("#lnm").val();
			d=$("#sel1").val();
			e=$("#dav").val();
			f=$("#emm").val();
			g=$("#hma").val();
			h=$("#spon").val();
			i=$("#tel").val();
			j=$("#ema").val();
			k=$("#stdId").html();
			if(a==""||b==""||c==""||d==""||e==""||f==""||g==""||h==""||i==""||j==""){
				alert("please fill all inputs correctly");
			}
			else{
				$.post("editdata_process.php", {surname:a, mname:b, lname:c, gender:d, number:e, email:f, add:g, spname:h, spnum:i, spema:j, student_id:k}, function(resp){
					alert(resp);
					window.location="student_portal.php";
				});
			}
		});
		$(document).on("click", "#change", function(){
			a=$("#oldpass").val();
			b=$("#newpass").val();
			c=$("#confpass").val();
			k=$("#stdId").html();
			if(a==""||b==""){
				alert("please fill all inputs correctly");
			}
			else{
				$.post("changepassword_process.php", {password0:a, password1:b, student_id:k}, function(resp){
					if(resp=="edited"){
						window.location="student_portal.php";
					}
					else{
						alert(resp);
					}
				});
			}
		});
	})
</script>