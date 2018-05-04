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
<?php include('navbar.php'); ?>
</body>
</html>
<?php }else{
	include('lecturer_login.php');
}
?>