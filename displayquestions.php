<?php
include("classlibrary/class_question.php");
$question= new Question();
$question->connect();
$question->display();
?>