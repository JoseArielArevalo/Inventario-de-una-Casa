<?php

/**
 * @author Rodrigo Fuentes
 * Conexion a la base de datos.
 */

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "inventariocasa");

$dbhandle = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die("Unable to Connect DB");

?>