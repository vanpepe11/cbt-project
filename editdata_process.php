<?php
require("classlibrary/class_student.php");
$edit= new Student();
$a=$_POST['surname'];
$b=$_POST['mname'];
$c=$_POST['lname'];
$d=$_POST['gender'];
$e=$_POST['number'];
$f=$_POST['email'];
$g=$_POST['add'];
$h=$_POST['spname'];
$i=$_POST['spnum'];
$j=$_POST['spema'];
$k=$_POST['student_id'];
$edit->connect();
$edit->editData($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k);
?>