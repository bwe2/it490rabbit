<?php
$epoch = time();
echo gmdate('r', $epoch);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) .'/log.txt');
error_reporting(E_ALL);
?>
