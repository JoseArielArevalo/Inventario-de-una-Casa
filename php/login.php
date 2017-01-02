<?php
$nombre= $_REQUEST['usuario'];
$pass = $_REQUEST['password'];

$conexion=mysql_connect("localhost","root")or die("problemas de conexion");
mysql_select_db("inventariocasa",$conexion)or die("error al conectar la base de datos");

$query="select nombre,password from usuario where nombre='".$nombre."' and password='".$pass."'";
$resultado=mysql_query($query,$conexion);
$total=mysql_num_rows($resultado);
if($total>0){
header("Location: ../vistas/portada.html");
}else{	
 echo "<SCRIPT type='text/javascript'> 
        alert('usuario o password incorrecto');
        window.location.replace('../index.html');
       </SCRIPT>";
}

?>
