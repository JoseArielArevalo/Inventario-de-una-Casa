	<?php 
	$objDatos = json_decode(file_get_contents("php://input"));

	$id = $objDatos->id;
	$nombre=$objDatos->nombre;
	$precio=$objDatos->precio;
	$fecha_compra=$objDatos->fecha_compra;
	$vencimiento=$objDatos->vencimiento;
	$tipo=$objDatos->tipo;
	$categoria=$objDatos->categoria;
	$profundidad=$objDatos->profundidad;
	$estado=$objDatos->estado;
	$ubicacion=$objDatos->ubicacion;
	include "conexion.php";

	if ($id && $nombre && $precio && $vencimiento && $tipo && $categoria && $profundidad && $ubicacion && $fecha_compra && $estado) {
		$actualizar=mysql_query("update productos set
					nombre='".$nombre."',
					precio='".$precio."',
					fecha_vencimiento='".$vencimiento."',
					tipo='".$tipo."',
					categoria='".$categoria."',
					profundidad='".$profundidad."',
					ubicacion='".$ubicacion."',
					fecha_compra='".$fecha_compra."',
					estado='".$estado."' where id=".$id);
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
		if ($actualizar) {
					echo "modificado";
		}else{
					echo "ocurrio un error inesperado";
		}
	}

 ?>