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
	<title>QUESTIONS</title>
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
        <a class="nav-link" href="#" id="add">ADD QUESTIONS</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="#" id="view">VIEW QUESTIONS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">LOGOUT</a>
    </li>
    </ul>
  </div>
  </nav>
  <br><br>
  <div class="container">
  <p id="sec_id" hidden=""><?php $a=$_GET['section_id']; echo $a; ?></p>
  <div class="row" id="dispquestion">
    <div class="col-md-12" id="place">
      
    </div>
  </div>
	<div class="row" id="addquestion">
		<label for="question">Question:</label>
 			<div class="input-group">
 			<span></span><div contenteditable="" style=" border: solid 1px; height: 70px; width:90%; border-radius: 5px" id="question">
 			</div>
		<div class="col-md-8">
			<div class="panel panel-success">
 				<div class="panel-heading text-center"><h3></h3></div>
 				<div class="panel-body">
 				<div class="form-group">
 					<label for="option1">OPTION A:</label>
 					<div class="input-group">
 					<span></span><input type="text" name="option1" class="form-control" id="option1"></div><br>
 					<label for="option2">OPTION B:</label>
 					<div class="input-group">
 					<span></span><input type="text" name="option2" class="form-control" id="option2"></div><br>
 					<label for="option3">OPTION C:</label>
 					<div class="input-group">
 					<span></span><input type="text" name="option3" class="form-control" id="option3"></div><br>
 					<label for="option4">OPTION D:</label>
 					<div class="input-group">
 					<span></span><input type="text" name="option4" class="form-control" id="option4"></div><br>
 					<label for="option4">ANSWER:</label>
 					<div class="input-group">
 					<span></span><select class="form-control" id="options"><option>A</option><option>B</option><option>C</option><option>D</option></select><br>
 				</div>
 				</div>
        <span class="fas fa-spinner fa-spin fa-2x" style="color: red;" id="spinner"></span><br>
 				<button name="" class="btn btn-primary" style="text-align: center" id="submit">Submit</button>
 			</div>
		</div>	
	</div>	
</div>
</div>
<div class="modal fade" id="Modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <div contenteditable="" style=" border: solid 1px; height: 70px; width:100%; border-radius: 5px" id="quest"></div>
        <div class="form-group">
          <label for="option1">OPTION A:</label>
          <div class="input-group">
          <span></span><input type="text" name="option1" class="form-control" id="opt1"></div>
          <label for="option2">OPTION B:</label>
          <div class="input-group">
          <span></span><input type="text" name="option2" class="form-control" id="opt2"></div>
          <label for="option3">OPTION C:</label>
          <div class="input-group">
          <span></span><input type="text" name="option3" class="form-control" id="opt3"></div>
          <label for="option4">OPTION D:</label>
          <div class="input-group">
          <span></span><input type="text" name="option4" class="form-control" id="opt4"></div>
          <label for="option4">ANSWER:</label>
          <div class="input-group">
          <span></span><select class="form-control" id="opt"><option>A</option><option>B</option><option>C</option><option>D</option></select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="doedit">Ok</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
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
      DELETE QUESTION
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
    // var l;
    // var m;
    // var n;
    // var o;
    // var p;
		$(window).load(function(){
      $("#spinner").hide();
      $("#options").val("");
		});
	});
  $(document).on('click', '#view', function(){
    $("#addquestion").hide();
    $.post("displayquestions.php",{},function(resp){
      $("#place").html(resp);
    });
  });
   $(document).on('click', '#add', function(){
    $("#dispquestion").hide();
    $("#addquestion").show();
  });
  $(document).on('click', '#submit', function(){
      $("#spinner").show();
      a=$("#question").html();
      b=$("#option1").val();
      c=$("#option2").val();
      d=$("#option3").val();
      e=$("#option4").val();
      g=$("#options").val();
      f=$("#sec_id").html();
      if(a==""||b==""||c==""||d==""||e==""||g==""){
        alert("Incomplete Input");
      }
      else{
        $.post("question_process.php", {question:a, option1:b, option2:c, option3:d, option4:e, sec_id:f, answer:g}, function(resp){
          alert(resp);
          $("#spinner").hide();
        })
      }
    });
  $(document).on("click", ".edit", function(k){
    k=$(this).closest("tr").attr("id");
    j=$(this).closest("tr").children("td.count").html();
    l=$(this).closest("tr").children("td.quest").html();
    m=$(this).closest("tr").children("td.opt1").html();
    n=$(this).closest("tr").children("td.opt2").html();
    o=$(this).closest("tr").children("td.opt3").html();
    p=$(this).closest("tr").children("td.opt4").html();
      $("body").find('#title').html('You are trying to edit question number '+j);
      $("#quest").html(l);
      $("#opt1").val(m);
      $("#opt2").val(n);
      $("#opt3").val(o);
      $("#opt4").val(p);
      $("#Modaledit").modal({backdrop:'static', keyboard:false});
      a=k;
  });
  $(document).on("click", ".delete", function(k){
    k=$(this).closest("tr").attr("id");
    j=$(this).closest("tr").children("td.count").html();
      $("body").find('#title').html('Are you sure you want to delete question number '+j+' ?');
      $("#Modaldel").modal({backdrop:'static', keyboard:false});
      b=k;
  });
  $(document).on("click", "#doedit",  function(){
  b=$("#quest").html();
  c=$("#opt1").val();
  d=$("#opt2").val();
  e=$("#opt3").val();
  f=$("#opt4").val();
  g=$("#opt").val();
  if(b===""||c===""||d===""){
      alert("fill all available fields");
    }
    else{
      $.post("editquestion_process.php", {question:b, option1:c, option2:d, option3:e, option4:f, Q_id:a, answer:g}, function(resp){
        alert(resp);
        $.post("displayquestions.php",{},function(resp){
        $("#place").html(resp);
        });
        $("#quest").html("");
        $("#opt1").val("");
        $("#opt2").val("");
        $("#opt3").val("");
        $("#opt4").val("");
        $("#opt").val("");
         });
    } 
});
$(document).on("click", "#delete", function(){
    $.post("deletequestion_process.php", {Q_id:b}, function(resp){
          alert(resp);
         $.post("displayquestions.php",{},function(resp){
        $("#place").html(resp);
        });
});
});
</script>