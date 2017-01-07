<?php

/**
 * @author Jose Arevalo
 * Registro de una habitacion.
 */

/**
 * Conexion a la base de datos.
 */
include "connectdb.php";

/**
 * datos de entrada del formulario de registro de habitacion.
 * @var array datos de la habitacion
 * @access private
 */
$data       = json_decode(file_get_contents("php://input"));
$botonEnvio = $dbhandle->real_escape_string($data->botonEnvio);

if ($botonEnvio == 'registrar') {

    $numeroHabitacion = $dbhandle->real_escape_string($data->numeroHabitacion);
    $nombre           = $dbhandle->real_escape_string($data->nombre);
    $categoria        = $dbhandle->real_escape_string($data->categoria);

    $query = "INSERT INTO habitacion VALUES('" . $numeroHabitacion . "','" . $nombre . "','" . $categoria . "')";

    $dbhandle->query($query);
}

?>
