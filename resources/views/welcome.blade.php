@extends('base/html')
@section('content')


    
    <!-- STYLES -->
        <!-- MDBootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/Look!/login.css">

    </head>
    <body>
        <section>
            <section class="wave-login">
                <div class="wave" style="height: 800px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M208.09,0.00 C152.69,66.92 262.02,75.78 200.80,149.60 L-0.00,149.60 L-0.00,0.00 Z" style="stroke: none; fill: #00B4DB;"></path></svg></div>
            </section>

            <section class="login">
                <div class="container container-login">
                    <!-- Material form login -->
                    
                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="{{ url('/verificar-usario') }}">
                            <!-- Email -->
                            <div class="md-form">
                                <input name="correo" type="email" id="materialLoginFormEmail" class="form-control">
                                <label for="materialLoginFormEmail">Usuario o correo electrónico</label>
                            </div>
                            <!-- Password -->
                            <div class="md-form">
                                <input name="password" type="password" id="materialLoginFormPassword" class="form-control">
                                <label for="materialLoginFormPassword">Contraseña</label>
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
                            <button class="btn btn-login btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Acceder</button>
                            <!-- Register -->
                            <!-- <p>Not a member?
                                <a href="">Register</a>
                            </p> -->
                            <!-- Social login -->
                            <!-- <p>or sign in with:</p> -->
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
            </section>
        </section>

<!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

    </body>
</html>

@endsection

