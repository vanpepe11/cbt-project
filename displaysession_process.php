<?php 
require("classlibrary/class_year.php");
$course= new Year();
$course->connect();
$course->dispSession();
?>