<?php
include("classlibrary/class_student.php");
$student= new Student();
$student->connect();
$u=$_POST['username'];
$pass=$_POST['password'];
$student->login($u,$pass);
?>