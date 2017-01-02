<?php
include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));

$btnName=$dbhandle->real_escape_string($data->btnName);
if($btnName=='registrar'){

$id=$dbhandle->real_escape_string($data->id);
$name=$dbhandle->real_escape_string($data->name);
$apellido=$dbhandle->real_escape_string($data->apellido);
$password=$dbhandle->real_escape_string($data->password);
$fecha=$dbhandle->real_escape_string($data->fecha);
$email=$dbhandle->real_escape_string($data->email);

$query="INSERT INTO usuario VALUES($id,'".$name."','".$password."','".$apellido."','".$fecha."','".$email."')";

$dbhandle->query($query);
}


?>
