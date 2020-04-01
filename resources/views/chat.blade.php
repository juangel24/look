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
            padding-bottom: 2rem;
            scrollbar-color: #2bbbad transparent;
            scrollbar-width: thin;
        }
        .chat-header { height: 60px; }
        .contact-badge {
            width: 100%;
            height: 72px;
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
                <a class="waves-effect waves-light" href="#"><i class="fas fa-pen-square text-default fa-2x"></i></a>
            </div>
            <!-- Contactos con chat -->
            <div class="h-100 scrollable" id="contacts-container">
            @for ($i = 0; $i < 3; $i++)
                <div class="d-flex flex-row p-2 align-items-center contact-badge">
                    <a class="mx-2 p-0 waves-effect waves-light" href="/profile">
                        <img class="rounded-circle z-depth-0" alt="avatar image" src="https://pbs.twimg.com/media/BtrrJuDCMAAgG5s.jpg" height="35">
                    </a>
                    <div class="d-flex flex-column">
                        <p class="mb-0">MikeWasauski</p>
                        <small>Te envió un mensaje</small>
                    </div>
                </div>
            @endfor
            </div>
        </div>

        <!-- Panel derecho (Chat) -->
        <div class="h-100 d-flex flex-column" style="width: 585px;">
            <!-- Encabezado -->
            <div class="d-flex justify-content-between align-items-center border-bottom border-default p-3 chat-header">
                <div class="d-flex flex-row">
                    <a class="p-0 waves-effect waves-light" href="/profile">
                        <img class="rounded-circle z-depth-0" alt="avatar image" src="https://pbs.twimg.com/media/BtrrJuDCMAAgG5s.jpg" height="35">
                    </a>
                    <h5 class="ml-2 mb-0 align-self-center">MikeWasauski</h5>
                </div>
                <a class="waves-effect waves-light" href="#"><i class="fas fa-ellipsis-h text-default fa-2x"></i></a>
            </div>
            <!-- Mensajes del chat -->
            <div class="h-100 scrollable" id="chat-messages">
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
@endsection

@section('javascript')
    <script type="text/javascript">
        input_msg = $('input[name="msg"]');
        icon_send_msg = $('#icon-send-msg');
        icon_send_msg.hide();

        input_msg.keyup(function() {
            input = $(this);
            parent = input.parent();
            console.log(input.val());

            if (input.val()) {
                icon_send_msg.show();
                parent.addClass('mr-3');
            }
            else {
                icon_send_msg.hide();
                parent.removeClass('mr-3');
            }
        });

        window.onload = function () {
            chat = $('#chat-messages');
            chat.scrollTop(chat.scrollHeight);
        }
    </script>
@endsection
