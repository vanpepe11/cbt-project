<?php 
include("classlibrary/class_exam.php");
$e=$_POST['course_id'];
$exam= New Exam();
$exam->connect();
$exam->display($e);
 ?>