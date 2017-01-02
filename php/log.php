<?php
include "connectdb.php";

$nombre= $_REQUEST['name'];
$pass = $_REQUEST['password'];

$query="select id from usuario where nombre='".$nombre."' and password='".$pass."'";

$resultado=mysqli_query($dbhandle,$query);
$total=mysqli_num_rows($resultado);

if($total>0){
header("Location: ../vistas/actualizar_usuario.html");
}else{
header("Location: ../vistas/entradaact.html");
}

?>