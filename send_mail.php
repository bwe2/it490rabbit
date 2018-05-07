<?php
ini_set( 'smtp_port', 25 );
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: University <study@University.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
if (isset($_POST['email'])) {
	mail($_POST['email'], "Notify for recall", "you made a API call", $headers);
	header("Location: index.php");
	exit;
}
?>