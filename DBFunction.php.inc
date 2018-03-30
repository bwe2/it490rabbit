<?php

class ConnectDB
{
private $db;

public function __construct($database){
	$this->db = new mysqli("localhost","root","georgia",$database);
	if ($this->db->connect_errno !=0)
	{
		echo "Error connecting to database: ".$this->db->connect_error.PHP_EOL;
		exit();
	}
	echo "correctly connected to the database".PHP_EOL;
}
public function validateLogin($username,$password){
	$un = $this->db->real_escape_string($username);
	$pw = $this->db->real_escape_string($password);
	$returnarray = array();
	$query = "select * from student where username = '$un'and password = '$pw';";
	$queryResponse = $this->db->query($query);
	//$response = array();
	echo "Validatelogin".PHP_EOL;
	//while($row = $queryResponse->fetch_assoc()){
		//$response[] = $row;
		echo "checking password for $username".PHP_EOL;
		if ($row["password"] == $pw){
			echo "$username your password matches!".PHP_EOL;
			$returnarray['message'] = "nice";
		}
		else {
		echo "The password for $username does not match!".PHP_EOL;
			$returnarray['message'] = "notnice";
			//errorSend("DB Connect", 3, "Cannot connect to db server");
		}
		return json_encode($returnarray);
}
	//return false;
//}
	
}
?>
