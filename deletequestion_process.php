<?php
include("classlibrary/class_question.php");
$question= new Question();
$a=$_POST['Q_id'];
$question->connect();
$question->delete($a);
?>