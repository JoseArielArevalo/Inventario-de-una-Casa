<?php

$consulta = "SELECT precio,categoria FROM productos";

function conectarDB(){

        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $bd = "inventariocasa";

    $conexion = mysqli_connect($servidor, $usuario, $password,$bd);

        if($conexion){
           // echo 'La conexion de la base de datos se ha hecho satisfactoriamente';
        }else{
          //  echo 'Ha sucedido un error inexperado en la conexion de la base de datos';
        }

    return $conexion;
}

function devolverArraySQL($consulta){
    
    $conexion = conectarDB();

    if(!$resultado = mysqli_query($conexion, $consulta)) die(); 

    $datos = array(); 
    $totalbano=0;
    $totalrecamara=0;
    $totalsala=0;
    $totalcocina=0;
    while($row = mysqli_fetch_array($resultado))
    {
        if (strcmp($row['categoria'],"sala")==0) { 
        $totalsala = $totalsala+$row['precio']; 
        }
        if (strcmp($row['categoria'],"recamara")==0) { 
        $totalrecamara = $totalrecamara+$row['precio']; 
        }
        if (strcmp($row['categoria'],"cocina")==0) { 
        $totalcocina = $totalcocina+$row['precio']; 
        }
        if (strcmp($row['categoria'],"bano")==0) { 
        $totalbano = $totalbano+$row['precio']; 
        }     
    }
     
    $datos[0] = $totalsala;
    $datos[1] = $totalrecamara;
    $datos[2] = $totalcocina;
    $datos[3] = $totalbano;

    mysqli_close($conexion);

    return $datos; 
}

    $miArray = devolverArraySQL($consulta);
    echo json_encode($miArray);
?>