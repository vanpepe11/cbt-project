<?php 
require("classlibrary/class_course.php");
$course= new Course();
$k=$_POST['id'];
$course->connect();
$course->myCourse($k);
?>