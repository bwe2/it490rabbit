<?php
function writelog($request){
  $epoch = time();
  $date = gmdate("Y-m-d H:i:s", $epoch);
  $file = "log.txt";
  $fh = fopen($file, 'a') or die ("Cannot open");
  fwrite($fh, "\n" . $date . "\t" . $log);
  fclose($fh);
}
function writelogDB($request){
  $epoch = time();
  $date = gmdate("Y-m-d H:i:s", $epoch);
  $file = "logDB.txt";
  $fh = fopen($file, 'a') or die ("Cannot open");
  fwrite($fh, "\n" . $date . "\t" . $request);
  fclose($fh);
}


?>
