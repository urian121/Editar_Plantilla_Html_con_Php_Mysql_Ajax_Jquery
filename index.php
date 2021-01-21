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
$Querydrag_drop      = ("SELECT * FROM drag_drop ORDER BY posicion");
$resultadodrag_drop  = mysqli_query($con, $Querydrag_drop);
?>



<?php
while ($dataDrag_Drop = mysqli_fetch_assoc($resultadodrag_drop)) { ?>
    <div class="col-md-6 col-lg-4 edit">
        <div class="drop__card entrar<?php echo $dataDrag_Drop['id']; ?>">
            <div class="drop__data">
                <img src="assets/img/<?php echo $dataDrag_Drop['imagen']; ?>" alt="" class="drop__img">
                <div>
                    <h1 class="drop__name"><?php echo $dataDrag_Drop['nombre']; ?></h1>
                    <span class="drop__profession editable<?php echo $dataDrag_Drop['id']; ?>" id="profesion"><?php echo $dataDrag_Drop['profesion']; ?></span>
                </div>
            </div>
            <div class="circulo">
                <h2><?php echo $dataDrag_Drop['id']; ?> </h2>
            </div>            
        </div>

        <div class="barra">
        <a href="#" class="editar edit btn_edit<?php echo $dataDrag_Drop['id']; ?>" id="<?php echo $dataDrag_Drop['id']; ?>">
            <i class="zmdi zmdi-edit"> </i>
            EDITAR
        </a>
        <a href="#" class="editar save guardar<?php echo $dataDrag_Drop['id']; ?>" style="display: none;" id="<?php echo $dataDrag_Drop['id']; ?>">
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