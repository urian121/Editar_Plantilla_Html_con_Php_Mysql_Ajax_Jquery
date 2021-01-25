<?php
include('config.php');
$IdProfesion    = $_REQUEST['id'];
$profesion      = $_REQUEST['profesion'];

$UpdateProfesion = ("UPDATE plantilla SET profesion='" .$profesion. "' WHERE id='".$IdProfesion."' ");
$resultado = mysqli_query($con, $UpdateProfesion);

print_r($UpdateProfesion);
?>