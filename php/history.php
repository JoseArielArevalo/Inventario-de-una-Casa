<?php 
	include "conexion.php";
	$consulta = "select nombre from habitacion";
	if (!$resultado = mysql_query($consulta)) {
        die();
    }

    $datos = array();
    $i     = 0;
    while ($row = mysql_fetch_array($resultado)) {
        $datos[$i] = $row;
        $i++;
    }

    mysql_close($conexion);
    echo json_encode($datos);

 ?>