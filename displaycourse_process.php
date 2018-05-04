<?php 
require("classlibrary/class_course.php");
$course= new Course();
$course->connect();
$course->dispTable();
?>