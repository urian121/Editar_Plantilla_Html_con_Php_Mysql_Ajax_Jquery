//EDITANDO LA PROFESION
$(document).ready(function() {
    $( ".editar" ).click(function() {
        var id             = $(this).attr("id");
        var datoProfesion  = $('#profesion' + id).text(); 
        var value          = $('.editable' + id).attr('contenteditable');
    
        console.log(id + datoProfesion);
    
     if (value != 'true') {
            //console.log('true');
            $('.editable' + id).attr('contenteditable','true');
            $('.editar').hide();
            $('.guardar' + id).show();
            
            //$(".drop__data").css("color", "green");
            $(".entrar" + id).addClass("activa"); //Agrego una clase
            $(".barra").addClass("btn_seleccionado"); //AGREGO CLASE PARA MOSTRAR LA SECCION ACTIVADA 
            $(".editable" + id).focus();
        }
        else {
            //console.log('false');
            $('.editable' + id).attr('contenteditable','false');
            $('.btn_edit' + id).show();
            $('.guardar' + id).hide();
             
            $('.edit').show();
            $(".entrar" + id).removeClass("activa"); //quito la clase
            $(".barra").removeClass("btn_seleccionado"); //quito la clase del elemento seleccionado
            
            var dataStringProfesion = 'id='+ id + '&profesion=' + datoProfesion;
            console.log(dataStringProfesion);
            url = "dataProfesion.php";
             $.ajax({
                   type: "POST",
                   url: url,
                   data: dataStringProfesion,
                   success: function(data)
                   {
                     $('#resp').html(data);
                    // console.log(data);
                   }
               }); 
        }
    });
    });
