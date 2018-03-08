<?php
include("testRabbitMQClient.php");
include("log.php");
//if post message is not set
if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	log($msg);//write to log file
	echo json_encode($msg);
	exit(0);
}
$postRequest = $_POST;
$response = "unsupported request type"; //default response
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
log(json_encode($response));
//turn the response into a JSON object
echo json_encode($response);
exit(0);
?>
