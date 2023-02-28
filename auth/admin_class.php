<?php
Class Action {
	private $db;

	public function __construct() {
		ob_start();
        include 'db_connect.php';
        $this->db = $conn;
	}
    
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
        $email=$_POST['email'];
        $password=$_POST['pwd'];
		$encyp_pwd=md5($password);
		$qry = $this->db->query("SELECT * FROM registration WHERE reg_email = '$email' and reg_pwd = '$encyp_pwd'");
		$username='';
		$str = '';
		if($qry->num_rows > 0)
		{
			while($row = mysqli_fetch_array($qry)) 
			{
				$str = $row["reg_role"];
				$username=$row["reg_name"];
				$regid=$row["reg_id"];
				$regmob=$row["reg_mob"];
			}	
				if($str==1)
				{
					$_SESSION['user'] = $email;
					$_SESSION['username'] = $username;
					$_SESSION['regid'] = $regid;
					$_SESSION['regmob'] = $regmob;
					return 1;
				}
				else if($str==4)
				{
					$_SESSION['admin'] = $email;
					return 4;
				}
				else if($str==2)
				{
					$_SESSION['admin'] = $email;
					return 7;
				}
				else if($str==3)
				{
					$_SESSION['designer'] = $email;
					return 6;
				}
		}
		else
		{
			return 5;
		}

}


	function signup(){
		// $name=$_POST['name'];
		// $email=$_POST['email'];
        // $password=$_POST['password'];
		// $encyp_pwd=md5($password);
        // $mob=$_POST['mob'];
        // $addr=$_POST['addr'];
        // $city=$_POST['city'];
		// $state=$_POST['state'];
        // $pin=$_POST['pin'];
        // $district=$_POST['district'];
		//$newstr = filter_var($newstr, FILTER_SANITIZE_STRING);
        $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$password=$_POST['password'];
		$encyp_pwd=md5($password);
		$mob=$_POST['mob'];
		//$valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

		$addr=filter_var($_POST['addr'], FILTER_SANITIZE_STRING);
		$city=filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$district=filter_var($_POST['district'], FILTER_SANITIZE_STRING);
		$state=filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$pin=$_POST['pin'];

        $qry = $this->db->query("INSERT INTO registration( reg_name, reg_email, reg_pwd, reg_mob, reg_addr, reg_city, reg_state, reg_pin, reg_district) VALUES ('$name','$email','$encyp_pwd','$mob','$addr','$city','$state','$pin','$district')");
		//$qry = $this->db->query("SELECT reg_id FROM registration WHERE $name=reg_name");
		//$qry2 = $this->db->query("INSERT INTO tbl_login( reg_id) VALUES (reg_id));

		return $qry;
	}
	function states()
	{
		
		$qry = $this->db->query("SELECT * FROM states");
		$str = '';
		while($row = mysqli_fetch_array($qry)) {
			$str .= $row["state_name"].'|';
			}
		return $str;
	}

	function districts()
	{
		$state_name = $_POST["state_name"];
		$qry2 = $this->db->query("SELECT state_id FROM states where state_name = '$state_name'");
		$table = mysqli_fetch_all($qry2,MYSQLI_ASSOC);
		$state_id = $table[0]["state_id"];
		
		$qry = $this->db->query("SELECT * FROM district where state_id = '$state_id'");
		$str = '';
		while($row = mysqli_fetch_array($qry)) {
			//$str .= '<option value="'.$row["district_name"].'">';
			$str .= $row["district_name"].'|';
		}
		return $str;
	}

	function citys(){
		$district_name = $_POST["district_id"];
		$qry2 = $this->db->query("SELECT district_id FROM district where district_name = '$district_name'");
		$table = mysqli_fetch_all($qry2,MYSQLI_ASSOC);
		$district_id = $table[0]['district_id'];
		$qry = $this->db->query("SELECT * FROM city where district_id = '$district_id'");
		$str = '';
		while($row = mysqli_fetch_array($qry)) {
			//$str .= '<option value="'.$row["city_name"].'">';
			$str .= $row["city_name"].'|';
			}
		return $str;
	}

	function verifyotp(){
		extract($_POST);
		if(isset($_SESSION["otp"])){
			if(md5($otp)==$_SESSION["otp"]){
				return 1;
			}
			else{
				return 2;
			}
		}
		else{
			return 3;
		}
	}

	function changepass()
	{
	extract($_POST);
	if(isset($pass1)){
		if($pass==$pass1)
		{
			$email = $_SESSION['forgotemail'];
			$e_pass = md5($pass1);
			// UPDATE userlogin SET password='$e_pass' WHERE email = '$email';
			$qry = $this->db->query("UPDATE registration SET reg_pwd='$e_pass' WHERE reg_email = '$email'");
			return $qry;
		}
		else  
		{
			return 4;
		}
	}
	else{ 
		return 3;
	}

}

function unamecheck(){
	extract($_POST);
	$username_s = filter_var($email, FILTER_SANITIZE_STRING);
	$qry = $this->db->query("SELECT count(*) as cnt FROM registration WHERE reg_email = '".$username_s."'");
	$row = mysqli_fetch_array($qry,MYSQLI_ASSOC);
	if($row['cnt']!= 0){
		return 1;
	} else {
		return 2;
	}
}

}