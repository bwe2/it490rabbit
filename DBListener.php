#!/usr/bin/php
<?php

echo "Server Started".PHP_EOL;
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBFunction.php.inc');

function doLogin($username, $password){

if($output){
	echo "Login Successful".PHP_EOL;
	return true;
	}
	else{
	echo "Login Failed".PHP_EOL;
	return false;
}
}

$server = new rabbitMQServer("testRabbitMQDB.ini","testServer");
//$server->process_requests('requestProcessor');
exit();
?>
