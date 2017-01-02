<?php

//session_start(); 
//session_destroy();
//header("location: ../index.html"); 
//exit();
// seteando las cabeceras
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
// en codeigniter seria:
     $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
    
header("location: ../index.html"); 

?>
