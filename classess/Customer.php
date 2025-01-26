<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>

<?php
if (isset($_GET['cid'])) {
    Session::destroy(); // Destroy the session and log out the user
    header("Location: login.php"); // Redirect to the login page
    exit();
}
?>

<?php

class Customer{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}
public function customerRegistration($data){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$country = mysqli_real_escape_string($this->db->link, $data['country']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));


if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass == "") {
	
	$msg = '<div class="alert alert-danger" role="alert">Fields must not be empty!!</div>';
	return $msg;
}

  $mailquery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
  $mailchk = $this->db->select($mailquery);
  if ($mailchk != false) {
  	$msg = '<div class="alert alert-danger" role="alert">Emaill Already Exist...</div>';
	return $msg;
  }else{


  	 $query = "INSERT INTO tbl_customer(name,address,city,country,zip,phone,email,pass) VALUES('$name','$address','$city','$country','$zip','$phone','$email','$pass')";

	 $inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = '<div class="alert alert-success" role="alert">Registered Successfully!! you can go back to <a href="index.php" class="alert-link">HOMEPAGE</a></div>';
				return $msg;
			} else{
				$msg = '<div class="alert alert-danger" role="alert">Failed to register please.... try again..</div>';
				return $msg;
		}
  }
}

public function customerLogin($data){
$email = mysqli_real_escape_string($this->db->link, $data['email']);
$pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));
if (empty($email) || empty($pass)) {
$msg = '<div class="alert alert-danger" role="alert">Fields must not be empty!!</div>';
	return $msg;
}
$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
$result = $this->db->select($query);
if ($result != false) {
	$value = $result->fetch_assoc();
	Session::set("cuslogin",true);
	Session::set("cmrId",$value['id']);
	Session::set("cmrName",$value['name']);

$msg = '<div class="alert alert-success" role="alert">Logged in Successfully!! you can go back to <a href="index.php" class="alert-link">HOMEPAGE</a></div>';
    return $msg;
}else{
	$msg = '<div class="alert alert-danger" role="alert">Your Email or Password is must be wrong!!!</div>';
	return $msg;
}
}

public function getCustomerData($id){
	$query = "SELECT * FROM tbl_customer WHERE id = '$id'";
		$result = $this->db->select($query);
		return $result;
}

public function customerUpdate($data,$cmrId){

$name = mysqli_real_escape_string($this->db->link, $data['name']);
$address = mysqli_real_escape_string($this->db->link, $data['address']);
$city = mysqli_real_escape_string($this->db->link, $data['city']);
$country = mysqli_real_escape_string($this->db->link, $data['country']);
$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
$email = mysqli_real_escape_string($this->db->link, $data['email']);


if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "") {
	
	$msg = '<div class="alert alert-danger" role="alert">Fields must not be empty!!</div>';
	return $msg;
}else{


  	 $query = "INSERT INTO tbl_customer(name,address,city,country,zip,phone,email) VALUES('$name','$address','$city','$country','$zip','$phone','$email',)";

	$query = "UPDATE tbl_customer

	SET
	name = '$name',
	address = '$address', 
	city = '$city', 
	country = '$country', 
	zip = '$zip', 
	phone = '$phone', 
	email = '$email' 

	WHERE id = '$cmrId'";

	$updated_row = $this->db->update($query);
	if ($updated_row) {
		$msg = '<div class="alert alert-success" role="alert">Customer Data Updated Successfully.</div>';
				return $msg;
	} else{
			$msg = '<div class="alert alert-danger" role="alert">Customer Data Not Updated !</div>';
				return $msg;
	}
  }
}

}


?>