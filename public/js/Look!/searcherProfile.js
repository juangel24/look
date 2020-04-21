$('#searchProfile').on('keyup', function (e) {
    // e.preventDefault();
    // $(window).on("load",function(){});
    $value = $('#searchProfile').val();

    $user = $('#obtenerUsuarioOjb').val();

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
            var x = function (data){
                data.forEach(element => {
                    if (element.id == $user){
                        data.splice(data.indexOf(element),1)
                    }
                });
                return data;
            }
            if ($value != "") {
                $('#printProfileSearched').html("");
                $.each(data, function (key, item) {
                    $html = " <a class='searchProfile' href='/profile'> " +
                        " <div class='sProfile'> " +
                        " <ul class='listSearchProfile'> " +
                        // if(!$usuarios == null){
                        " <li class='li-search-profile'><img class='img-search-profile' src='" + item.imagen + "' alt=''></li> " +
                        " <li class='li-search-profile'><a href='/profile/"+ item.usuario +"'><p> " + item.usuario + " </p></a></li> " +
                        // }
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