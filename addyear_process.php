<?php 
require("classlibrary/class_year.php");
$addyear= new Year();
$e=$_POST['session'];
$addyear->setSession($e);
$addyear->connect();
$addyear->session();
$addyear->dispSession();
?>