include("testRabbitMQClient.php");




require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQDB.ini","testServer");


$request = array();

$request['request'] = "reg";
$request['username'] = $_POST['username'];
$request['password'] = $_POST['password'];
$request['email'] = $_POST['email']; 
$request['tel'] = $_POST['tel']; 
$request['make'] = $_POST['make']; 
$request['model'] = $_POST['model']; 
$request['year'] = $_POST['year'];




$response = $client->send_request($request);
echo "client received response: ".PHP_EOL;
print_r($response);
