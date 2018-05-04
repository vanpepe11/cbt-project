<?php 
require("classlibrary/class_exam.php");
$e=$_POST['course_id'];
$b=$_POST['title'];
$exam= New Exam();
$exam->connect();
$exam->save($e,$b);
$exam->display($e);
 ?>