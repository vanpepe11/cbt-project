<?php
if (session_id()=="") {
  session_start(); 
}
class Lecturer{
	public $userName;
	public $password;
	public $surname;
	public $middleName;
	public $lastName;
	public $email;
	public $con;
	public $plink;
	public $status= "unrestricted";
	public function setName($uname){
		$this->userName= $uname;
	}
	public function setPass($pword){
		$this->password= $pword;
	}
	public function disp(){
		echo $this->userName ."<br>";
		echo $this->password;
	}
	public function setMname($mname){
		$this->middleName=$mname;
	}
	public function setSname($sname){
		$this->surname=$sname;
	}
	public function setLname($lname){
		$this->lastName=$lname;
	}
	public function setEmail($mail){
		$this->email=$mail;
	}
	public function connect(){
		return $this->con=mysqli_connect("localhost","root","","project");
	}
	public function con2(){
		return $con= new mysqli("localhost","root","","project");
	}
	public function AdminSave(){
		$k=mysqli_query($this->con, "INSERT into lecturers_tb (Surname, Middlename, Lastname, Email, Username, Password, Passport_link, Access) values('$this->surname','$this->middleName','$this->lastName','$this->email','$this->userName','$this->password','$this->plink','$this->status')");
		if($k!=1){
			echo "not added";
		}
			
		header("location:lecturer_portal.php"); 
	}
	public function save(){
		$k=mysqli_query($this->con, "INSERT into lecturers_tb (Surname, Middlename, Lastname, Email, Username, Password, Passport_link, Access) values('$this->surname','$this->middleName','$this->lastName','$this->email','$this->userName','$this->password','$this->plink','restricted')");
		if($k!=1){
			echo "not added";
		} 
	}
	public function login($u, $pass, $conn){
		//$coon=mysqli_connect("localhost","root","","project");
		$r=$conn->prepare("SELECT * from lecturers_tb where Username=? and Password=?");
		$r->bind_param("ss", $u, $pass);
		if($r->execute()){
			$s= $r->get_result();
		$count= mysqli_num_rows($s);
		if($count>0){
			$_SESSION['username'] = $u;
			echo 'found';
		}
		else{echo 'Username not found';}
		}
	}
	public function processFile($psize,$ptype, $pname, $ploc){
		$link='passport/'.$pname;
		move_uploaded_file($ploc, $link);
		$this->plink= $link;
	}
	public function getTable(){
		$p=mysqli_query($this->con, "SELECT* from lecturers_tb");
		echo "<table class='table table-bordered'>";
		while($row= mysqli_fetch_array($p)){
			echo"<tr><td>".$row['Surname']."</td><td>".$row['Middlename']."</td><td><img src=".$row['Passport_link']." height='25px' width='25px'></td></tr>";
		}
		echo "</table>";
	}
}
?>