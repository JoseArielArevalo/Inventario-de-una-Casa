<?php 
	$nombre=$_POST['nombre'];
	$precio=$_POST['precio'];
	$fecha_vencimiento=$_POST['vencimiento'];
	$tipo=$_POST['tipo'];
	$categoria=$_POST['categoria'];
	$profundidad=$_POST['profundidad'];
	$ubicacion=$_POST['ubicacion'];
	$fecha_compra= "";
	include "conexion.php";

	if ($nombre && $precio && $fecha_vencimiento && $tipo && $categoria && $profundidad && $ubicacion) {
		
		$insertar=mysql_query("insert into productos values(null,
					'".$nombre."',
					'".$precio."',
					'".$fecha_vencimiento."',
					'".$tipo."',
					'".$categoria."',
					'".$profundidad."',
					'".$ubicacion."',
					'".$fecha_compra."')",$conexion);
		if ($insertar) {
					echo "
					<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=/'>
							<script>
								alert('Gracias por registrar');
							</script>
						</head>
					</html>
					";
				}else{
					echo "
					<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=../'>

							<script>
								alert('Ha fallado su registro');
							</script>
						</head>
					</html>
					";
				}
	}

 ?>