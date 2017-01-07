<?php

/**
 * @author Jose Arevalo
 */ 

/**
 * @global string Consulta para obtener los productos vencidos.
 */ 
$consulta = "SELECT nombre,precio,tipo,fecha_vencimiento FROM  productos";

/**
 * Devuelve true si la fecha de vencimiento del producto es menor a la fecha actual.
 * @param date $fecha_inicial 
 * @param date $fecha_final 
 * @return boolean
 */
function diasTranscurridos($fecha_inicial, $fecha_final)
{

    $dias = strtotime($fecha_inicial) < strtotime($fecha_final);

    return $dias;
}

/**
 * Devuelve un array de los productos que vencieron.
 * @param string $consulta 
 * @return array
 */
function devolverProductosVencidos($consulta)
{

    $conexion = mysqli_connect("localhost", "root", "", "inventariocasa");

    $fecha = date("j-n-Y");

                          if (!$resultado = mysqli_query($conexion, $consulta)) {
        die();
    }

    $datos = array();
    $i     = 0;

    while ($row = $resultado->fetch_assoc()) {

        if (diasTranscurridos($row['fecha_vencimiento'], $fecha)) {
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
$miArray = devolverProductosVencidos($consulta);
echo json_encode($miArray);

?>