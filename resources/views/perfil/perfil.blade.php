@extends('layout.base')

@section('css')
<link rel="stylesheet" href="css/Look!/perfil.css">
@endsection
@section('content')
@csrf
{{-- DISEÑO DE PARTE DE FOTO DE PERFIL Y MUESTRA DE SEGUIDORES --}}
<div class="container perfil">
    <div class="row">
      <div class="col-md-6 perfilfoto" id="perfilfoto">
        <div class="media" id="divmedia">
        
          <div class="text-center view overlay" >
          <img class="d-flex mr-3" id="fotodeperfil" src="{{ asset('img/profile_photos/'.$usuario->imagen) }}" style="height:100px;width:100px;border-radius:60%;">
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
                <div class="mask flex-center rgba-red-strong" id="hoverimg" type="button" data-toggle="modal" data-target="#modalLoginForm">
                  <i class="fas fa-camera" id="iconfoto"></i>&nbsp;
                  <p class="white-text">Actualizar</p>
              </div>
          </div>

            <div class="media-body " id="mediaperfil">
              <h5 class="mt-0 mb-2 font-weight-bold"> {{Session::get('usuario')->usuario}}&nbsp;&nbsp;
                  <a href="" type="button" class="iconsperfil"><i class="fas fa-user-edit"></i></a>
                  &nbsp;&nbsp;<a class="iconsperfil" href="" type="button"><i class="fas fa-cog"></i></a>
                 </h5></a>
              <h5>{{ Session::get('usuario')->nombres }}</h5>
            </div>
            <div>
                
            </div>
          </div>
         
      </div>
      
      <div class="col-md-6 descripcion">
        <div class="container descripciones">
            <div class="row">
              <div class="col-md-4"><h5><b>#</b>&nbsp;&nbsp;Publicaciones</h5></div>
              <div class="col-md-4"><h5><b>#</b>&nbsp;&nbsp;Seguidores</h5></div>
              <div class="col-md-4"><h5><b>#</b>&nbsp;&nbsp;Seguidos</h5></div>
            </div>
          </div>
        </div>
    </div>
    <hr>
  {{-- FIN DE  DISEÑO DE PARTE DE FOTO DE PERFIL Y MUESTRA DE SEGUIDORES --}}

  {{-- BOTON DE CREACION DE PUBLICACION --}}
    <center><button type="button" class="btn blue-gradient" style="border-radius:30px;" data-toggle="modal" data-target="#modalpublicaciones"><i class="fas fa-plus-circle fa-2x pr-2"
      aria-hidden="true"></i>Crear publicacion</button></center>
  {{-- FIN DE BOTON DE CREACION DE PUBLICACION --}}
      <br>
      {{-- ALERT  --}}
      <div class="alert" id="message" style="display: none"></div>
      {{-- FIN DE ALERT --}}
      {{-- MODAL DE CREACION DE PUBLICACION --}}
      <form method="POST" enctype="multipart/form-data" id="updateProfileForm">
        @csrf
    <input type="hidden" name="id" value="{{ $usuario->id }}">
      <div class="modal fade" id="modalpublicaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Agregar pubicación</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-4">
              <div class="form-group green-border-focus">
                <label for="exampleFormControlTextarea5">Descripción</label>
                <textarea class="form-control" id="exampleFormControlTextarea5" rows="3" name="descripcion" id="descripcion"></textarea>
              </div>
              <div class="md-form mb-5">
                <center><i class="fas fa-camera prefix grey-text"></i>
                  <button class="btn btn-flat" id="btnsubirfoto" type="button">
                    <span class="btnsubirfoto">Subir foto<input type="file" name="imagen" id="imagen">
                    </span>
                  </button>
                </center>
                  <div id="lolo">
                  
                  </div>
               </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-info btn-rounded waves-effect btn-md" data-dismiss="modal" id="btncerrar">Cancelar</button>
              <button type="submit" class="btn aqua-gradient btn-md" id="btnaceptar" >Guardar</button>
            </div>
        </div>
      </div>
      </div>
    </form>
    {{-- FIN DE MODAL DE CREACION DE PUBLICACION --}}
    <div id="upload_image" class="row row-cols-1 row-cols-md-2">
      <div class="col mb-4">

      </div>
    </div>
  
     
      {{-- MODAL DE CAMBIAR FOTO DE PERFIL --}}
  
<form  action="{{ route('/cambiarphoto') }}" method="post" enctype="multipart/form-data">
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
              <span class="btnsubirfoto">Subir foto<input type="file" name="profileimage" id="profileimage">
              </span>
            </button>
          </center>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info btn-rounded waves-effect btn-md" data-dismiss="modal" id="btncerrar">Close</button>
        <button type="submit" class="btn aqua-gradient btn-md" id="btnaceptar">Save changes</button>
      </div>
  </div>
</div>
</div>
</form>
{{-- FIN DE MODAL DE FOTO DE PERFIL --}}
@endsection
@section('javascript')
    <script src="js/Look!/perfil.js"></script>
    <script src="js/Look!/publicaciones.js"></script>
    <script src="js/Look!/nuevapublicacion.js"></script>
    <script>
      $(document).ready(function(){
        
    $('#updateProfileForm').on('submit',function(e){
       e.preventDefault();
       var card = $("#upload_image");
       $.ajax({
        url: "{{route('posts')}}",
            type : "POST",
            data : new FormData(this),
            dataType: 'JSON',
            processData : false,
            contentType: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#message').addClass(data.class_name);
                /*$('#upload_image').append(data.upload_image);*/
                card.html('')
                $.each(data,function(i,v){
                    card.append('<div class="card">');
                    card.append('<div class="view overlay">');
                    card.append(data.upload_image);
                    card.append('<a class="">');
                    card.append('<div class="mask rgba-white-slight"></div>');
                    card.append('</a>');
                    card.append('</div>');
                    card.append('</div>');
                    card.append('</div>');
                });
            },
            error: function(xhr, textStatus, error) {
                console.log(xhr.responseText);
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
       });
    });
  });
 
    </script>
@endsection