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
}
?>
