<?php
include('config.php');
$IdRegistro     = $_REQUEST['IdRegistro'];
$mifoto         = $_FILES['file']['name'];
$fotoTmp        = $_FILES['file']['tmp_name'];


$folder ="assets/img/".$mifoto;
if(move_uploaded_file($fotoTmp, $folder)){
    $UpdateImg = ("UPDATE plantilla SET imagen='" .$mifoto. "' WHERE id='".$IdRegistro."' ");
    $resultado = mysqli_query($con, $UpdateImg);
}
?>