<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plantilla HTML con PHP - JQUERY - JAVASCRIPT - MYSQL :: WebDeveloper Urian Viera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link type="text/css" rel="shortcut icon" href="assets/img/logo-mywebsite-urian-viera.svg"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/editar.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <span class="navbar-brand">
           <img src="assets/img/logo-mywebsite-urian-viera.svg" alt="Web Developer Urian Viera" width="120">
             Web Developer Urian Viera
       </span>
     </nav>
    
<div class="container top">
<h3 class="text-center mt-5"> Editar Plantilla HTML con PHP - JQUERY - JAVASCRIPT - MYSQL </h3>
<hr><br>

<?php
require_once ('config.php');
$QueryPlantilla      = ("SELECT * FROM plantilla ORDER BY id");
$resultadoPlantilla  = mysqli_query($con, $QueryPlantilla);
?>



<?php
while ($dataPlantilla = mysqli_fetch_assoc($resultadoPlantilla)) { ?>
    <div class="col-md-6 col-lg-4 edit">
        <div class="drop__card entrar<?php echo $dataPlantilla['id']; ?>">
            <div class="drop__data">
                <img src="assets/img/<?php echo $dataPlantilla['imagen']; ?>" alt="" class="drop__img">
                <div>
                    <h1 class="drop__name"><?php echo $dataPlantilla['nombre']; ?></h1>
                    <span class="drop__profession editable<?php echo $dataPlantilla['id']; ?>" id="profesion<?php echo $dataPlantilla['id']; ?>"><?php echo $dataPlantilla['profesion']; ?></span>
                </div>
            </div>
            <div class="circulo">
                <h2><?php echo $dataPlantilla['id']; ?> </h2>
            </div>            
        </div>

        <div class="barra">
        <a href="#" class="editar edit btn_edit<?php echo $dataPlantilla['id']; ?>" id="<?php echo $dataPlantilla['id']; ?>">
            <i class="zmdi zmdi-edit"> </i>
            EDITAR
        </a>
        <a href="#" class="editar save guardar<?php echo $dataPlantilla['id']; ?>" style="display: none;" id="<?php echo $dataPlantilla['id']; ?>">
            <i class="zmdi zmdi-refresh-sync"> </i>
            GUARDAR
        </a>
    </div>

    </div>
    <?php } ?>

    <div id="resp"></div>

  </div>



<script type="text/javascript" charset="utf-8" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/acciones.js"></script>
</body>
</html>