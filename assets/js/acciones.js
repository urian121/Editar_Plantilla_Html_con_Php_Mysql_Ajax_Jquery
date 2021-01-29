//EDITANDO LA PLANTILLA
$(document).ready(function() {

    $( ".editar" ).click(function() {
        var id             = $(this).attr("id");
        var nombre         = $('#nombre' + id).text();
        var datoProfesion  = $('#profesion' + id).text(); 
        var value          = $('.editable' + id).attr('contenteditable');

    
     if (value != 'true') {
            //console.log('true');
            $('.editable' + id).attr('contenteditable','true');
            $('.editar').hide();
            $('.guardar' + id).show();
            
            $("#nombre" + id).addClass("nombreActivo"); //Agrego clase para el nombre
            $(".entrar" + id).addClass("borderActivo"); //Agrego una clase
            $(".perfil" + id).addClass("perfilActivo"); //Agrego una clase para la imagen
            $("#imagen" + id).css("display", "block"); //Mostrando para cargar la nueva imagen
            $(".barra").addClass("btn_seleccionado"); //AGREGO CLASE PARA MOSTRAR LA SECCION ACTIVADA 
            $("#nombre" + id).focus();
        }
        else {
            //console.log('false');
            $('.editable' + id).attr('contenteditable','false');
            $('.btn_edit' + id).show();
            $('.guardar' + id).hide();
             
            $('.edit').show();
            $("#nombre" + id).removeClass("nombreActivo");
            $(".entrar" + id).removeClass("borderActivo"); //quito la clase
            $(".perfil" + id).removeClass("perfilActivo"); //quito la clase
            $("#imagen" + id).css("display", "none"); //Mostrando para cargar la nueva imagen
            $("#imagen").hide(); //Ocultando para cargar el boton de imagen
            $(".barra").removeClass("btn_seleccionado"); //quito la clase del elemento seleccionado
            
            var dataStringPlantilla = 'id='+ id + '&profesion=' + datoProfesion + '&nombre=' + nombre;
            //console.log(dataStringProfesion);
            url = "dataInputs.php";
             $.ajax({
                   type: "POST",
                   url: url,
                   data: dataStringPlantilla,
                   success: function(data)
                   {
                     $('#resp').html(data);
                    // console.log(data);
                   }
               }); 
        }
    });

});
