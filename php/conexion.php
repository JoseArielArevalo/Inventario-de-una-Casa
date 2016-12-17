<?php  
	$conexion = mysql_connect("localhost","root","") or die("No hay conexion con la Base de datos");
	$db=mysql_select_db("inventariocasa",$conexion);

?>