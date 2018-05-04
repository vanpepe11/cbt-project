<?php
if (session_id()=="") {
  session_start(); 
}
class Student{
	public $surname;
	public $middleName;
	public $lastName;
	public $gender;
	public $hAddress;
	public $pNumber;
	public $email;
	public $spName;
	public $spNumber;
	public $spEmail;
	public $username;
	public $password;
	public $pLink;
	public $con;
	public function setBiodata($a,$b,$c,$d){
		$this->surname=$a;
		$this->middleName=$b;
		$this->lastName=$c;
		$this->gender=$d;
	}
	public function contact($e,$f,$g){
		$this->hAddress=$e;
		$this->pNumber=$f;
		$this->email=$g;
	}
	public function spInfo($h,$i,$j){
		$this->spName=$h;
		$this->spNumber=$i;
		$this->spEmail=$j;
	}
	public function log($k,$l){
		$this->username=$k;
		$this->password=$l;
	}
	public function connect(){
		$this->con=mysqli_connect("localhost","root","","project");
	}
	public function save(){
		$k=mysqli_query($this->con, "INSERT into student_tb (Surname, Middlename, Lastname, Gender, Email, Phone_No, Username, Password, Home_address, Sponsor, Sp_number, Sp_email, Passport_link) values('$this->surname', '$this->middleName','$this->lastName','$this->gender','$this->email','$this->pNumber', '$this->username', '$this->password','$this->hAddress','$this->spName','$this->spNumber','$this->spEmail','$this->pLink')");
		if($k){
			$_SESSION['username']=$this->username;
			header("location:student_portal.php");
		}
	}
	public function processFile($psize,$ptype, $pname, $ploc){
		$link='Student_passport/'.$pname;
		move_uploaded_file($ploc, $link);
		$this->pLink= $link;
	}
	public function login($u, $pass){
		$r= mysqli_query($this->con, "SELECT * from student_tb where Username='$u' and Password='$pass'");
		$count= mysqli_num_rows($r);
		if($count){
			$_SESSION['username']=$u;
			echo "found";
		}
		else{echo 'Not found';}
	}
	public function editData($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
		$r= mysqli_query($this->con, "UPDATE student_tb set Surname='$a', Middlename='$b', Lastname='$c', Gender='$d', Phone_No='$e', Email='$f', Home_address='$g', Sponsor='$h', Sp_number='$i', Sp_email='$j' where student_id='$k'");
		if($r){
			echo "Data successfully edited";
		}
		else{
			echo "Data edit failed";
		}
	}
	public function editPassword($a,$b,$c){
		$k=mysqli_query($this->con, "SELECT* from student_tb where Password='$a'");
		if(mysqli_num_rows($k)>0){
			$r= mysqli_query($this->con, "UPDATE student_tb set Password='$b' where student_id='$c'");
			echo "edited";
		}
		else{
			echo "password edit failed";
		}
	}
}
?>