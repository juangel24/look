@extends('layout.base')

@section('css')
<link rel="stylesheet" href="css/Look!/perfil.css">
@endsection
@section('content')
<div class="container perfil">
    <div class="row">
      <div class="col-md-6 perfilfoto" id="perfilfoto">
        <div class="media" id="divmedia">
          <div class="text-center">
              <a  type="button" data-toggle="modal" data-target="#modalLoginForm">
                <img class="d-flex mr-3" id="fotodeperfil" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image">
              </a>
          </div>
            
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
  <!-- Central Modal Small -->


  <form action="/uptadephoto" method="post" enctype="multipart/form-data">
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
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-camera prefix grey-text"></i>
         
            <button class="btn btn-flat btn-lg" id="btnsubirfoto" type="button"><span class="btnsubirfoto">Subir foto<input type="file" name="imagen"></span></button>
         </div>
        <hr>
        <div class="md-form mb-4">
          <i class="fas fa-trash-alt prefix grey-text"></i>
          <button class="btn btn-flat btn-lg btneliminarfoto" id="btneliminarfoto">Eliminar foto</button>
        </div>
      </div>
  </div>
</div>

</form>
</div>
@endsection
@section('javascript')
    <script src="js/perfil.js"></script>
@endsection