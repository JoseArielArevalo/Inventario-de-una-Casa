<?php

$consulta = "SELECT precio FROM productos";

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

    $datos = array(); //creamos un array

    $i=0;
    $total=0;
    while($row = mysqli_fetch_array($resultado))
    {
           
        $total = $total+$row['precio']; 
        $datos[$i] = $total;       
    }

    mysqli_close($conexion);

    return $datos; 
}

    $miArray = devolverArraySQL($consulta);
    echo json_encode($miArray);
?>