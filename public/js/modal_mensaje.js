$(document).ready(function() {
    var inputSearch = $('#msg-to');
    var divResult = $('#msg-to-result');
    var divSelectedUsers = $('#selected-users');

    var user_id = $('#obtenerUsuarioOjb').val();

    inputSearch.on('keyup input', function() {
        var val = $(this).val();

        if(val != '') {
            var exceptions_ids = getExceptionsIds();

            $.ajax({
                type: "get",
                url: "user-search",
                data: {val, user_id, exceptions_ids},
                dataType: 'json',
                success: function(users) {
                    console.log(users);
                    var html = "";

                    $.each(users, function(i, user) {
                        html += '<div data-id="'+user.id+'" class="d-flex flex-row align-content-center p-1 px-3 m-1 hoverable card">' +
                            '<img src="'+user.imagen+'" class="rounded-circle" width="20" height="20">' +
                            '<p class="m-0 ml-2 user-found">'+user.username+'</p>' +
                        '</div>';
                    });

                    divResult.html(html);
                },
                error: function(error) {
                    console.log(error.responseJSON);
                }
            });
        }
        else divResult.empty();
    });

    divResult.on('click', 'div', function() {
        var id = $(this).attr('data-id');
        var user = $(this).find('.user-found').text();

        divSelectedUsers.append(
            '<span class="badge badge-default m-1" data-id="'+ id +'">' + user +
                '<button type="button" class="close ml-1 white-text">'+
                    '<span aria-hidden="true">×</span></button></span>'
        );

        divResult.empty();
    });

    divSelectedUsers.on('click', '.close', function() {
        $(this).parents('span').remove();
    });

    function getExceptionsIds() {
        var array = [];

        $.each(divSelectedUsers.children(), function(i, span) {
            var id = parseInt($(span).attr('data-id'));
            array.push(id);
        });
        array.push(user_id);

        return array;
    }
});
