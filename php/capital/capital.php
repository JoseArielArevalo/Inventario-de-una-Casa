<?php

/**
 * @author Jose Arevalo
 */

/**
 * @global string Consulta a la base de datos acerca del precio del producto 
 */
$consulta = "SELECT precio FROM productos";

/**
 * Devuelve un array del capital total
 * @param string $consulta
 * @return array
 */
function devolverCapitalTotal($consulta)
{

    $conexion = mysqli_connect("localhost", "root", "", "inventariocasa");
    if (!$resultado = mysqli_query($conexion, $consulta)) {
        die('conexion fallida');
    }

    $datos = array(); 
    $i     = 0;
    $total = 0;
    while ($row = mysqli_fetch_array($resultado)) {

        $total     = $total + $row['precio'];
        $datos[$i] = $total;
    }

    mysqli_close($conexion);

    return $datos;
}

/**
 * Convierte el array de datos a un archivo de lectura de tipo JSON.
 */
$miArray = devolverCapitalTotal($consulta);
echo json_encode($miArray);

?>