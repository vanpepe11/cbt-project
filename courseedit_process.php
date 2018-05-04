<?php 
require("classlibrary/class_course.php");
$course= new Course();
$b=$_POST['name'];
$c=$_POST['code'];
$d=$_POST['description'];
$a=$_POST['id'];
$course->connect();
$course->editCourse($a,$b,$c,$d);
$course->dispTable();
?>