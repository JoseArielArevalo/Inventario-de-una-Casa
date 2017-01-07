<?php

/**
 * @author Jose Arevalo
 * @ignore
 */ 
session_start(); 
$_SESSION['usuario']; 
session_destroy();
header("location: ../index.html"); 
exit();    

?>
	