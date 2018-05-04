<?php
class Year{
	public $connect;
	public $session;
	public function connect(){
		$this->connect=mysqli_connect("localhost", "root", "", "project");
	}
	public function setSession($e){
		$this->session=$e;
	}
	public function session(){
		mysqli_query($this->connect, "INSERT into session_tb (session) VALUES ('$this->session')");
	}
	public function dispSession(){
		$k=mysqli_query($this->connect, " SELECT * from session_tb");
		echo "<div><table class='table' id='table2'><tr><th>SESSION</th><th></th><tr>";
		while($row=mysqli_fetch_assoc($k)){
			echo "<tr id=".$row['session_id']."><td class='sec'>".$row['session']."</td><td><button class='btn btn-danger del'>Delete</button></td>";
		}
		echo "</table></div>";
	}
	public function deleteSession($a){
		$k=mysqli_query($this->connect, "DELETE FROM session_tb WHERE session_id='$a'");
	}
}
?>