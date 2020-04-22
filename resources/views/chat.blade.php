@extends('layout.base')
@section('css')
    <style type="text/css">
        html, body, #container { height: 100%; }
        #container {
            background-color: #fafafa;
            padding-bottom: 2rem;
        }
        .scrollable {
            overflow: auto;
            scrollbar-color: #2bbbad transparent;
            scrollbar-width: thin;
        }
        .chat-header { height: 60px; }
        .contact-badge {
            width: 100%;
            height: 72px;
        }
        div.active {
            background-color: #b2ebf2;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex flex-row h-100 mx-auto border border-default rounded-lg bg-white z-depth-1" style="max-width: 935px;">
        <!-- Panel izquierdo (Contactos) -->
        <div class="h-100 border-right border-default d-flex flex-column" style="width: 350px">
            <!-- Encabezado -->
            <div class="d-flex justify-content-between align-items-center border-bottom border-default p-3 text-default chat-header">
                <h5 class="mb-0">Tus chats</h5>
                <a class="waves-effect waves-light" href="" data-toggle="modal" data-target="#modalMessage">
                    <i class="fas fa-pen text-default fa-lg"></i>
                </a>
            </div>
            <!-- Contactos con chat -->
            <div class="h-100 scrollable" id="contacts-container">
            @foreach ($contacts as $user)
                <div class="d-flex justify-content-between p-2 align-items-center contact-badge hoverable user" data-id="{{ $user->id }}">
                    <div class="d-flex flex-row align-items-center">
                        <img class="contact-img mx-2 p-0 rounded-circle z-depth-0" alt="avatar image" src="{{ $user->imagen }}" width="35" height="35">
                        <div class="d-flex flex-column">
                            <p class="contact-username mb-0">{{ $user->usuario }}</p>
                            <small>Te envió un mensaje</small>
                        </div>
                    </div>
                    <span class="badge badge-pill badge-default mr-2 no-read" style="{{ ($user->not_read == 0) ? 'display: none;' : ''  }}">{{$user->not_read}}</span>
                </div>
            @endforeach
            </div>
        </div>

        <!-- Panel derecho (Chat) -->
        <div class="h-100 d-flex flex-column" style="width: 585px;">
            <!-- Encabezado -->
            <div class="d-flex justify-content-between align-items-center border-bottom border-default p-3 chat-header">
                <div class="d-flex flex-row">
                    <a class="p-0 waves-effect waves-light" href="/profile">
                        <img id="selected-img" class="rounded-circle z-depth-0" alt="avatar image" src="img/profile_photos/user.png" width="35" height="35">
                    </a>
                    <h5 id="selected-username" class="ml-2 mb-0 align-self-center">Selecciona un contacto</h5>
                </div>
                <a class="waves-effect waves-light" href="#"><i class="fas fa-ellipsis-h text-default fa-lg"></i></a>
            </div>
            <!-- Mensajes del chat -->
            <div class="d-flex flex-column pt-3 h-100 scrollable" id="chat-messages">
                <div class="d-flex flex-column h-100 w-100 justify-content-center">
                    <h1 class="display-1 text-default text-center"><i class="fas fa-comments fa-lg"></i></h1>
                    <h3 class="text-center text-default">Tus mensajes</h3>
                    <p class="text-center text-default">Comienza una nueva conversación</p>
                </div>
            </div>
            <!-- Input -->
            <div class="d-flex flex-row align-items-center border-top border-default p-3 chat-header">
                <div class="md-form w-100">
                    <input name="msg" placeholder="Escribe un mensaje" type="text" class="form-control">
                </div>
                <a id="icon-send-msg" class="waves-effect waves-light" href="#"><i class="fas fa-paper-plane text-default fa-2x"></i></a>
            </div>
        </div>
    </div>

    @include('globals.modal_message');
@endsection

@section('javascript')
    <script src="js/modal_mensaje.js"></script>
    <script type="text/javascript">
        var receiver_id = '';
        var user_id = "{{ Session::get('usuario')->id }}";
        var chat_zone = $('#chat-messages');
        var contactsContainer = $('#contacts-container');

        function scrollToDown() {
            chat_zone.scrollTop(chat_zone[0].scrollHeight);
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        contactsContainer.on('click', '.user', function() {
            var user = $(this);

            receiver_id = user.attr('data-id');

            var contactImg = user.find('.contact-img').attr('src');
            var contactUser = user.find('.contact-username').text();
            var vadge

            $('#selected-img').attr('src', contactImg);
            $('#selected-username').text(contactUser);

            showMessages();

            $.ajax({
                type: "get",
                url: "confirm-read/" + receiver_id,
                data: '',
                success: function(messages) {
                    var badge = user.find('.no-read');
                    badge.hide();
                    badge.text('0');
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });

            var users = $('.user');
            users.removeClass('active');
            user.addClass('active');
        });

        //input para enviar msj
        var input_msg = $('input[name="msg"]');
        var icon_send_msg = $('#icon-send-msg');
        var _token = $('meta[name="csrf-token"]').attr('content');
        icon_send_msg.hide();

        input_msg.keyup(function(e) {
            var input = $(this);
            var message = input.val();
            var parent = input.parent();

            if (message) {
                icon_send_msg.show();
                parent.addClass('mr-3');

                if (e.keyCode == 13 && receiver_id != '') {
                    sendMessage(message);
                    input.val('');
                }
            }
            else {
                icon_send_msg.hide();
                input.parent().removeClass('mr-3');
            }
        });

        function showMessages() {
            $.ajax({
                type: "get",
                url: "messages/" + receiver_id,
                data: '',
                success: function(messages) {
                    var html = "";

                    $.each(messages, function(i, msg) {
                        html += '<div class="badge ' + ((msg.from == user_id) ? 'badge-default ml-auto' : 'badge-light mr-auto') +' font-weight-normal mx-3 mb-3 mt-0 p-2 text-wrap" style="max-width: 400px;">' +
                                '<p class="text-left text-wrap" style="margin-bottom: 8px;">'+ msg.msg +'</p>' +
                                '<p class="text-right small mb-0">'+ msg.datetime +'</p>' +
                            '</div>';
                    });

                    chat_zone.html(html);
                    scrollToDown();
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function sendMessage(message) {
            $.ajax({
                type: "post",
                url: "message",
                data: {receiver_id, message},
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        }

        function updateContacts() {
            $.get('get-contacts', function(contacts) {
                html = '';

                $.each(contacts, function(id, user) {
                    html += '<div class="d-flex justify-content-between p-2 align-items-center contact-badge hoverable user" data-id="'+user.id+'">'+
                        '<div class="d-flex flex-row align-items-center">'+
                            '<img class="contact-img mx-2 p-0 rounded-circle z-depth-0" alt="avatar image" src="'+user.imagen+'" width="35" height="35">'+
                            '<div class="d-flex flex-column">'+
                                '<p class="contact-username mb-0">'+user.usuario+'</p>'+
                                '<small>Te envió un mensaje</small>'+
                            '</div>'+
                        '</div>'+
                        '<span class="badge badge-pill badge-default mr-2 no-read" style="'+((user.not_read == 0) ? 'display: none;' : '')+'">'+user.not_read+'</span>'+
                    '</div>'
                });

                contactsContainer.html(html);
            });
        }

        Pusher.logToConsole = true;

        var pusher = new Pusher('c3136ce130df8039ac5b', {
            cluster: 'us3',
            forceTLS: true
        });

        var channel = pusher.subscribe('look');
        channel.bind('chat', function(data) {
            if (user_id == data.from) {
                contacts.find("[data-id='"+ receiver_id +"']").click();
            }
            else {
                $.each(data.to, function(i, to) {
                    if (user_id == to) {
                        if (receiver_id == data.from) {
                            contactsContainer.find("[data-id='"+ receiver_id +"']").click();
                        }
                        else {
                            alert("You have a message :)");
                            updateContacts();
                        }

                        return false;
                    }
                });
            }
        });
    </script>
@endsection
