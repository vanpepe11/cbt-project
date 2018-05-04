<?php
class Exam{
	public $connect;
	public function connect(){
		$p=$this->connect = mysqli_connect("localhost", "root","","project");
		if(!$p){
			echo "error";
		}
	}
	public function save($e,$b){
		$p=mysqli_query($this->connect, "INSERT into exam_tb (course_id, exam_title) VALUES('$e', '$b')");
		if(!$p){
			echo "error";
		}
	}
	public function edit($a,$b){
		$p=mysqli_query($this->connect, "UPDATE exam_tb set exam_title='$b' where exam_id='$a'");
		if(!$p){
			echo "error";
		}
	}
	public function delete($a){
		$k=mysqli_query($this->connect, "DELETE FROM exam_tb WHERE exam_id='$a'");
	}
	public function display($e){
		$k = mysqli_query($this->connect, "SELECT* from exam_tb where course_id='$e'");
		echo "<div><table class='table'><tr><th>EXAM TITLE</th><th></th><th></th><tr>";
         while($row=mysqli_fetch_array($k)){
          echo "<tr id='".$row['exam_id']."'><td class='title'>".$row['exam_title']."</td><td><button class='btn btn-success edit'>Edit</button></td><td><button class='btn btn-success delete'>Delete</button></td><td><a href='addsections.php?exam_id=".$row['exam_id']."&exam_title=".$row['exam_title']."'<button class='btn btn-success warning'>Access Exam</button></a></td></tr>"; 
         }
          echo "</table></div>";
	}
}
?>