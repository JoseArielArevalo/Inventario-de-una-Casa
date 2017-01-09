<?php


/**
 * @author Ariel R.G.
 */ 

$id=$_GET['id'];
$consulta = "SELECT * FROM productos WHERE id=".$id;


//$consulta2 = "SELECT tipo from tipo_articulo";
    
function devolverArraySQL($consulta){
    
    //$conexion = conectarDB();
    include "conexion.php";
    //$resultado = mysql_query($consulta,$conexion);
    if(!$resultado = mysql_query($consulta, $conexion)) die(); 
    
    $datos = array(); //creamos un array

    //guardamos en un array todos los datos de la consulta
    $i=0;

    while($row = mysql_fetch_array($resultado))
    {
        $datos[$i] = $row;
        $i++;
    }

    //mysqli_close($conexion);

    return $datos; 
}

    $miArray = devolverArraySQL($consulta);

    echo json_encode($miArray);
?>