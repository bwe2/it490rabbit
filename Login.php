#!/usr/bin/php
<?php

$username = $_POST['username'];
$password = $_POST['password']; 

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");


$request = array();


$request['username'] = $_POST['username'];
$request['password'] = $_POST['password']; 

$response = $client->send_request($request);
echo "client received response: ".PHP_EOL;
$response = $client->publish($request);

//var_dump($request);



//echo $username;
//echo $password;

?>
