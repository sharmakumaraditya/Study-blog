<?php
include('db.php');
session_start();

class Account{
	private $db;
	public function __construct($db){
		$this->db = $db;
	}

	public function login($username,$password){
		$sql = "SELECT username,password FROM users WHERE username='$username'AND password='$password'";
		$result = mysqli_query($this->db,$sql);
		if(mysqli_num_rows($result)>0){
			$_SESSION['username'] = $_POST['username'];
			header("location:result.php");
		}
	}
}
