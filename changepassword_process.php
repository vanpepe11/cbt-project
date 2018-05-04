<?php
require("classlibrary/class_student.php");
$edit= new Student();
$a=$_POST['password0'];
$b=$_POST['password1'];
$c=$_POST['student_id'];
$edit->connect();
$edit->editPassword($a,$b,$c);
?>