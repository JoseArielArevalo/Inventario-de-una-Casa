<?php 

/**
 * @author Ariel R.G.
 */ 

	$objDatos = json_decode(file_get_contents("php://input"));

    session_start();
	$id = $objDatos->id;
	$nombre=$objDatos->nombre;
	$fecha=date ("Y/n/j");
	$precio=$objDatos->precio; 
	$usuario=$_SESSION['usuario'];
	include "conexion.php";

	if ($id && $nombre) {
		$insertar=mysql_query("insert into eliminados values(null,
					'".$id."',
					'".$nombre."',
					'".$usuario."',
					'".$fecha."',
					'".$precio."')",$conexion);
		$actualizar=mysql_query("delete from productos where id=".$id);

		if ($actualizar && $insertar) {
					echo "eliminado";
		}else{
					echo "ocurrio un error inesperado";
		}
	}

 ?>