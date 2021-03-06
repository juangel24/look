@extends('base.html')
@section('title', 'Look! | Iniciar Sesión')
@section('css')
    <link rel="stylesheet" href="css/Look!/login.css">
@endsection
    <section>
        <section class="wave-login">
            <div class="wave-l" style="overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M208.09,0.00 C152.69,66.92 262.02,75.78 200.80,149.60 L-0.00,149.60 L-0.00,0.00 Z" style="stroke: none; fill: #00B4DB;"></path></svg></div>
            <img class="logo" src="img/white_logo.png" alt="">
            <h1 class="title">Conoce gente <br> extraordinaria!</h1>
        </section>

        <section class="login">
            <div class="container container-login">
                <!-- Material form login -->
                    <p class="h4 mb-4 text-center">Inicio de sesión</p>
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{ url('/verificar-usario') }}" method="POST">

                    @if(Session::has('wrongPass'))
                        <div class="no-user error">Correo y/o contraseña incorrectas</div>
                    @endif

                    @if(Session::has('noUser'))
                        <div class="no-user error">No hay una cuenta registrada con ese correo</div>
                    @endif
                    
                    @csrf
                    <!-- Email -->
                    <div class="md-form">
                        <input name="correo" value="{{ old('correo') }}" 
                        type="text" id="materialLoginFormEmail" class="form-control @error('correo') field-error @enderror">
                        <label for="materialLoginFormEmail">Usuario o correo electrónico</label>
                        @error('correo')
                            <div class="error"> {{ $message }} </div>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div class="md-form">
                        <input name="password" type="password" id="materialLoginFormPassword" class="form-control">
                        <label for="materialLoginFormPassword">Contraseña</label>
                        @error('password')
                            <div class="error"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-around">
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-login btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Acceder</button>
                    <!-- Register -->
                    <p>No estas registrado?
                        <a class="urlRegister" href="{{ url('/register') }}">Registrar</a>
                    </p>
                    <!-- Social login -->
                    <!-- <p>o accede a través de:</p>
                    <a type="button" class="btn-floating btn-fb btn-sm">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-tw btn-sm">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a type="button" class="btn-floating btn-li btn-sm">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a type="button" class="btn-floating btn-git btn-sm">
                        <i class="fab fa-github"></i>
                    </a> -->

                    </form>
                    <!-- Form -->

                <!-- Material form login -->
            </div>

            <div class="wave-l-m" style="overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-79.91,61.30 C150.00,149.60 349.20,-49.87 637.35,125.28 L500.00,149.60 L-0.00,149.60 Z" style="stroke: none; fill: #00B4DB;"></path></svg></div>
        </section>
    </section>


