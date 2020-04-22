@extends('layout.base')
@section('title', 'Look! | Actualizar Perfil')
@section('css')
<link rel="stylesheet" href="css/Look!/perfil.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
@endsection
@section('content')

<section>
    @extends('modals.imageUpdate')
    <div class="container updatedProfile">
        <a id="hrefArrow" href="/profile">
            <i data-toggle="tooltip" data-placement="top" title="" id="" class="fas fa-angle-left" data-original-title="Actualizar perfil"></i>
        </a>
    
        <a id="arrow" href="#">
            <i data-toggle="tooltip" data-placement="top" title="" id="" class="arrow fas fa-angle-left" data-original-title="Regresar"></i>
        </a>
        @if(Session::has('repeatedEmail'))
            <div class="no-user-updated error">El correo que ingresó ya está registrado, intente con otro</div>
        @endif
        
        <div class="formUpdate1">
            <form action="{{ url('/uploadImage') }}" enctype="multipart/form-data">
                @csrf
                <div class="text-center view overlay cont-image-upd" >
                <!-- <img class="" id="pictureUpdate"  src="{{$usuario->imagen}}" style="height:100px;width:100px;border-radius:60%;"> -->
                    <img class="d-flex mr-3 fotodeperfil" id=""  src="{{$usuario->imagen}}" style="height:100px;width:100px;border-radius:60%;">
                    <br>
                    <div class="mask flex-center rgba-red-strong" id="hoverimg" type="button" data-toggle="modal" data-target="#modalLoginForm">
                        <i class="fas fa-camera" id="iconfoto"></i>&nbsp;
                        <p class="white-text">Actualizar</p>
                    </div>
                </div>
            </form>
            <form class="" action="{{ url('updateProfiles1/{dataForm1}') }}" method="POST">
                @csrf
                <!-- <img class="fotodeperfil" src="{{$usuario->imagen}}"> -->
                <div class="md-form">
                    <input name='firstNameUpdate' id='firstNameUpdate' type="text" 
                        class="form-control @error('firstNameUpdate') field-error @enderror"
                        value="{{ Session::get('usuario')->nombres }}" required>
                    <label for="firstNameUpdate">Nombres: </label>
                    @error('firstNameUpdate')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="md-form">
                    <input name='lastnameupdate' id='lastnameupdate' type="text" 
                    class="form-control @error('lastnameupdate') field-error @enderror"
                    value="{{ Session::get('usuario')->apellidos }}" required>
                    <label for="lastnameupdate">Apellidos: </label>
                    @error('lastnameupdate')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="md-form">
                    <input name='userUpdated' id='userUpdated' type="text" 
                        class="form-control @error('userUpdated') field-error @enderror"
                        value="{{ Session::get('usuario')->usuario }}" required>
                    <label for="userUpdated">Usuario: </label>
                    @error('userUpdated')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="md-form">
                    <input name='descriptionUpdate' id='descriptionUpdate' type="text" 
                        class="form-control @error('descriptionUpdate') field-error @enderror"
                        value="{{ Session::get('usuario')->descripcion }}" required>
                    <label for="descriptionUpdate">Descripción: </label>
                    @error('descriptionUpdate')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <button class="btn btn-act-profile" type="submit">Actualizar</button>
                <button id="btnContinueForm" class="btn btn-conf-info" type="button">Configuración de información personal</button>
            </form>
        </div>
        <div class="formUpdate2">
            <form class="" action="{{ url('updateProfiles2/{dataForm2}') }}" method="POST">
                @csrf
                <div class="md-form">
                    <input name='emailUpdate' id='emailUpdate' type="email" 
                    class="form-control @error('emailUpdate') field-error @enderror"
                    value="{{ Session::get('usuario')->correo }}" required>
                    <label for="emailUpdate">Dirección de correo electrónico: </label>
                    @error('emailUpdate')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <!-- <div class="md-form">
                    <input name='phoneUpdate' id='phoneUpdate' type="text" 
                        class="form-control @error('phoneUpdate') field-error @enderror"
                        value="" 
                        minlength="10" maxlength="10" required>
                    <label for="phoneUpdate">Número de teléfono: </label>
                    @error('phoneUpdate')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div> -->
                <div class="md-form">
                    <select name="genderUpdate" 
                            class="form-control genero-r @error('correo') field-error @enderror" 
                            id="genderUpdate"" required>
                        <option value="H" {{ old('genderUpdate') == 'H' ? 'selected' : '' }}>Hombre</option>
                        <option value="M" {{ old('genderUpdate') == 'M' ? 'selected' : '' }}>Mujer</option>
                        <option value="T" {{ old('genderUpdate') == 'T' ? 'selected' : '' }}>Trans</option>
                    </select>
                    @error('genderUpdate')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="md-form">
                    <input name='dateUpdate' id='dateUpdate' type="date" 
                        class="form-control @error('correo') field-error @enderror"
                        value="{{ Session::get('usuario')->fecha_nacimiento }}" required>
                    <label for="dateUpdate">Fecha de Nacimiento: </label>
                    @error('dateUpdate')
                        <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <button class="btn btn-conf-info" type="submit">Actualizar</button>
            </form>
        </div>
    </form>
    </div>
</section>

@endsection
@section('javascript')
<script src="js/Look!/perfil.js"></script>
@endsection