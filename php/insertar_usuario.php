<?php

/**
 * @author Rodrigo Fuentes
 * Registro de un usuario.
 */

/**
 * Conexion a la base de datos.
 */
include "connectdb.php";

/**
 * datos de entrada del formulario de registro de Usuario.
 * @var array datos del usuario
 * @access private
 */
$data    = json_decode(file_get_contents("php://input"));
$btnName = $dbhandle->real_escape_string($data->btnName);

if ($btnName == 'registrar') {

    $id       = $dbhandle->real_escape_string($data->id);
    $name     = $dbhandle->real_escape_string($data->name);
    $apellido = $dbhandle->real_escape_string($data->apellido);
    $password = $dbhandle->real_escape_string($data->password);
    $fecha    = $dbhandle->real_escape_string($data->fecha);
    $email    = $dbhandle->real_escape_string($data->email);
    $tipo     = $dbhandle->real_escape_string($data->tipo);

    $query = "INSERT INTO usuario VALUES($id,'" . $name . "','" . $password . "','" . $apellido . "','" . $fecha . "','" . $email . "','".$tipo."')";

    $dbhandle->query($query);
}

?>