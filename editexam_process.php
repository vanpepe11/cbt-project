<?php 
require("classlibrary/class_exam.php");
$a=$_POST['exam_id'];
$b=$_POST['title'];
$e=$_POST['course_id'];
$exam= New Exam();
$exam->connect();
$exam->edit($a,$b);
$exam->display($e);
?>