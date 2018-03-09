#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');



function requestProcessor($request){

echo "received request".PHP_EOL;
switch ($request['data']){
	case "login":
		$client = new testRabbitMQClient("testRabbitMQDB.ini","testServer");
		$response = $client->send_request($request);
	break;
	
	case "register":
		$client = new testRabbitMQClient("testRabbitMQDB.ini","testServer");
                $response = $client->send_request($request);
	break;
	}
return $response;

}
$server = new testRabbitMQServer("testRabbitMQ.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>

/*
function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
}
function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}
$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
//$server->process_requests('requestProcessor');
//exit();
*/


