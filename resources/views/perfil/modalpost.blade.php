@extends('layout.base')
@section('css')
    
@endsection
@section('content')
            {{-- INICIO DE VALIDACIÓN Y CREACION DE CARD DE PUBLICACION --}}
            @if ($post != null )
            <div class="row">
              @foreach ($post as $item)
              <div class="col-lg-4 col-md-12 mb-4">
                <input type="hidden" value="{{ $item->id }}" name="id_post" id="id_post">
              
                    <!--Card image-->
                   
                    <div class="view overlay">
                      <a class="myBox" data-target="#imagemodal{{ $item->id }}" data-toggle="modal" id="imgmodal">
                        <img src="{{ $item->imagen }}" class="card-img-top" style="height:270px;" id="imgpost">
                        <div class="mask flex-center rgba-black-light">
                         <i class="fas fa-heart fa-lg white-text pr-3"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-comment fa-lg white-text pr-3" style="margin-left:20px;"></i>
                      </div>
                      </a>
                    
                      @csrf
                      <div class="modal fade" id="imagemodal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" id="spanclose">&times;</span>
                        </button>
                      <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content post">
   
                          <div class="modal-body">
                              {{-- <img src="{{ $item->imagen }}" id="imagepost"> --}}
                             
                               {{--  <form method="POST" action="/post/{{ $item->id }}" id="comment_form"> --}}
                                <div class="container">
  
                                
                                <div class="row">
                                  <div class="col-md-5">
                                    <img src="{{ $item->imagen }}" class="img-fluid imagepost" id="imagepost">
                                  </div>
                                  <div class="col-md-7 scrollable border border-default" id="div-comments-posts">
                                    <div class="d-flex justify-content-between align-items-center border-bottom border-default p-3 chat-header">
                                      <div class="d-flex flex-row">
                                          <a class="p-0 waves-effect waves-light" href="/profile">
                                              <img class="rounded-circle z-depth-0" alt="avatar image" src="{{ session::get('usuario')->imagen }}" width="35" height="35">
                                          </a>
                                          <h5 class="ml-2 mb-0 align-self-center">{{ session::get('usuario')->usuario }}</h5>
                                         <a class="waves-effect waves-light" id="like"><i class="far fa-heart text-default fa-2x"></i></a>
                                        </diV>
                                    <a class="waves-effect waves-light" href="#"><i class="fas fa-ellipsis-h text-default fa-2x"></i></a>
                                    </div>
                                    {{--<div class="d-flex flex-row">
                                      <a class="p-0 waves-effect waves-light" href="/profile" style="margin-left:10px">
                                          <img class="rounded-circle z-depth-0" alt="avatar image" src="{{ session::get('usuario')->imagen }}" width="35" height="35">
                                      </a>
                                      <h5 class="ml-2 mb-0 align-self-center">{{ session::get('usuario')->usuario }}</h5>
                                  </div>--}}
                                 
                                  
                                  
                                  <div class="d-flex flex-row align-items-center" id="comment" >
                                    <div class="md-form border-top border-default comment-header">
                                          <input name="comment_content"  id="comment_content" placeholder="Escribe tu comentario aquí..." type="text" class="form-control">
                                      </div>
                                      <a id="icon-send-comment" class="button waves-effect waves-light"  type="submit"><i class="fas fa-paper-plane text-default fa-2x"></i></a>
                                  </div>
                                  </div>
                                </div>
  
                              </div>
                              
                          </div>
  
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
              @endforeach    
          </div>
            @else
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Hola {{ session::get('usuario')->usuario }}</strong>No has hecho ninguna publicaión x-x
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
@endsection