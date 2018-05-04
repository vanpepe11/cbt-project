<?php
include("classlibrary/class_question.php");
$question= new Question();
$b=$_POST['question'];
$c=$_POST['option1'];
$d=$_POST['option2'];
$e=$_POST['option3'];
$f=$_POST['option4'];
$g=$_POST['answer'];
$a=$_POST['Q_id'];
$question->connect();
$question->edit($a,$b,$c,$d,$e,$f,$g);
?>