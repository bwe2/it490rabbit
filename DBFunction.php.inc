<?php

class ConnectDB
{
private $db;

public function __construct($database){
	$this->db = new mysqli("localhost","root","georgia","$database");
	if ($this->db->connect_errno !=0)
	{
		echo "Error connecting to database: ".$this->db->connect_error.PHP_EOL;
		exit();
	}
	echo "correctly connected to the database".PHP_EOL;
}
public function validateLogin($username,$password){
	$un = $this->connectdb->real_escape_string($username);
	$pw = $this->connectdb->real_escape_string($password);
	$query = "select * from auth where username = '$un';";
	$queryResponse = $this->db->query($query);
	$response = array();
	While($row = $queryResponse->fetch_assoc()){
		$response[] = $row;
		echo "checking password for $username".PHP_EOL;
		if (password_verify($password, $row["password"])){
			echo "passwords match for $username".PHP_EOL;
		}
		echo "passwords do not match for $username".PHP_EOL;
}
	return response;
	
}
}
?>
