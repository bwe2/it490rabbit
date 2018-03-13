<?php
include("testRabbitMQClient.php");
include("log.php");
require_once('DBFunction.php.inc')
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//if post message is not set
	$request = array();


$request['username'] = $_POST['username'];
$request['password'] = $_POST['password'];
$response = createClient($request);
$password = $_POST['password'];

echo "client received response one: ".PHP_EOL;
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	writelog($msg);//write to log file
	echo json_encode($msg);
	exit(0);
}
$postRequest = $_POST;
$response = "unsupported request type"; //default response

echo "client received response: two ".PHP_EOL;
switch ($postRequest["data"])
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
