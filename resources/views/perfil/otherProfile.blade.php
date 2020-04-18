@extends('perfil.navbar')
  @section('title', 'Look! |  Perfil ')
    @section('css')
      <link rel="stylesheet" href="../css/Look!/perfil.css">
      <link rel="stylesheet" href="sweetalert2.min.css">
    @endsection
      @section('content')
      {{-- DISEÑO DE PARTE DE FOTO DE PERFIL Y MUESTRA DE SEGUIDORES --}}
      <div class="container perfil">
          <div class="row">
            <div class="col-md-6 perfilfoto" id="perfilfoto">
              <div class="media" id="divmedia">
                <div class="text-center view overlay">
                {{-- <img class="" id="pictureUpdate"  src="{{$usuario->imagen}}" style="height:100px;width:100px;border-radius:60%;"> --}}
                <img class="d-flex mr-3" id="fotodeperfil"  src="../{{$usuario->imagen}}" style="height:100px;width:100px;border-radius:60%;">
                </div>

                  <div class="media-body " id="mediaperfil">
                    <h4 class="mt-0 mb-2 font-weight-bold"> {{$usuario->usuario}}</h4>
                    <h5>{{ $usuario->nombres }}</h5>
                    <div>
                        {{ $usuario->descripcion }}
                    </div>
                    {{--<div>
                          <button class="btn btn-primary" id="idseguidor">Seguir</button>
                        </div>--}}
                  </div>

                </div>
              
            </div>
            
            <div class="col-md-6 col-sm-4 descripcion">
              <div class="container descripciones" id="descripciones">
                  <div class="row">
                    <div class="col-md-4"><h5><b class="font-weight-bold">{{ $cantidad }}</b>&nbsp;&nbsp;Publicaciones</h5></div>
                    <div class="col-md-4"><h5><b class="font-weight-bold">0</b>&nbsp;&nbsp;Seguidores</h5></div>
                    <div class="col-md-4"><h5><b class="font-weight-bold">0</b>&nbsp;&nbsp;Seguidos</h5></div>
                  </div>
                </div>
              </div>
          </div>
          <hr>
        {{-- FIN DE  DISEÑO DE PARTE DE FOTO DE PERFIL Y MUESTRA DE SEGUIDORES --}}

        {{-- INICIO DE VALIDACIÓN Y CREACION DE CARD DE PUBLICACION --}}
          @if ($post != null )
          <div class="row" id="postt">
            @csrf
            @foreach ($post as $item)
            <div class="col-lg-4 col-md-12 mb-4">
              <input type="hidden" value="{{ $item->id }}" name="id_post" id="id_post">
                  <div class="view overlay" data-postid="{{ $item->id }}">
                    <a class="myBox" data-target="#imagemodal{{ $item->id }}" data-toggle="modal" id="imgmodal">
                      <img src="{{ $item->imagen }}" class="card-img-top" style="height:270px;" id="imgpost">
                      <div class="mask flex-center rgba-black-light">
                       <i class="fas fa-heart fa-lg white-text pr-3"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-comment fa-lg white-text pr-3" style="margin-left:20px;"></i>
                      </div>
                    </a>
                  </div>
                    @csrf
                    <div class="modal fade" id="imagemodal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="spanclose">&times;</span>
                      </button>
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content post">
                        <div class="modal-body">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-5">
                                  <img src="{{ $item->imagen }}" class="img-fluid imagepost" id="imagepost">
                                </div>
                                <div class="col-md-7 scrollable border border-default" id="div-comments-posts" data-postid="{{ $item->id }}">
                                  <div class="d-flex justify-content-between align-items-center border-bottom border-default p-3 comment-header">
                                    <div class="d-flex flex-row">
                                        <a class="p-0 waves-effect waves-light" href="/profile">
                                            <img class="rounded-circle z-depth-0" src="{{ $usuario->imagen }}" width="35" height="35">
                                        </a>
                                        <h5 class="ml-2 mb-0 align-self-center">{{ $usuario->usuario }}</h5>
                                       &nbsp;&nbsp;&nbsp;<a class="waves-effect waves-light" id="like"><i class="far fa-thumbs-up text-default fa-2x"></i></a>
                                      </diV>
                                  <a class="waves-effect waves-light dropdown-toggle text-default mr-4" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    {{--<i class="fas fa-ellipsis-h text-default fa-2x"></i>  --}}
                                  </a>
                                  <div class="dropdown-menu">
                                    <button class="dropdown-item" onclick="deletepost();">Eliminar</button>
                                    

                                    {{-- <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a> --}}
                                  </div>

                                  </div>
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
            @endforeach    
        </div>
          @else
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Hola {{ $usuario->usuario }}</strong>No has hecho ninguna publicaión x-x
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          {{-- INICIO DE VALIDACIÓN Y CREACION DE CARD DE PUBLICACION --}}
            {{-- MODAL DE CAMBIAR FOTO DE PERFIL --}}
        
      <form  action="{{ url('/updatephoto') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Cambiar foto de perfil</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-4">
              <div class="md-form mb-5">
                <center><i class="fas fa-camera prefix grey-text"></i>
                  <button class="btn btn-flat" id="btnsubirfoto" type="button">
                    <span class="btnsubirfoto">Subir foto<input type="file" name="profileimage" id="profileimage" />
                    </span>
                  </button>
                </center> 
                <div id="lala">
                        
                </div>    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-info btn-rounded waves-effect btn-md" data-dismiss="modal" id="btncerrar">Cancelar</button>
              <button type="submit" class="btn aqua-gradient btn-md" id="btnaceptar">Subir foto</button>
            </div>
        </div>
      </div>
      </div>
      </form>
      {{-- FIN DE MODAL DE FOTO DE PERFIL --}}
      @endsection
      @section('javascript')
      @endsection
