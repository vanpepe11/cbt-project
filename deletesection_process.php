<?php 
require("classlibrary/class_section.php");
$a=$_POST['sec_id'];
$e=$_POST['exam_id'];
$exam= New Exam();
$exam->connect();
$exam->delete($a);
$exam->display($e);
?>