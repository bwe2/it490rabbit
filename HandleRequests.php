<?php
require_once('DBFunction.php.inc');
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//session_start();
function doLogin($username,$password){
	$sconnect = new ConnectDB("itclass");
	return $sconnect->validateLogin($username,$password);
	}
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

if (!isset($_POST)){
	$msg = "NO POST MESSAGE SET";
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
		$request['type'] = $postRequest["type"];
		$request['user'] = $postRequest["user"];
		$request['pass'] = $postRequest["pass"];
		$response = $client->send_request($request);
		$returnarray = json_decode($response, true);
		$response = $returnarray['message'];
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
	case "reg":
		$password = $postRequest["password"];
		$email = $postRequest["email"];
		//$hashedPass = password_hash($password, PASSWORD_DEFAULT);//hash the pass
		//$postRequest["password"] = $hashedPass;
		//$response = createClient($postRequest);
	break;
	
}
echo $response;
echo "client received response: three ";
exit(0);
?>
