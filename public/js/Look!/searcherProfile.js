$('#searchProfile').on('keyup', function (e) {
    // e.preventDefault();
    $value = $('#searchProfile').val();
    console.log($value);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'searchProfile',
        method: 'GET',
        data: {
            'search': $value
        },
        success: function (data) {
            if ($value != "") {
                $('#printProfileSearched').html("");
                $.each(data, function (key, item) {
                    console.log(item);
                    $html = " <a class='searchProfile' href='/profile'> " +
                        " <div class='sProfile'> " +
                        " <ul class='listSearchProfile'> " +
                        " <li class='li-search-profile'><img class='img-search-profile' src='" + item.imagen + "' alt=''></li> " +
                        " <li class='li-search-profile'><p> " + item.usuario + " </p></li> " +
                        " </ul> " +
                        " </div> " +
                        " </a> ";

                    $('.print-profileSearch').css("display", "block");
                    $('.print-profileSearch').css("heigth", "auto");
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