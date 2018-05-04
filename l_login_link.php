<div class="container">
  </div>
  <div class="container">
    <h2 class="text-center ">Welcome <?php echo $_SESSION['username']; ?></h2>
    <h3 class="text-center">Kindly add your Questions on this page.</h3>
    <p class="text-center">Please do well to correctly fill in the appropriate informations before.....</p>
    <form method="post" action="addquestions.php" onsubmit="keep()">
      <div class="row">
          <div class="col-md-5">
            <div class="panel panel-default">
              <h4 class="text-center text-info">Course Information</h4>
              <div class="panel-body">
                <div class="form-group">
                  <label for="Course-Name" class="text-info">Course Name:</label>
                  <input type="text" name="coursename" placeholder="Course Name" class="form-control">
                </div>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label for="session" class="text-info">Session:</label>
                  <input type="number" name="session" placeholder="Input Session" class="form-control">
                </div>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label for="Course-Name" class="text-info">Course Description:</label>
                  <input type="text" name="coursedes" placeholder="Course Description" class="form-control">
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="panel-default panel">
              <h4 class="text-info text-center">Choose Year</h4>
              <div class="panel-body">
                <div class="form-group">
                  <label class="text-info" for="Session">Session :</label><br>
                  <select class="text-info">
                    <option>Year</option>
                    <option>2017/2018</option>
                    <option>2018/2019</option>
                    <option>2019/2020</option>
                    <option>2020/2021</option>
                    <option>2021/2022</option>
                  </select>
                </div>
                <?php
                $con=mysqli_connect("localhost","root","","project");
                $count= mysqli_query($con, "SELECT * FROM session_tb");
                ?>
                <div class="form-group">
                  <label for="Exam-Title" class="text-info ">Exam-Title:</label>
                  <input type="text" placeholder="Exam Title" name="examtitle" class="form-control">
                </div>
                <div class="panel-body">
            <h4 class="text-center">Sections</h4>
            <p class="text-warning">Specify number of sections</p>
            <div class="panel panel-default">
              <input type="number" name="" class="form-control text-info" min="1" max="5" id="section">
            </div>
          </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <input type="submit" value="Submit" style="margin-left: 40%" name="submit" class="btn btn-info btn-dark">
            </div>
          </div>
      </div>
    </form>
    <?php
      $a= $_SESSION['username'];
      $con=mysqli_connect("localhost","root","","project");
      $count= mysqli_query($con, "SELECT * FROM lecturers_tb where Username='$a' ");
    while($row = mysqli_fetch_assoc($count)) {
         $p=$row["Passport_link"];
         $d=$row["Surname"];
         echo "Welcome ".$d;
         echo "<img class='img-circle' width='40' height='40' src=".$p.">";
    } 
    ?>
    <label for="firstname">Username:</label>
        <div class="input-group">
                <span class=""></span><input type="text" class="form-control" id="uname" name="username">
              </div>
  <div class="container"><div class="row"><div class="col-md-8" id="cont"><form method="post" action="addcourse_process.php" id="form" name="f1" onsubmit="return validateForm()"><div class="panel panel-default"><h4 class="text-center text-info">Course Information</h4><div class="panel-body"><div class="form-group"><label for="Course-Name" class="text-info">Course Name:</label><input type="text" placeholder="Course Name" class="form-control" name="name"></div></div><div class="panel-body"><div class="form-group"><label for="Course-Code" class="text-info">Course Code:</label><input type="text" placeholder="Course Code" class="form-control" name="code"></div></div><div class="panel-body"><div class="form-group"><label for="Course-Name" class="text-info">Course Description:</label><textarea class="form-control" id="Course-Name" name="description"></textarea></div></div></div><p id="alert" style="text-align: center; color: red"></p><input type="submit" value="Submit" style="margin-left: 40%" name="submit"class="btn btn-info btn-dark"></form></div></div></div>