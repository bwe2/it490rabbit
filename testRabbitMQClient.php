#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function createClient($request){
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "client";
}
$response = $client->send_request($request);
return $response;
echo "client recieved response: ".PHP_EOL;
print_r($response);
echo "\n\n";
echo $argv[0]." END".PHP_EOL;

/*
$request = array();
$request['type'] = "Login";
$request['username'] = "steve";
$request['password'] = "password";
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);
echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";
echo $argv[0]." END".PHP_EOL;
*/
}