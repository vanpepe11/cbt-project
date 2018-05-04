<?php 
require("classlibrary/class_year.php");
$a=$_POST['id'];
$course= new Year();
$course->connect();
$course->deleteSession($a);
$course->dispSession();
?>