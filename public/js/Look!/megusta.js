$('.btn-like').click(function () {

    var token = $('input[name=_token]').val();
    var id = $(this).parent().find('.idimagen').val();

    var like = $(this).parent().find('.can').val();
    var est = $(this).parent().find('.estado');
    var v = $(this).val();
    console.log(id);
    var contenido = $(this).parent().find('.verlikes');;

    var s = 0;
    if (est.html() == "like!") {

        $.ajax({
            url: "/likes",
            data: {
                id: id,
                _token: token,
                usu: 1 //aqui lo cambiaremos por la variable id de la variable session like! dislike!
            },
            type: "POST",
            datatype: "json",
            success: function (response) {
                contenido.html('');
                console.log(response)
                s = response.length
                contenido.append(s + " likes");
                est.html('');
                est.append("dislike!");
            }
        });

    } else {

        $.ajax({
            url: "/dislike",
            data: {
                id: id,
                _token: token,
                usu: 1 //aqui lo cambiaremos por la variable id de la variable session like! dislike!
            },
            type: "POST",
            datatype: "json",
            success: function (response) {
                contenido.html('');
                console.log(response)
                s = response.length
                contenido.append(s + " likes");
                est.html('');
                est.append("like!");
            }
        });

    }
});
