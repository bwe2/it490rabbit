<?php
function writelog($request){
   $client = new rabbitMQClient("testRabbitMQLog.ini", "testServer");
  $request = array();
  $request['type'] = "error";
  $request['server'] = gethostname();
  $request['message'] = $message;
  $epoch = time();
  $date = gmdate("Y-m-d H:i:s", $epoch);
  $file = "log.txt";
  $fh = fopen($file, 'a') or die ("Cannot open");
  fwrite($fh, "\n" . $date . "\t" . $log . $request['type'] . $request['server'] . $request['message']);
  fclose($fh);
  $response = $client->send_request($request);
}
function writelogDB($request){
  $client = new rabbitMQClient("testRabbitMQLog.ini", "testServer");
  $request = array();
  $request['type'] = "error";
  $request['server']  = gethostname();
  $request['message'] = $message;
  $epoch = time();
  $date = gmdate("Y-m-d H:i:s", $epoch);
  $file = "logDB.txt";
  $fh = fopen($file, 'a') or die ("Cannot open");
  fwrite($fh, "\n" . $date . "\t" . $log . $request['type'] . $request['server'] . $request['message']);
  fclose($fh);
  $response = $client->send_request($request);
}


?>
