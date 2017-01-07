<?php
include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));

$botonEnvio=$dbhandle->real_escape_string($data->botonEnvio);
if($botonEnvio=='registrar'){

$numeroHabitacion=$dbhandle->real_escape_string($data->numeroHabitacion);
$nombre=$dbhandle->real_escape_string($data->nombre);
$categoria=$dbhandle->real_escape_string($data->categoria);

$query="INSERT INTO habitacion VALUES('".$numeroHabitacion."','".$nombre."','".$categoria."')";

$dbhandle->query($query);
}


?>