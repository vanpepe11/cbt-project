<?php 
require("classlibrary/class_course.php");
$course= new Course();
$a=$_POST['name'];
$b=$_POST['code'];
$c=$_POST['description'];
$d=$_POST['session'];
$e=$_POST['lecturer_id'];
$course->setDetail($a, $b, $c, $d, $e);
$course->connect();
$course->saveDetail();
$course->dispTable();
?>