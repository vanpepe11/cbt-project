<?php
class Course{
	public $course_code;
	public $course_title;
	public $course_description;
	public $connect;
	public $result;
	public $secSession;
	public $lecturer_id;
	public function setDetail($a, $b, $c, $d, $e){
		$this->course_title=$a;
		$this->course_code=$b;
		$this->course_description=$c;
		$this->secSession=$d;
		$this->lecturer_id=$e;
	}
	public function saveDetail(){
		$d= mysqli_query($this->connect, "INSERT into course_tb (course_code, course_title, course_description, session_id, lecturer_id) VALUES ('$this->course_code', '$this->course_title', '$this->course_description', '$this->secSession', '$this->lecturer_id')");
		if($d!=1){
			echo "not added";
		}
	}
	public function connect(){
		$this->connect= mysqli_connect("localhost","root","","project");
	}
	public function dispTable(){
         $r=mysqli_query($this->connect, "SELECT * from course_tb");
         echo "<div id='table'><table class='table'><tr><th>COURSE CODE</th><th>COURSE TITLE</th><th>COURSE DESCRIPTION</th><th></th><th></th><tr>";
         while($row=mysqli_fetch_array($r)){
          echo "<tr id='".$row['course_id']."'><td class='first'>".$row['course_code']."</td><td>".$row['course_title']."</td><td>".$row['course_description']."</td><td><button class='edit btn btn-primary'>Edit</button></td><td><button class='delete btn btn-danger'>Delete</button></td></tr>"; 
         }
          echo "</table></div>";
	}
	public function myCourse($k){
         $r=mysqli_query($this->connect, "SELECT * from course_tb where lecturer_id='$k'");
         echo "<div id='table1'><table class='table'><tr><th>COURSE CODE</th><th>COURSE TITLE</th><th>COURSE DESCRIPTION</th><th></th><tr>";
         while($row=mysqli_fetch_array($r)){
          echo "<tr id='".$row['course_id']."'><td class='third'>".$row['course_code']."</td><td>".$row['course_title']."</td><td>".$row['course_description']."</td><td><a href='addquestions.php?code=".$row['course_code']."&id=".$row['course_id']."'><button class='btn btn-success access'>Access Course</button></a></td></tr>"; 
         }
          echo "</table></div>";
	}
	public function dynamicSession(){
		$r=mysqli_query($this->connect, "SELECT * from session_tb");
        echo '<div class="panel-body"><div class="form-group">';
        echo '<label class="text-info" for="Session">Session :</label><select class="text-info" name="session" id="csess">';
        while($row=mysqli_fetch_assoc($r)){
          	echo "<option value=".$row['session_id'].">".$row['session']."</option>";
        }
        echo '</select></div></div>';
	}
	public function deleteCourse($a){
		$k=mysqli_query($this->connect, "DELETE FROM course_tb WHERE course_id='$a'");
	}
	public function editCourse($a, $b, $c, $d){
		mysqli_query($this->connect, "UPDATE course_tb set course_title='$b', course_code='$c', course_description='$d'  where course_id='$a'");
	}
}
?>