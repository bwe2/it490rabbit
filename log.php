<?php
function writelog($log){
  $epoch = time();
  $date = gmdate('r', $epoch);
  $file = "log.txt"
  $fileopen = fopen($file, 'a') or die ("Cannot open");
  fwrite($fileopen, "\n" . $date . "\t" . $log);
  fclose($fileopen);
}
function writelogDB($log){
  $epoch = time();
  $date = gmdate('r', $epoch);
  $file = "logDB.txt"
  $fileopen = fopen($file, 'a') or die ("Cannot open");
  fwrite($fileopen, "\n" . $date . "\t" . $log);
  fclose($fileopen);
}


?>
