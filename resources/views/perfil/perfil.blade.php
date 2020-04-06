@extends('layout.base')

@section('css')
<link rel="stylesheet" href="css/Look!/perfil.css">
@endsection
@section('content')
@csrf
<div class="container perfil">
    <div class="row">
      <div class="col-md-6 perfilfoto" id="perfilfoto">
        <div class="media" id="divmedia">
        
          <div class="text-center view overlay" >
          <img class="" id="pictureUpdate"  src="{{$usuario->imagen}}" style="height:100px;width:100px;border-radius:60%;">
                <div class="mask flex-center rgba-red-strong" id="hoverimg" type="button" data-toggle="modal" data-target="#modalLoginForm">
                  <i class="fas fa-camera" id="iconfoto"></i>&nbsp;
                  <p class="white-text">Actualizar</p>
              </div>
          </div>

            <div class="media-body " id="mediaperfil">
              <h5 class="mt-0 mb-2 font-weight-bold"> {{Session::get('usuario')->usuario}}&nbsp;&nbsp;
                  <a href="/updateProfile" type="button" class="iconsperfil"><i class="fas fa-user-edit"></i></a>
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
    <center><button type="button" class="btn blue-gradient" style="border-radius:30px;" data-toggle="modal" data-target="#modalpublicaciones"><i class="fas fa-plus-circle fa-2x pr-2"
      aria-hidden="true"></i>Crear publicacion</button></center>

     {{--  <form action="{{ url('/publicaciones') }}" method="get" enctype="multipart/form-data" >
        @csrf
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
              <button type="submit" class="btn aqua-gradient btn-md" id="btnaceptar">Guardar</button>
            </div>
        </div>
      </div>
      </div>
      </form> --}}
      <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
          <!-- Card -->
         
          <div class="card">
      
            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top" src="/img/publicaciones/1585775330miles-morales-en-spider-man-un-nuevo-universo_3840x2879_xtrafondos.com.jpg"
                alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
      
            <!--Card content-->
            <div class="card-body">
      
              <!--Title-->
              <h4 class="card-title">{{Session::get('usuario')->usuario}}</h4>
              <!--Text-->
              <p class="card-text">{{ session::get('usuario')->descripcion }}</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <button type="button" class="btn btn-light-blue btn-md">Read more</button>
      
            </div>
      
          </div>
     
          <!-- Card -->
        </div>
        {{--<div class="col mb-4">
          <!-- Card -->
          <div class="card">
      
            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
      
            <!--Card content-->
            <div class="card-body">
      
              <!--Title-->
              <h4 class="card-title">Card title</h4>
              <!--Text-->
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <button type="button" class="btn btn-light-blue btn-md">Read more</button>
      
            </div>
      
          </div>
          <!-- Card -->
        </div>
        <div class="col mb-4">
          <!-- Card -->
          <div class="card">
      
            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
      
            <!--Card content-->
            <div class="card-body">
      
              <!--Title-->
              <h4 class="card-title">Card title</h4>
              <!--Text-->
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <button type="button" class="btn btn-light-blue btn-md">Read more</button>
      
            </div>
      
          </div>
          <!-- Card -->
        </div>
        <div class="col mb-4">
          <!-- Card -->
          <div class="card">
      
            <!--Card image-->
            <div class="view overlay">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg"
                alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
      
            <!--Card content-->
            <div class="card-body">
      
              <!--Title-->
              <h4 class="card-title">Card title</h4>
              <!--Text-->
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
              <button type="button" class="btn btn-light-blue btn-md">Read more</button>
      
            </div>
      
          </div>
          <!-- Card -->
        </div>--}}
      
      
      </div>
      
      
  <!-- Central Modal Small -->
  {{--@if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> Hubo un error en subir tu imágen, verifica que sea de la extension aceptada.</strong>
    <ul>
      @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if ($message == session::get('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> {{$message}}</strong>
   
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif--}}
<form action="{{route('/cambiarphoto')}}" method="post" enctype="multipart/form-data">
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
            <div id="lala">
            
            </div>
         </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info btn-rounded waves-effect btn-md" data-dismiss="modal" id="btncerrar">Close</button>
        <button type="submit" class="btn aqua-gradient btn-md" id="btnaceptar">Save changes</button>
      </div>
  </div>
</div>
</div>
</form>
@endsection
@section('javascript')
    <script src="js/Look!/perfil.js"></script>
    <script src="js/Look!/publicaciones.js"></script>
@endsection