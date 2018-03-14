#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBFunction.php.inc');
echo "Server Started".PHP_EOL;
function doLogin($username,$password)
{
    $sconnect = new ConnectDB("itclass");
return $sconnect->validateLogin($username,$password);
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
$server->process_requests('requestProcessor');
exit();

/*
include("log.php");
echo "Server Started".PHP_EOL;
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBFunction.php.inc');


function doLogin($username, $password){
	$login = new connectdb();
	$output = $login->validateLogin($username, $password);
	if($output){
		echo "Login Successful".PHP_EOL;
		return true;
	}
	else{
		echo "Login Failed".PHP_EOL;
		return false;
	}
}
function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['data']))
  {
    return array('message'=>"ERROR: unsupported message type");
  }
  switch ($request['data'])
  {
    case "login":
      $status = doLogin($request['username'],$request['password']);
      break;
    case "register":
      $status = doRegister($request['username'],$request['password'],$request['email']);
      break;
  }
	 writelogDB($status);
  return array('status' => $status,'message'=>'Database server received request and processed');
}

$server = new rabbitMQServer("testRabbitMQDB.ini","testServer");
$server->process_requests('requestProcessor');
exit();
*/
?>
