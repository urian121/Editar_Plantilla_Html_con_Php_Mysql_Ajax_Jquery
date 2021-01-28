<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plantilla HTML con PHP - MYSQL- AJAX - JAVASCRIPT y JQUERY :: WebDeveloper Urian Viera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link type="text/css" rel="shortcut icon" href="assets/img/logo-mywebsite-urian-viera.svg"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/editar.css">
    <link rel="stylesheet" href="assets/css/picnic.min.css">
    <style>
    .profile {
    border-radius: 50%;     /* Make it a circle */
    padding-bottom: 100%;   /* 100% height (ratio 1) */
  }
  .miniprofile {
    border-radius: 50%;    /* Make it a circle */
    margin: 0 auto;        /* Center horizontally */
    width: 60%;            /* 60% width */
    padding-bottom: 60%;   /* 60% height */
  }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <span class="navbar-brand">
           <img src="assets/img/logo-mywebsite-urian-viera.svg" alt="Web Developer Urian Viera" width="120">
             Web Developer Urian Viera
       </span>
     </nav>
    
<div class="container top">
<h3 class="text-center mt-5"> Editar Plantilla HTML con PHP - MYSQL- AJAX - JAVASCRIPT y JQUERY </h3>
<hr><br>

<?php
require_once ('config.php');
$QueryPlantilla      = ("SELECT * FROM plantilla ORDER BY id");
$resultadoPlantilla  = mysqli_query($con, $QueryPlantilla);


while ($dataPlantilla = mysqli_fetch_assoc($resultadoPlantilla)) { ?>
    <div class="col-md-6 col-lg-4 edit">
    <form id="Miform" method="post" enctype="multipart/form-data">
        <div class="drop__card entrar<?php echo $dataPlantilla['id']; ?>">
            <div class="drop__data">
                <img src="assets/img/<?php echo $dataPlantilla['imagen']; ?>" alt="Perfil" class="drop__img perfil<?php echo $dataPlantilla['id']; ?>">
                <input type="hidden" name="IdRegistro" name="IdRegistro" value="<?php echo $dataPlantilla['id']; ?>">

                <div class="conteNewImg"  id="imagen<?php echo $dataPlantilla['id']; ?>"> 
                    <label class="dropimage miniprofile">
                        <input name="file" id="file" title="Imagen de Perfil" type="file">
                    </label>
                </div>

                <div>
                    <h1 class="drop__name editable<?php echo $dataPlantilla['id']; ?>" id="nombre<?php echo $dataPlantilla['id']; ?>"><?php echo $dataPlantilla['nombre']; ?></h1>
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

    </form>

    </div>
    <?php } ?>

    <div id="resp"></div>

  </div>



<script type="text/javascript" charset="utf-8" src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/acciones.js"></script>

<!--Script para la libreria picnicss -->
<script>
$('.miniprofile').on('change', '#file', function(e){
//$('.miniprofile').on('change', function() {
//$("input").change(function(){
//$("body").on('change', '#Input_Id', function(){
    e.preventDefault();
    var formData = new FormData($(this).parents('form')[0]);

    $.ajax({
        url: 'dataImgs.php',
        type: 'POST',
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },

       data: $("#Miform").serialize(), // Adjuntar los campos del formulario enviado.
        success: function(data){
        //$("#resp").html(data); // Mostrar la respuestas del script PHP.
        $("#Miform")[0].reset();  //limpio mi formulario
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});


document.addEventListener("DOMContentLoaded", function() {
[].forEach.call(document.querySelectorAll('.dropimage'), function(img){
    img.onchange = function(e){
    var inputfile = this, reader = new FileReader();
    reader.onloadend = function(){
        inputfile.style['background-image'] = 'url('+reader.result+')';
    }
    reader.readAsDataURL(e.target.files[0]);
    }
});
});



</script>
</body>
</html>