#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBFunction.php.inc');
echo "Server Started".PHP_EOL;
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}
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
/*
function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
}
function requestProcessor($request){

echo "received request".PHP_EOL;
	var_dump($request);
if(!isset($request['data'])){
	return "ERROR: unsupported message type";
}
switch ($request['data']){
	case "login":
		$client = new rabbitMQClient("testRabbitMQDB.ini","testServer");
		$response = $client->send_request($request);
		return doLogin($request['username'],$request['password']);
	break;
	
	case "register":
		$client = new rabbitMQClient("testRabbitMQDB.ini","testServer");
                $response = $client->send_request($request);
	break;
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
return $response;

//}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
//$server->process_requests('requestProcessor');
exit();
*/
?>
