#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBFunction.php.inc');
require_once('logSend.inc');
echo "Server Started".PHP_EOL;

function doLogin($user,$pass){
    $sconnect = new ConnectDB("itclass");
return $sconnect->validateLogin($user,$pass);
    return true;
    //return false if not valid
}

function requestProcessor($request){
  print_r("received request");
	var_dump($request);
  if(!isset($request['type'])){
    return "ERROR: unsupported message type";
  }
  switch ($request['type']){
    case "login":
      return doLogin($request['user'],$request['pass']);
	break;
    case "validate_session":
      return doValidate($request['sessionId']);
	break;
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
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
