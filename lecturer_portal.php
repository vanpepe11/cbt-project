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
	<title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery.js"></script>
  <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.css">
  <script src="bootstrap4/dist/js/bootstrap.js"></script>
  <script src="fontawesome-all.min.js"></script>
</head>
<body>
</nav>	
		<?php include('navbar.php'); ?>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-8" id="cont">
    <h3 class="text-center text-info">Add new course</h3>
      <div id="form" name="f1">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="form-group">
            <label for="Course-Name" class="text-info">Course Name:</label>
              <input type="text" placeholder="Course Name" class="form-control" name="name" id="cname">
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="Course-Code" class="text-info">Course Code:</label>
              <input type="text" placeholder="Course Code" class="form-control" name="code" id="ccode">
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="Course-Name" class="text-info">Course Description:</label>
              <textarea class="form-control" name="description" id="cdesc"></textarea>
          </div>
        </div>
    </div>
    <p id="alert1" style="text-align: center; color: red"></p>
    <input type="submit" value="Submit" style="margin-left: 40%" name="submit" class="btn btn-success" id="submit1">
    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-8" id="cont2">
        <div class="panel-body">
          <div class="form-group">
            <label for="session" class="text-info">Add new Session:</label>
              <input type="text" placeholder="Input Session" class="form-control" id="sesh">
          </div>
        </div>
        <p id="alert2" style="text-align: center; color: red"></p>
          <input type="submit" style="margin-left: 40%" class="btn btn-success" id="submit2">
      </div>
    </div>
    <div class="row">
      <div class="col-md-8" id="cont3">

      </div>
    </div>
</div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        Course code: <input type="text" name="" id="mcode"><br><br>
        Course title: <input type="text" name="" id="mname"><br><br>
        Course description:<div contenteditable="" id="mdesc" style="border: 1px solid grey"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="doedit">Ok</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
      DELETE COURSE
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete">Ok</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Modalyear">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="warn"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete this year?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="delyear">Ok</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div id="footer" style="color:white; clear:both; text-align:center; padding:5px; " class="bg-info fixed-bottom">
Copyright © SQI INC
</div>
</body>
</html>
<script>
$(document).ready(function(){
  var a;
  var b;
  var c;
  function get(){
    $.post("displaycourse_process.php", "", function(resp){
      $("body").find("#cont").prepend(resp);
    });
  }
  function get2(){
    $.post("displaydynsession.php", "", function(resp){
      $("body").find("#form").prepend(resp);
    });
  }
  function get3(){
    $.post("displaysession_process.php", "", function(resp){
      $("body").find("#cont2").prepend(resp);
    });
  }
  $(window).load(function(){
    get();
    get2();
    get3();
    $("#cont").hide();
    $("#cont2").hide();
    $("#cont3").hide();
  });
});
$(document).on("click","#course", function(){
    a=$("body").find("#cont2").html();
    b=$("body").find("#cont3").html();
    if(a==null && b==null){
      $("#cont").show(1000);
    }
    else{
      $("#cont2").hide(500);
      $("#cont3").hide(500);
      $("#cont").show(500);
    }
});
$(document).on("click","#session", function(){
    a=$("body").find("#cont").html();
    b=$("body").find("#cont3").html();
    if(a==null && b==null){
      $("#cont2").show(1000);
    }
    else{
      $("#cont").hide(500);
      $("#cont3").hide(500);
      $("#cont2").show();
    }
});
$(document).on("click","#submit1", function(){
    v=$("body").find("#lecId").html();
    a=$("#cname").val();
    b=$("#ccode").val();
    c=$("#cdesc").val();
    d=$("#csess").val();
    if(a===""||b===""||c===""||d===""){
      alert("fill all available fields");
    }
    else{
      $.post("addcourse_process.php", {name:a, code:b, description:c, session:d, lecturer_id:v} ,function(resp){
        $("body").find("#table").html(resp);
        $("#cname").val("");
        $("#ccode").val("");
        $("#cdesc").val("");
        $("#csess").val("");
         });
    } 
});
$(document).on("click", ".delete", function(){
    k=$(this).closest("tr").attr("id");
    j=$(this).closest("tr").children("td.first").html();
      $("body").find('#warning').html('You are trying to delete '+j);
      $("#Modaldel").modal({backdrop:'static', keyboard:false});
      b=k;
});
$(document).on("click", "#delete", function(){
    $.post("coursedelete_process.php", {id:b}, function(resp){
         $("body").find("#table").html(resp);
         });
});
$(document).on("click", ".edit", function(k){
    k=$(this).closest("tr").attr("id");
    j=$(this).closest("tr").children("td.first").html();
      $("body").find('#title').html('You are trying to edit '+j);
      $("#myModal").modal({backdrop:'static', keyboard:false});
      a=k;
});
$(document).on("click", "#doedit",  function(){
  b=$("#mname").val();
  c=$("#mcode").val();
  d=$("#mdesc").html();
  if(b===""||c===""||d===""){
      alert("fill all available fields");
    }
    else{
      $.post("courseedit_process.php", {id:a, name:b, code:c, description:d}, function(resp){
        $("body").find("#table").html(resp);
        $("#mname").val("");
        $("#mcode").val("");
        $("#mdesc").html("");
         });
    } 
});
$(document).on("click", ".del", function(){
    k=$(this).closest("tr").attr("id");
    j=$(this).closest("tr").children("td.sec").html();
      $("body").find('#warn').html('You are tryin to delete year '+j);
      $("#Modalyear").modal({backdrop:'static', keyboard:false});
       c=k;
});
$(document).on("click", "#delyear", function(){
    $.post("deletesession_process.php", {id:c}, function(resp){
         $("body").find("#table2").html(resp);
         });
});
$(document).on("click", "#mycourse", function(){
    v=$("body").find("#lecId").html();
    $.post("mycourse_process.php", {id:v}, function(resp){
         $("#cont3").html(resp);
         });
    a=$("body").find("#cont").html();
    b=$("body").find("#cont2").html();
    if(a==null && b==null){
      $("#cont3").show(1000);
    }
    else{
      $("#cont").hide(500);
      $("#cont2").hide(500);
      $("#cont3").show();
    }
});
$(document).on("click", "#submit2", function(){
    p=$("#sesh").val();
    if(p==""){
      alert("session is empty");
    }
    else{
      $.post("addyear_process.php", {session:p}, function(resp){
      $("body").find("#table2").html(resp);
      $("#sesh").val("");
      });
    }
});
</script>
<?php }else{
	header('location:lecturer_login.php');
}
?>