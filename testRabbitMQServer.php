#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBFunction.php.inc');
require_once('Logging.inc');
echo "Server Started".PHP_EOL;

function doLogin($username,$password){
    $sconnect = new ConnectDB("it490");
return $sconnect->validateLogin($username,$password);
    return true;
}

function requestProcessor($request){
  print_r("received request");
	var_dump($request);
  if(!isset($request['type'])){
    return "ERROR: unsupported message type";
  }
  switch ($request['type']){
    case "login":
      return doLogin($request['username'],$request['password']);
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
if(!
	return "ERROR: unsupported message type";
}
switch
	case "login":
		$response = $client->send_request($request);
		return doLogin($request['username'],$request['password']);
	break;
	
	case "register":
		
                $response = $client->send_request($request);
	break;
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
return $response;

//}

//$server->process_requests('requestProcessor');
exit();
*/
?>
