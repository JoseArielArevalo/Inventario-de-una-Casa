<?php 
	$objDatos = json_decode(file_get_contents("php://input"));

    session_start();
	$id = $objDatos->id;
	$nombre=$objDatos->nombre;
	$fecha=date ("Y/n/j"); 
	$usuario=$_SESSION['usuario'];
	include "conexion.php";

	if ($id && $nombre) {
		$insertar=mysql_query("insert into eliminados values(null,
					'".$id."',
					'".$nombre."',
					'".$usuario."',
					'".$fecha."')",$conexion);
		$actualizar=mysql_query("delete from productos where id=".$id);

		/*$actualizar=mysql_query("update productos set
					nombre='".$nombre."',
					precio='".$precio."',
					fecha_vencimiento='".$vencimiento."',
					tipo='".$tipo."',
					categoria='".$categoria."'',
					profundidad='".$profundidad."',
					ubicacion='".$ubicacion."',
					fecha_compra='".$fecha_compra."',
					estado='".$estado."' where id=".$id);*/
		if ($actualizar && $insertar) {
					echo "eliminado";
		}else{
					echo "ocurrio un error inesperado";
		}
	}

 ?>