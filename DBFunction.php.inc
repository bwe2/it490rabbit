<?php

class connectdb
{
private $connectdb;

public function __construct(){
	$this->connectdb = new mysqli("localhost","root","georgia1234","it490");
	if ($this->connectdb->connect_errno !=0)
	{
		echo "Error connecting to database: ".$this->connectdb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to the database".PHP_EOL;
}
	public function validateUser($username,$password)
{
	$un = $this->db->real_escape_string($username);
	$pw = $this->db->real_escape_string($password);
	$query = "select * from users where username = '$un';";
	$result = $this->db->query($query);
	while ($row = $result->fetch_assoc())
	{
		if ($row["password"] == $pw)
		{
			// I have a match
			return true;
		}
	}
	return false;
}
}
?>
