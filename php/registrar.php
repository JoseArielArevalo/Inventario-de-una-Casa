	<?php 
	$objDatos = json_decode(file_get_contents("php://input"));


	$nombre=$objDatos->nombre;
	$precio=$objDatos->precio;
	$fecha_compra=$objDatos->fecha_compra;
	$vencimiento=$objDatos->vencimiento;
	$tipo=$objDatos->tipo;
	$categoria=$objDatos->categoria;
	$profundidad=$objDatos->profundidad;
	$estado=$objDatos->estado;
	$ubicacion=$objDatos->ubicacion;
	$habitacion=$objDatos->habitacion;
	include "conexion.php";

	if ($nombre && $precio && $vencimiento && $tipo && $categoria && $profundidad && $ubicacion && $fecha_compra && $estado && $habitacion) {
		
		$insertar=mysql_query("insert into productos values(null,
					'".$nombre."',
					'".$precio."',
					'".$vencimiento."',
					'".$tipo."',
					'".$categoria."',
					'".$profundidad."',
					'".$ubicacion."',
					'".$fecha_compra."',
					'".$estado."',
					'".$habitacion."')",$conexion);
		if ($insertar) {
					echo "registrado";
		}else{
					echo "
					<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=../registrar.html'>

							<script>
								alert('Ha fallado su registro');
							</script>
						</head>
					</html>
					";
		}
	}

 ?>