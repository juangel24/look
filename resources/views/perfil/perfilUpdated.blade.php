@extends('layout.base')
@section('title', 'Look! | Actualizar Perfil')
@section('css')
<link rel="stylesheet" href="css/Look!/perfil.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
@endsection
@section('content')

<section>

    <div class="container updatedProfile">
        <a id="hrefArrow" href="/profile">
            <i data-toggle="tooltip" data-placement="top" title="" id="" class="fas fa-angle-left" data-original-title="Actualizar perfil"></i>
        </a>
    <form class="" action="{{ url('updateProfiles') }}" method="GET">
        <a id="arrow" href="#">
            <i data-toggle="tooltip" data-placement="top" title="" id="" class="arrow fas fa-angle-left" data-original-title="Regresar"></i>
        </a>
        @if(Session::has('repeatedEmail'))
            <div class="no-user-updated error">El correo que ingresó ya está registrado, intente con otro</div>
        @endif
        <div class="formUpdate1">
            <img class="fotodeperfil" src="{{$usuario->imagen}}">
            <div class="md-form">
                <input name='firstNameUpdate' id='firstNameUpdate' type="text" 
                    class="form-control @error('firstNameUpdate') field-error @enderror"
                    value="{{ old('firstNameUpdate') }}">
                <label for="firstNameUpdate">Nombres: </label>
                @error('firstNameUpdate')
                    <div class="error"> {{ $message }} </div>
                @enderror
            </div>
            <div class="md-form">
                <input name='lastnameupdate' id='lastnameupdate' type="text" 
                class="form-control @error('lastnameupdate') field-error @enderror"
                value="{{ old('lastnameupdate') }}">
                <label for="lastnameupdate">Apellidos: </label>
                @error('lastnameupdate')
                    <div class="error"> {{ $message }} </div>
                @enderror
            </div>
            <div class="md-form">
                <input name='userUpdated' id='userUpdated' type="text" 
                    class="form-control @error('userUpdated') field-error @enderror"
                    value="{{ old('userUpdated') }}">
                <label for="userUpdated">Usuario: </label>
                @error('userUpdated')
                    <div class="error"> {{ $message }} </div>
                @enderror
            </div>
            <div class="md-form">
                <input name='descriptionUpdate' id='descriptionUpdate' type="text" 
                    class="form-control @error('descriptionUpdate') field-error @enderror"
                    value="{{ old('descriptionUpdate') }}">
                <label for="descriptionUpdate">Descripción: </label>
                @error('descriptionUpdate')
                    <div class="error"> {{ $message }} </div>
                @enderror
            </div>
            <button class="btn btn-conf-info" type="button">Configuración de información personal</button>
        </div>
        <div class="formUpdate2">
            <div class="md-form">
                <input name='emailUpdate' id='emailUpdate' type="email" 
                class="form-control @error('emailUpdate') field-error @enderror"
                value="{{ old('emailUpdate') }}">
                <label for="emailUpdate">Dirección de correo electrónico: </label>
                @error('emailUpdate')
                    <div class="error"> {{ $message }} </div>
                @enderror
            </div>
            <div class="md-form">
                <input name='phoneUpdate' id='phoneUpdate' type="text" 
                    class="form-control @error('phoneUpdate') field-error @enderror"
                    value="{{ old('phoneUpdate') }}" maxlength="10">
                <label for="phoneUpdate">Número de teléfono: </label>
                @error('phoneUpdate')
                    <div class="error"> {{ $message }} </div>
                @enderror
            </div>
            <div class="md-form">
                <select name="genderUpdate" 
                        class="form-control genero-r @error('correo') field-error @enderror" 
                        id="genderUpdate"">
                    <option value="" selected disabled>Género</option>
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
                    value="{{ old('dateUpdate') }}">
                <label for="dateUpdate">Fecha de Nacimiento: </label>
                @error('dateUpdate')
                    <div class="error"> {{ $message }} </div>
                @enderror
            </div>
            <button class="btn btn-conf-info" type="submit">Actualizar</button>
        </div>


    </form>
    </div>

</section>

@endsection
@section('javascript')
<script src="js/Look!/perfil.js"></script>
@endsection