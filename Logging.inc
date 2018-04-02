<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
function WriteError($task, $level, $message){
  $client = new rabbitMQClient("testRabbitMQLog.ini", "testServer");
  $bt = debug_backtrace();
  $caller = array_shift($bt);
  $request = array();
  $request['type'] = "error";
  $request['server'] = gethostname();
  $request['task'] = $task;
  $request['file'] = $caller['file'];
  $request['line'] = $caller['line'];
  $request['level'] = $level;
  $request['message'] = $message;
  $response = $client->send_request($request);
}
function WriteLog($request)
{
  switch ($request['level']) {
    case 1:
      $log_file = '/var/www/log.txt';
      break;
    case 2:
      $log_file = 'log.txt';
      break;
    case 3:
      $log_file = 'logDB.txt';
      break;
  }
  if (!is_file($log_file)) {
    $contents = 'Time - Server - Task - File - Line - Message' . PHP_EOL;
    file_put_contents($log_file, $contents);
  }
  $handle = fopen($log_file, 'a') or die('Cannot open file:  ' . $log_file);
  $msgout = date("m/d/Y h:i:s A") . " - " . $request['server'] . " - " . $request['task'] . " - " . $request['file'] . " - " . $request['line'] . " - " . $request['message'] . PHP_EOL;
  fwrite($handle, $msgout);
}
?>
