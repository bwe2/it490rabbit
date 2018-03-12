#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBFunction.php.inc');
echo "Server Started".PHP_EOL;



function requestProcessor($request){

echo "received request".PHP_EOL;
	var_dump($request);
if(!isser($request['data'])){
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
	return array("returnCode => '0', 'message'=>"Server received request and processed");
return $response;

}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>
