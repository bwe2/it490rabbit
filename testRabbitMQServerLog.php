#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('Logging.inc');
echo "Log Server Started".PHP_EOL;

function requestProcessor($request)
{
  switch ($request['type']) {
    case "error":
      echo "Log Error". PHP_EOL;
      WriteLog($request);
      break;
  }
}
//function end
$server = new rabbitMQServer("testRabbitMQLog.ini", "testServer");
$server->process_requests('requestProcessor');
echo "Log Server".PHP_EOL;
exit();
?>
