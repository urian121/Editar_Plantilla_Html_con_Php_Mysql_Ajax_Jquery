<?php
include('config.php');
$IdRegistro     = $_REQUEST['id'];
$nombre         = $_REQUEST['nombre'];
$profesion      = $_REQUEST['profesion']; 

$UpdateProfesion = ("UPDATE plantilla SET nombre='" .$nombre. "', profesion='" .$profesion. "' WHERE id='".$IdRegistro."' ");
$resultado = mysqli_query($con, $UpdateProfesion);

?>