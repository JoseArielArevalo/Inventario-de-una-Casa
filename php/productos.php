<?php

/**
 * @author Jose Arevalo
 */

/**
 * @global string consulta para obtener toda la informacion del los productos
 */
$consulta = "SELECT id,nombre,precio,categoria,estado,profundidad,fecha_compra FROM productos";

/**
 * Devuelve toda la informacion de cada producto.
 * @param string $consulta
 * @return array
 */
function devolverDatosDelProducto($consulta)
{

    $conexion = mysqli_connect("localhost", "root", "", "inventariocasa");

    if (!$resultado = mysqli_query($conexion, $consulta)) {
        die();
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
 * Convierte un array de datos en un archivo de lectura de tipo JSON.
 */ 
$miArray = devolverDatosDelProducto($consulta);
echo json_encode($miArray);

?>
