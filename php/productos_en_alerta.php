<?php

/**
 * @author Jose Arevalo
 */

/**
 * @global string consulta para obtener los productos que venceran en menos de 5 dias
 */
$consulta = "SELECT nombre,precio,tipo,fecha_vencimiento FROM productos";

/**
 * Devuelve los dias transcurridos entre una fecha inicial y una fecha final.
 * @param date $fecha_inicial
 * @param date $fecha_final
 * @return integer
 */
function diasTranscurridos($fecha_inicial, $fecha_final)
{

    if ($fecha_inicial >= $fecha_final) {
        $dias = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        return $dias;
    } else {
        return -1;
    }
}

/**
 * Devulve los productos que venceran en un lapso de 5 dias.
 * @param string $consulta
 * @return array
 */
function devolverProductosEnAlerta($consulta)
{

    $conexion = mysqli_connect("localhost", "root", "", "inventariocasa");
    $fecha    = date("Y-m-d");
    if (!$resultado = mysqli_query($conexion, $consulta)) {
        die('error en la conexion');
    }

    $datos = array();
    $i     = 0;

    while ($row = $resultado->fetch_assoc()) {
        $dias = diasTranscurridos($row['fecha_vencimiento'], $fecha);
        if ($dias >= 0 && $dias <= 5) {
            $datos[$i] = $row;
            $i++;
        }
    }
    mysqli_close($conexion);
    return $datos;
}

/**
 * Convierte el array de datos en un archivo de lectura JSON.
 */
$miArray = devolverProductosEnAlerta($consulta);
echo json_encode($miArray);

?>
