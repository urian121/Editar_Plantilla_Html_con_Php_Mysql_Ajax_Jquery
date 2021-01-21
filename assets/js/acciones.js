//EDITANDO LA PROFESION
$(document).ready(function() {
    $( ".editar" ).click(function() {
        var id    = $(this).attr("id");
        var dato  = $('#profesion').text(); 
        var value = $('.editable' + id).attr('contenteditable');
    
        console.log(id + value);
    
     if (value != 'true') {
            console.log('true');
            $('.editable' + id).attr('contenteditable','true');
            $('.editar').hide();
            $('.guardar' + id).show();
            
            //$(".drop__data").css("color", "green");
            $(".entrar" + id).addClass("activa");
            $(".editable" + id).focus();
        }
        else {
            console.log('false');
            $('.editable' + id).attr('contenteditable','false');
            $('.btn_edit' + id).show();
            $('.guardar' + id).hide();
             
            $('.edit').show();
            $(".entrar" + id).removeClass("activa");
    
           /* var dataString = 'valor='+ dato;
            console.log(dataString);
            url = "data.php";
             $.ajax({
                   type: "POST",
                   url: url,
                   data: dataString,
                   success: function(data)
                   {
                     $('#resp').html(data);
                   }
               }); */
        }
    });
    });
