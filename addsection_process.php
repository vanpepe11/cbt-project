<?php 
require("classlibrary/class_section.php");
$e=$_POST['exam_id'];
$b=$_POST['section_name'];
$exam= New Exam();
$exam->connect();
$exam->save($e,$b);
$exam->display($e);
 ?>