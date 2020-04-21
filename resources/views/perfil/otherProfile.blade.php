@extends('layout.base')
  @section('title', 'Look! |  Perfil ')
    @section('css')
      <link rel="stylesheet" href="{{ asset('css/Look!/perfil.css') }}">
      <link rel="stylesheet" href="sweetalert2.min.css">
      <style>
      #idseguidores{
        height: 30px;
        width: 40px;
      }
      .estado {
        margin: 0px;
        padding: 0px;
    }
      </style>
    @endsection
      @section('content')
      {{-- DISEÑO DE PARTE DE FOTO DE PERFIL Y MUESTRA DE SEGUIDORES --}}
      <div class="container perfil">
          <div class="row">
            <div class="col-md-6 perfilfoto" id="perfilfoto">
              <div class="media" id="divmedia">
                <div class="text-center view overlay">
                {{-- <img class="" id="pictureUpdate"  src="{{$usuario->imagen}}" style="height:100px;width:100px;border-radius:60%;"> --}}
                <img class="d-flex mr-3" id="fotodeperfil"  src="{{asset("$usuario->imagen")}}" style="height:100px;width:100px;border-radius:60%;">
                </div>

                  <div class="media-body " id="mediaperfil">
                    <h4 class="mt-0 mb-2 font-weight-bold"> {{$usuario->usuario}}</h4>
                    <h5>{{ $usuario->nombres }}</h5>
                    <div>
                        {{ $usuario->descripcion }}
                    </div>
                  {{--   @if (!Session::has("validacion")) --}}
                    <button class="btn btn-primary" id="idseguidor" onclick="visualiza_dejardeseguir" value="{{ $usuario->id }}">Seguir</button>  
                  {{--   @else
                    <button class="" id="idseguidores" value="{{ $usuario->id }}" onclick="visualiza_seguir"><i class="fas fa-check"></i></button>  
                    @endif --}}
                      
                  </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-4 descripcion">
              <div class="container descripciones" id="descripciones">
                  <div class="row">
                    <div class="col-md-4"><h5><b class="font-weight-bold">{{ $cantidad }}</b>&nbsp;&nbsp;Publicaciones</h5></div>
                    <div class="col-md-4"><h5><b class="font-weight-bold" id="othersfollowers">{{ $seguidores }}</b>&nbsp;&nbsp;Seguidores</h5></div>
                    <div class="col-md-4"><h5><b class="font-weight-bold" id="othersfollowing">{{ $seguidos }}</b>&nbsp;&nbsp;Seguidos</h5></div>
                  </div>
                </div>
              </div>
          </div>
          <hr>
        {{-- FIN DE  DISEÑO DE PARTE DE FOTO DE PERFIL Y MUESTRA DE SEGUIDORES --}}

        {{-- INICIO DE VALIDACIÓN Y CREACION DE CARD DE PUBLICACION --}}
  @if ($post != null )
    <div class="row">
      @foreach ($post as $item)
      <div class="col-lg-4 col-md-12 mb-4">
          <!--Card-->
        <div class="card card-cascade wider mb-4">
            <!--Card image-->
            <div class="view overlay" data-postid="{{ $item->id }}">
              <a class="myBox" data-target="#imagemodal{{ $item->id }}" data-toggle="modal" id="imgmodal">
                <img src="{{ asset("$item->imagen ")}}" class="card-img-top" style="height:270px;" id="imgpost">
                  <div class="mask flex-center rgba-black-light">
                    <i class="fas fa-heart fa-lg white-text pr-3"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-comment fa-lg white-text pr-3" style="margin-left:20px;"></i>
                  </div>
              </a>
            </div>
            <!--/Card image-->
            
            <div class="modal fade" id="imagemodal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-default" id="exampleModalLabel">{{ session::get('usuario')->usuario }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <img src="{{ asset("$item->imagen ")}}" class="img-fluid imagepost" id="imagepost">
                  </div>
                </div>
              </div>
            </div>
            <!--Card content-->
            <div class="card-body card-body-cascade">
              <input type="hidden"  class="idimagen"value="{{ $item->id }}">
              <!--Title-->
              <h4 class="card-title text-default text-center"><strong>{{ $usuario->usuario }}</strong>
              </h4>
              <a class="waves-effect waves-light dropdown-toggle text-default mr-4" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" id="dropdown-option" s>
                {{-- <i class="fas fa-ellipsis-h text-default fa-2x"></i> --}}
              </a>
              <div class="dropdown-menu">
                <button class="dropdown-item" onclick="deletepost();">Eliminar</button>                                  
              </div>
              <p class="">{{ $item->descripcion }}</p>
            </div>
          <div class="modal-footer">
            <input type=""  class="idimagen"value="{{ $item->id }}" hidden>
              <input id="can" class="can" type="text" value="{{$item->can}}" hidden >
              @if($item->can=="si") 
              
              <button type="button" class="btn btn-default btn-like" val="like">
                <p class="estado">like!</p>
              </button>
               @else  
              <button type="button" class="btn btn-default btn-like" val="like">
                <p class="estado">dislike!</p>
              </button>
            @endif 
            <button type="button" class="btn btn-default btn-comentario" data-toggle="modal" data-target="#exampleModal"  data-whatever="@mdo">comentario!</button>
          </div>
      <div class="modal fade" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-default" id="exampleModalLabel">Comentarios</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cemn">

                    </div>

                </div>
                <div class="modal-footer">
                    <form>
                        {{csrf_field()}}
                        
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text" class="yeah"></textarea>
                        <button type="button" val=""  class="btn btn-primary enviar">Send message</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ################################################### -->

            <!--/.Card content-->
    </div>
    
          <!--/.Card-->
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
              <div id="obtenerUrlPerfil" value="{{$usuario->usuario}}"></div>
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
       <script src="{{ asset("js/Look!/comentarios.js")}}"></script>
       <script src="{{ asset("js/Look!/megusta.js") }}"></script>
        <script>
          $("#idseguidor").click(function(e){
            e.preventDefault();
            //var token = $('input[name=_token]').val();
            id = $("#idseguidor").val();
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('/seguidores') }}",
                method: "GET",
                data : { "id": id},
                success: function(data){
                  console.log("hola" + data);
                  $("#othersfollowers").html(data);
                }
              }).fail( function( jqXHR, textStatus, errorThrown ) {
                  console.log(jqXHR, textStatus, errorThrown  );
              });

          });
    $(document).ready(function() {
    //Buscador de Usuarios
          $('#searchProfile').on('keyup', function (e) {
              // e.preventDefault();
              $value = $('#searchProfile').val();
              $userProfile = $('#obtenerUrlPerfil').val()

              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                  url: "{{ url('searchProfile/')}}",
                  method: 'GET',
                  data: {
                      'search': $value
                  },
                  success: function (data) {
                      
                      if ($value != "") {
                          $('#printProfileSearched').html("");
                          $.each(data, function (key, item) {
                            console.log(item.imagen)
                              $html = " <a class='searchProfile' href='/profile'> " +
                                  " <div class='sProfile'> " +
                                  " <ul class='listSearchProfile'> " +
                                  ' <li class="li-search-profile"><img class="img-search-profile" src="/'+ item.imagen +'" alt=""></li> ' +
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

          //VERIFICACIÓN
        $("#idseguidor").click(function(e){
            e.preventDefault();
            //var token = $('input[name=_token]').val();
            id = $("#idseguidor").val();
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('verificarSeguidores') }}",
                method: "GET",
                data : { "id": id},
                success: function(data){
                  console.log(data);
                   //$("#idseguidores").css('display', 'block');
                   
                }
              }).fail( function( jqXHR, textStatus, errorThrown ) {
                  console.log(jqXHR, textStatus, errorThrown  );
              });
          });
    });
        </script>

      @endsection
