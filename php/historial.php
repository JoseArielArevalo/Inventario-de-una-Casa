<?php

/**
 * @author Jose Arevalo
 */

/**
 * @global string consulta acerca de los datos de los productos que fueron eliminados.
 */ 
$consulta = "SELECT id,id_producto,nombre_producto,nombre_usuario,fecha FROM eliminados";

/**
 * Devuelve un array con la informacion de los productos que fueron eliminados.
 * @param string $consulta
 * @return array
 */
function devolverProductosEliminados($consulta)
{

    $conexion = mysqli_connect("localhost", "root", "", "inventariocasa");

    if (!$resultado = mysqli_query($conexion, $consulta)) {
        die('error en la conexion');
    }

    $datos = array();
    $i     = 0;
    while ($row = mysqli_fetch_array($resultado)) {
        $datos[$i] = $row;
        $i++;
    }

    mysqli_close($conexion);
    return $datos;
}

/**
 * Convierte el array de datos en un archivo de lectura JSON.
 */ 
$miArray = devolverProductosEliminados($consulta);
echo json_encode($miArray);

?>
