<?php 
require("classlibrary/class_section.php");
$e=$_POST['exam_id'];
$exam= new Exam();
$exam->connect();
$exam->display($e);
?>