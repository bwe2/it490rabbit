<?php

class connectdb
{
private $connectdb;

public function __construct(){
	$this->connectdb = new mysqli("localhost","root","georgia","it490");
	if ($this->connectdb->connect_errno !=0)
	{
		echo "Error connecting to database: ".$this->connectdb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to the database".PHP_EOL;
}
public function validateLogin($username , $password){
	$un = $this->connectdb->real_escape_string($username);
	$pw = $this->connectdb->real_escape_string($password);
	$statement = "select * from auth where Username = '$un';";
	$response = $this->connectdb->query($statement);
	
	While($row = $response->fetch_assoc()){
		echo "checking password for $username".PHP_EOL;
		if (password_verify($password, $row["password"])){
			echo "passwords match for $username".PHP_EOL;
			return 1;
		}
		echo "passwords do not match for $username".PHP_EOL;
}
	return 0;
	
}
}
?>
