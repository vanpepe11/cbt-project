<!DOCTYPE html>
<html>
<head>
	<title>Student login</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap4/dist/js/bootstrap.js"></script>
  <script src="fontawesome-all.min.js"></script>
</head>
<body class="bg-default">
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-offset-3 col-md-5">
			<div class="panel panel-default" >
 				<div class="panel-heading text-center"><h1>Sign-In</h1></div>
 				<div class="panel-body">
 					<div >
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
 				<div class="panel-footer"><a href="">Register here</a></div>
			</div>
		</div>
	</div>
</div>
</body>
<script>
	$(document).ready(function(){
    $("#confirm").click( function(){
    a=$("#Username").val();
    b=$("#Password").val();
    if(a==""||b==""){
    	$("#alert").html("fill all inputs!")
    }
    else{
    	$.post("student_login_process.php", {username:a, password:b}, function(resp){
          if(resp=="found"){
          window.location="student_portal.php";
         }
         else{
            $("#alert").html("Incorrect details!!");
         }
      });
    }
      
    });
  })
</script>
</html>