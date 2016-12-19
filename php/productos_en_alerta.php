<?php

$fecha= date ("j-n-Y");

$consulta = "SELECT nombre,precio,tipo,fecha_vencimiento FROM productos";

function dias_transcurridos($fecha_i,$fecha_f)
{
  $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
  $dias   = abs($dias); 
  $dias = floor($dias);   
  return $dias;
}

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
    $fecha= date ("j-n-Y");

    if(!$resultado = mysqli_query($conexion, $consulta)) die(); 

    $datos = array(); 
    $i=0;

   while($row=$resultado->fetch_assoc()){

       if (dias_transcurridos($row['fecha_vencimiento'] ,$fecha)>=1 && 
        dias_transcurridos($row['fecha_vencimiento'] ,$fecha)<=3) {
           $datos[$i] = $row;
           $i++;        
       }

   }
    mysqli_close($conexion);
    return $datos; 
}

    $miArray = devolverArraySQL($consulta);
    echo json_encode($miArray);
?>