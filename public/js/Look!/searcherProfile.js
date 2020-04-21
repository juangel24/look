$('#searchProfile').on('keyup', function (e) {
    // e.preventDefault();
    $value = $('#searchProfile').val();

    $user = $('#obtenerUsuarioOjb').val();
    //console.log($user);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/searchProfile',
        method: 'GET',
        data: {
            'search': $value
        },
        success: function (data) {
            
            if ($value != "") {
                $('#printProfileSearched').html("");
                $.each(data, function (key, item) {
                    
                    if(item.id == $user){
                        item.splice($user, 1)
                    }
                    console.log(item);
                    console.log(key);
                   // if(item.usuario = )
                    $html = " <a class='searchProfile' href='/profile'> " +
                        " <div class='sProfile'> " +
                        " <ul class='listSearchProfile'> " +
                        " <li class='li-search-profile'><img class='img-search-profile' src='" + item.imagen + "' alt=''></li> " +
                        " <li class='li-search-profile'><a href='/profile/"+ item.usuario +"'><p> " + item.usuario + " </p></a></li> " +
                        " </ul> " +
                        " </div> " +
                        " </a> ";

                    $('.print-profileSearch').css("display", "block");
                    $('#printProfileSearched').append($html);
                })
            } else {
                $('.print-profileSearch').css("display", "none");
            }
        },
        error: function () {
            alert("No se ha podido obtener la información");
        }
    });
});