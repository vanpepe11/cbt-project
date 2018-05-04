<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-5">
			<div class="panel panel-success">
 				<div class="panel-heading text-center"><h3>Registration Form</h3></div>
 				<div class="panel-body">
 					<form role="form" method="post" action="nonadmin_process.php" enctype="multipart/form-data" onsubmit="return validateForm()" name="f1">
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