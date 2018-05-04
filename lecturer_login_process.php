<?php
require("classlibrary/classlecturer.php");
$lecturer = new Lecturer();
$conn=$lecturer->con2();
$u=$_POST['username'];
$pass=$_POST['password'];
$lecturer->login($u,$pass, $conn);
?>