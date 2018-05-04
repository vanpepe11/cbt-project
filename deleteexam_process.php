<?php 
require("classlibrary/class_exam.php");
$a=$_POST['exam_id'];
$e=$_POST['course_id'];
$exam= New Exam();
$exam->connect();
$exam->delete($a);
$exam->display($e);
?>