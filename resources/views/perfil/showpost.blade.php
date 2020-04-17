{{--  }@extends('layout.base')
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
  </style>
    @endsection
    @section('content')
    <div class="d-flex flex-row h-100 mx-auto border border-default rounded-lg bg-white z-depth-1" style="max-width: 935px;">
      <!-- Panel izquierdo (Contactos) -->
      <div class="h-100 border-right border-default d-flex flex-column" style="width: 350px">
          <!-- Encabezado -->
          <div class="d-flex justify-content-between align-items-center border-bottom border-default p-3 text-default chat-header">
              <h5 class="mb-0">{{Session::get('usuario')->usuario}}</h5>
          </div>
          <!-- Contactos con chat -->
          <div class="h-100 scrollable" id="contacts-container">
          @foreach ($posts as $i)
              <div class="d-flex justify-content-between p-2 align-items-center contact-badge hoverable">
                  <div class="d-flex flex-row align-items-center">
                      <img class="mx-2 p-0 rounded-circle z-depth-0" alt="avatar image" src="{{ $i->imagen }}" height="35">
                      <div class="d-flex flex-column">
                          <p class="mb-0">MikeWasauski</p>
                          <small>Te envió un mensaje</small>
                      </div>
                  </div>
                  <span class="badge badge-pill badge-default mr-2">2</span>
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
                      <img class="rounded-circle z-depth-0" alt="avatar image" src="https://vignette.wikia.nocookie.net/bobesponja/images/c/c1/180px-SBz89.png/revision/latest/scale-to-width-down/340?cb=20131013132813" width="35" height="35">
                  </a>
                  <h5 class="ml-2 mb-0 align-self-center">mantarraya</h5>
              </div>
              <a class="waves-effect waves-light" href="#"><i class="fas fa-ellipsis-h text-default fa-2x"></i></a>
          </div>
          <!-- Mensajes del chat -->
          <div class="d-flex flex-column pt-3 h-100 scrollable" id="chat-messages">
              <div class="badge badge-light font-weight-normal mx-3 mb-3 mt-0 p-2 text-wrap mr-auto" style="max-width: 400px;">
                  <p class="text-left" style="margin-bottom: 8px;">¡Cosa rosada con dedos de mantequilla, de todas formas ¿Qué tienes en esa caja?!</p>
                  <p class="text-right small mb-0">07:34 p.m.</p>
              </div>
              <div class="badge badge-default font-weight-normal mx-3 mb-3 mt-0 p-2 text-wrap ml-auto" style="max-width: 400px;">
                  <p class="text-left" style="margin-bottom: 8px;">Mis billeteras</p>
                  <p class="text-right small mb-0">07:34 p.m.</p>
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
    @endsection--}}