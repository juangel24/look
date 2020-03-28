@extends('layout.base')

@section('css')
<link rel="stylesheet" href="css/Look!/perfil.css">
@endsection
@section('content')
<div class="container perfil">
    <div class="row">
      <div class="col-md-6 perfilfoto" id="perfilfoto">
        <div class="media" id="divmedia">
            <a href="" type="button"><img class="d-flex mr-3" id="fotodeperfil" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image"></a>
            <div class="media-body " id="mediaperfil">
              <h5 class="mt-0 mb-2 font-weight-bold">Usuario&nbsp;&nbsp;
                <a href="" type="button" class="iconsperfil"><i class="fas fa-user-edit"></i></a>
                &nbsp;&nbsp;<a class="iconsperfil" href="" type="button"><i class="fas fa-cog"></i></a>
              </h5></a>
             <br>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
              vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia
              congue felis in faucibus.
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
  </div>
@endsection