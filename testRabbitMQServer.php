#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');



function requestProcessor($request){

echo "received request".PHP_EOL;
switch ($request['data']){
	case "login":
		$client = new rabbitMQClient("testRabbitMQDB.ini","testServer");
		$response = $client->send_request($request);
	break;
	
	case "register":
		$client = new rabbitMQClient("testRabbitMQDB.ini","testServer");
                $response = $client->send_request($request);
	break;
	}
return $response;

}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>
