 $('.enviar').click(function () {

     var token = $('input[name=_token]').val();
     var id = $(".enviar").val();
     var te = $("#message-text").val();
     var usu = 1;
     var e = "";
     var contenido = $('.cemn');

     console.log(te);
     $.ajax({
         url: "/enviar",
         data: {
             id: id,
             _token: token,
             commen: te,
             usu: usu
         },
         type: "POST",
         datatype: "json",
         success: function (response) {
             contenido.html('');
             console.log(response)
             $("#message-text").val("");
             $.each(response, function (i, v) {
                 contenido.append('<h5><a href="/visita/' + v.usuario_id + '">' + v.usuario['usuario'] + '</a></h5>' +
                     '<p>' + v.comentario + '</p>' +
                     '<hr>');
             });

         }
     });
 });

 $('.btn-comentario').click(function () {

     var token = $('input[name=_token]').val();
     var id = $(this).parent().parent().find('.idimagen').val();
     var coms = $(".coms")
     coms.html('');
     console.log(id)
     var contenido = $('.cemn');
     contenido.html('');
     $(".enviar").val(id);
     $.ajax({
         url: "/coment",
         data: {
             id: id,
             _token: token
         },
         type: "POST",
         datatype: "json",
         success: function (response) {
             console.log(response)
             $.each(response, function (i, v) {
                 contenido.append('<h5><a href="/visita/' + v.usuario_id + '">' + v.usuario['usuario'] + '</a></h5>' +
                     '<p>' + v.comentario + '</p>' +
                     '<hr>')
             });
         }
     });



 });
