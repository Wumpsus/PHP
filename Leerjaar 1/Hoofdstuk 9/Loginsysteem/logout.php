<?php
session_start();
 
$_SESSION = array();
 
// Vernietig de sessie
session_destroy();
 
// Stuurt gebruiker door naar login pagina
header("location: login.php");
exit;
?>
