<?php
include("testRabbitMQClient.php");

//include("log.php");
require_once('DBFunction.php.inc')
//require_once('path.inc');
//require_once('get_host_info.inc');
//require_once('rabbitMQLib.inc');
//$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
function doLogin($username,$password){
	$sconnect = new ConnectDB("it490");
	return $sconnect->validateLogin($username,$password);
	}
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	writelog($msg);//write to log file
	echo json_encode($msg);
	echo "niceone";
	exit(0);
}
$postRequest = $_POST;
$response = "unsupported request type"; //default response

echo "client received response: two ".PHP_EOL;
switch ($postRequest["type"])
{
	case "login":
		$password = $postRequest["password"];
		//$hashedPass = sha1($password);//hash the pass
		//$postRequest["password"] = $hashedPass;
		$response = createClient($postRequest);
	break;
	case "register":
		$password = $postRequest["password"];
		$email = $postRequest["email"];
		$hashedPass = password_hash($password, PASSWORD_DEFAULT);//hash the pass
		$postRequest["password"] = $hashedPass;
		$response = createClient($postRequest);
	break;
	
}
//write to log file
writelog(json_encode($response));
//turn the response into a JSON object
echo json_encode($response);

echo "client received response: three ".PHP_EOL;
exit(0);
?>
