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
		$p=mysqli_query($this->connect, "INSERT into section_tb (exam_id, section_name) VALUES('$e', '$b')");
		if(!$p){
			echo "error";
		}
	}
	public function edit($a,$b){
		$p=mysqli_query($this->connect, "UPDATE section_tb set section_name='$b' where sec_id='$a'");
	}
	public function delete($a){
		$k=mysqli_query($this->connect, "DELETE FROM section_tb WHERE sec_id='$a'");
	}
	public function display($e){
		$k = mysqli_query($this->connect, "SELECT* from section_tb where exam_id='$e'");

		echo "<div><table class='table'><tr><th>SECTION TITLE</th><th></th><th></th><tr>";

         while($row=mysqli_fetch_array($k)){
          echo "<tr id='".$row['sec_id']."'><td class='section'>".$row['section_name']."</td><td><button class='btn btn-success edit'>Edit</button></td><td><button class='btn btn-success delete'>Delete</button></td><td><a href='questions.php?section_id=".$row['sec_id']."&section_name=".$row['section_name']."'><button class='btn btn-warning'>Add Questions</button></a></td></tr>"; 
         }
        echo "</table></div>";
	}
}
?>