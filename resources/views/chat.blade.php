@extends('layout.base')
@section('css')
    <style type="text/css">
        html, body, #container { height: 100%; }
        #container {
            background-color: #fafafa;
            padding-bottom: 2rem;
        }
        #contacts-container {
            overflow: scroll;
            overflow-x: hidden;
            padding-bottom: 2rem;
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
        <div class="h-100" id="contacts-container">
            <div class="border-bottom border-default contact-badge"></div>
            <div class="border-bottom border-default contact-badge"></div>
            <div class="border-bottom border-default contact-badge"></div>
        </div>
    </div>
    <!-- Panel derecho (Chat) -->
    <div class="h-100" style="width: 585px;">
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
    </div>
</div>
@endsection
