<?php

/**
 * @author Jose Arevalo
 */

/**
 * @global string Consulta a la base de datos acerca de precio,categoria de los productos
 */
$consulta = "SELECT precio,categoria FROM productos";

/**
 * Devuelve la capital total de cada categoria y su cantidad total.
 * @param string $consulta
 * @return array
 */
function devolverTotalPorCategorias($consulta)
{

    $conexion = mysqli_connect("localhost", "root", "", "inventariocasa");

    if (!$resultado = mysqli_query($conexion, $consulta)) {
        die('error en la base de datos');
    }

    $datos          = array();
    $totalbano      = 0;
    $totalrecamara  = 0;
    $totalsala      = 0;
    $totalcocina    = 0;
    $tamanoBano     = 0;
    $tamanoRecamara = 0;
    $tamanoSala     = 0;
    $tamanoCocina   = 0;
    while ($row = mysqli_fetch_array($resultado)) {
        if (strcmp($row['categoria'], "sala") == 0) {
            $totalsala = $totalsala + $row['precio'];
            $tamanoSala++;
        }
        if (strcmp($row['categoria'], "recamara") == 0) {
            $totalrecamara = $totalrecamara + $row['precio'];
            $tamanoRecamara++;
        }
        if (strcmp($row['categoria'], "cocina") == 0) {
            $totalcocina = $totalcocina + $row['precio'];
            $tamanoCocina++;
        }
        if (strcmp($row['categoria'], "bano") == 0) {
            $totalbano = $totalbano + $row['precio'];
            $tamanoBano++;
        }
    }

    $datos[0] = $totalsala;
    $datos[1] = $totalrecamara;
    $datos[2] = $totalcocina;
    $datos[3] = $totalbano;

    $datos[4] = $tamanoSala;
    $datos[5] = $tamanoRecamara;
    $datos[6] = $tamanoCocina;
    $datos[7] = $tamanoBano;

    mysqli_close($conexion);

    return $datos;
}
/**
 * Convierte el array de datos en un archivo de lectura JSON.
 */
$miArray = devolverTotalPorCategorias($consulta);
echo json_encode($miArray);

?>