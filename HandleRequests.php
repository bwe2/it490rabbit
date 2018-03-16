<?php
//include('log.php');
//require_once('DBFunction.php.inc');
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//session_start();
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

if (!isset($_POST)){
	$msg = "NO POST MESSAGE SET";
	writelog($msg);//write to log file
	echo json_encode($msg);
	echo "niceone";
	exit(0);
}
else {
echo "HandleRequests".PHP_EOL;
}
$postRequest = $_POST;
$response = "unsupported request type"; //default response

echo "client received response: two ".PHP_EOL;
switch ($postRequest["type"]){
	case "login":
		$request = array();
		$request['type'] = "login";
		$request['username'] = $postRequest['username'];
		$request['password'] = $postRequest['password'];
		$response = $client->send_request($request);
		$returnarray =json_decode($response, true);
		$response =$returnarray['message'];
		/*
		$login = doLogin($_POST["username"],$_POST["password"]);
		if($login){
			$response = "successful";
		}
		else{
			$response = "failed";
		}
		$password = $postRequest["password"];
		$hashedPass = sha1($password);//hash the pass
		$postRequest["password"] = $hashedPass;
		$response = createClient($postRequest);
		*/
	break;
	case "register":
		$password = $postRequest["password"];
		$email = $postRequest["email"];
		//$hashedPass = password_hash($password, PASSWORD_DEFAULT);//hash the pass
		//$postRequest["password"] = $hashedPass;
		//$response = createClient($postRequest);
	break;
	
}
echo $response;
//write to log file
logIt(json_encode($response));
//turn the response into a JSON object
echo json_encode($response);

echo "client received response: three ";
exit(0);
/*
function doLogin($username,$password){
	$sconnect = new ConnectDB("itclass");
	return $sconnect->validateLogin($username,$password);
	}
*/
?>
