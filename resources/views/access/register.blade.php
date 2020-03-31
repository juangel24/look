@extends('base/html_initial')
@section('title', 'Look! | Registrarse')
@section('css')
    <link rel="stylesheet" href="css/Look!/register.css">
@endsection
    <section>
        <section class="wave-register">
            <div class="wave-r" style="height: 800px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M213.19,-0.00 C152.69,69.86 270.04,69.86 202.98,149.60 L500.00,149.60 L500.00,-0.00 Z" style="stroke: none; fill: #00B4DB;"></path></svg></div>
        </section>

        <section class="register">
            <div class="container container-register">
                <!-- Material form login -->
                    <p class="h4 mb-4 text-center mt-0">Sign up</p>
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{ url('/registerdata') }}" method="GET">
                    @if(Session::has('repeatUser'))
                        <div class="no-user error mb-4">Ya existe un usuario registrado con ese correo</div>
                    @endif
                        <!-- First and Last Name -->
                        <div class="form-row">
                            <div class="col">
                                <!-- First name -->
                                <div class="md-form mt-0">
                                    <input name="first_name" type="text" id="materialRegisterFormFirstName" 
                                    class="form-control @error('correo') field-error @enderror"
                                    value="{{ old('first_name') }}">
                                    <label for="materialRegisterFormFirstName">First name</label>
                                    @error('first_name')
                                        <div class="error"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <div class="md-form mt-0">
                                    <input name="last_name" type="text" id="materialRegisterFormLastName" 
                                    class="form-control @error('correo') field-error @enderror"
                                    value="{{ old('last_name') }}">
                                    <label for="materialRegisterFormLastName">Last name</label>
                                    @error('last_name')
                                        <div class="error"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="md-form mt-0">
                            <input name="correoR" type="email" id="materialLoginFormEmail-register" 
                            class="form-control @error('correo') field-error @enderror"
                            value="{{ old('correoR') }}">
                            <label for="materialLoginFormEmail-register">Correo electrónico</label>
                            @error('correoR')
                                <div class="error"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="md-form mt-0">
                            <input name="user" type="text" id="materialLoginFormEmail-register" 
                            class="form-control @error('user') field-error @enderror"
                            value="{{ old('user') }}">
                            <label for="materialLoginFormEmail-register">Usuario</label>
                            @error('user')
                                <div class="error"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="md-form mt-0">
                            <input name="passwordR" type="password" id="materialLoginFormPassword-register" 
                            class="form-control @error('correo') field-error @enderror">
                            <label for="materialLoginFormPassword-register">Contraseña</label>
                            @error('passwordR')
                                <div class="error"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- Confirm Password -->
                        <div class="md-form mt-0">
                            <input name="confirmPasswordR" type="password" 
                            id="materialLoginFormPasswordConfirm-register" 
                            class="form-control @error('correo') field-error @enderror">
                            <label for="materialLoginFormPasswordConfirm-register">Confirmar Contraseña</label>
                            @error('confirmPasswordR')
                                <div class="error"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- Date and Gender -->
                        <div class="form-row">
                            <div class="col-8">
                                <!-- First name -->
                                <div class="md-form mt-0">
                                    <input placeholder="Fecha de Nacimiento" name="date" 
                                    class="datepicker date @error('correo') field-error @enderror" 
                                    data-date-format="yyyy/mm/dd"
                                    value="{{ old('date') }}">
                                    @error('date')
                                        <div class="error"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Last name -->
                                <div class="md-form mt-0">
                                    <select name="gender" 
                                    class="form-control genero-r @error('correo') field-error @enderror" 
                                    id="">
                                        <option value="" selected>Género</option>
                                        <option value="H" {{ old('gender') == 'H' ? 'selected' : '' }}>Hombre</option>
                                        <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Mujer</option>
                                        <option value="T" {{ old('gender') == 'T' ? 'selected' : '' }}>Trans</option>
                                    </select>
                                    @error('gender')
                                        <div class="error"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <!-- <div> -->
                                <!-- Remember me -->
                                <!-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                                    <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                                </div>
                            </div>
                            <div> -->
                            <!-- Forgot password -->
                            <!-- <a href="">Forgot password?</a>
                            </div> -->
                        </div>

                        <!-- Sign in button -->
                        <button class="btn btn-register btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Registrar</button>
                        <!-- Social login -->
                        <p>o registrate a través de:</p>
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
                        </a>

                    </form>
                    <!-- Form -->

                <!-- Material form login -->
            </div>

            <div class="wave-r-m" style="height: 70px;overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-0.00,49.85 C150.00,149.60 271.37,-49.87 500.00,49.85 L500.00,0.00 L-0.00,0.00 Z" style="stroke: none; fill: #00B4DB;"></path></svg></div>
        </section>
        @section('scripts')
            $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
        @endsection
    </section>