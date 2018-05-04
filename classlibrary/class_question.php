<?php
class Question{
	public $connect;
	public function connect(){
		$p=$this->connect = mysqli_connect("localhost", "root","","project");
		if(!$p){
			echo "error";
		}
	}
	public function save($a,$b,$c,$d,$e,$f, $g){
		$p=mysqli_query($this->connect, "INSERT into questions_tb (sec_id, Question, Option1, Option2, Option3, Option4, Answer) VALUES('$a', '$b', '$c', '$d', '$e', '$f', '$g')");
		if(!$p){
			echo "error";
		}
		else{ echo "question successfully added";}
	}
	public function edit($a,$b,$c,$d,$e,$f,$g){
		$p=mysqli_query($this->connect, "UPDATE questions_tb set Question='$b', Option1='$c', Option2='$d', Option3='$e', Option4='$f', Answer='$g' where Q_id='$a'");
		if(!$p){
			echo "error";
		}
		else{
			echo "Question successfully edited";
		}
	}
	public function delete($a){
		$k=mysqli_query($this->connect, "DELETE FROM questions_tb WHERE Q_id='$a'");
		if(!$k){
			echo "error";
		}
		else{
			echo "Question successfully deleted";
		}
	}
	public function display(){
		$k = mysqli_query($this->connect, "SELECT* from questions_tb");
		echo "<div><table class='table'><tr><th></th><th>QUESTION</th><th>OPTION1</th><th>OPTION2</th><th>OPTION3</th><th>OPTION4</th><th>ANSWER</th><th></th><th></th><tr>";
		$counter=1;
         while($row=mysqli_fetch_assoc($k)){
          echo "<tr id='".$row['Q_id']."'><td class='count'>".$counter."</td><td class='quest'>".$row['Question']."</td><td class='opt1'>".$row['Option1']."</td><td class='opt2'>".$row['Option2']."</td><td class='opt3'>".$row['Option3']."</td><td class='opt4'>".$row['Option4']."</td><td>".$row['Answer']."</td><td><button class='btn btn-success edit'>Edit</button></td><td><button class='btn btn-danger delete'>Delete</button></td></tr>"; 
          $counter++;
         }
          echo "</table></div>";
	}
}
?>
