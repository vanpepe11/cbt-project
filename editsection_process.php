<?php 
require("classlibrary/class_section.php");
$a=$_POST['sec_id'];
$b=$_POST['section_name'];
$e=$_POST['exam_id'];
$exam= New Exam();
$exam->connect();
$exam->edit($a,$b);
$exam->display($e);
?>