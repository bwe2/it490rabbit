<?php
session_start();
session_destroy();
header('location: Loginone.html');
exit();
?>
