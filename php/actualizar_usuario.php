<?php
include "connectdb.php";
$data=json_decode(file_get_contents("php://input"));
$ci=$dbhandle->real_escape_string($data->ci);

$btnName=$dbhandle->real_escape_string($data->btnName);
if($btnName=='registrar'){
$id=$dbhandle->real_escape_string($data->id);
$name=$dbhandle->real_escape_string($data->name);
$apellido=$dbhandle->real_escape_string($data->apellido);
$password=$dbhandle->real_escape_string($data->password);
$fecha=$dbhandle->real_escape_string($data->fecha);
$email=$dbhandle->real_escape_string($data->email);


	$query="UPDATE usuario SET id='".$id."' , nombre='".$name."' , password='".$password."', apellido='".$apellido."', fecha='".$fecha."' ,  email='".$email."' WHERE id='".$ci."' ";
	$dbhandle->query($query)or die("no se pudo añadir");

	}


?>