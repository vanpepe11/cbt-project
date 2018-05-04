<?php 
require("classlibrary/class_course.php");
$a=$_POST['id'];
$course= new Course();
$course->connect();
$course->deleteCourse($a);
$course->dispTable();
?>