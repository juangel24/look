@extends('base/html_initial')
    <section>
        <section class="wave-register">
            <div class="wave-r" style="height: 800px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M213.19,-0.00 C152.69,69.86 270.04,69.86 202.98,149.60 L500.00,149.60 L500.00,-0.00 Z" style="stroke: none; fill: #00B4DB;"></path></svg></div>
        </section>

        <section class="register">
            <div class="container container-register">
                <!-- Material form login -->
                    <p class="h4 mb-4 text-center mt-0">Sign up</p>
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{ url('/register') }}" method="GET">
                        <!-- First and Last Name -->
                        <div class="form-row">
                            <div class="col">
                                <!-- First name -->
                                <div class="md-form mt-0">
                                    <input name="first_name" type="text" id="materialRegisterFormFirstName" class="form-control">
                                    <label for="materialRegisterFormFirstName">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <div class="md-form mt-0">
                                    <input name="last_name" type="text" id="materialRegisterFormLastName" class="form-control">
                                    <label for="materialRegisterFormLastName">Last name</label>
                                </div>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="md-form mt-0">
                            <input name="correoR" type="email" id="materialLoginFormEmail-register" class="form-control">
                            <label for="materialLoginFormEmail-register">Correo electrónico</label>
                        </div>
                        <!-- Password -->
                        <div class="md-form mt-0">
                            <input name="passwordR" type="password" id="materialLoginFormPassword-register" class="form-control">
                            <label for="materialLoginFormPassword">Contraseña</label>
                        </div>
                        <!-- Confirm Password -->
                        <div class="md-form mt-0">
                            <input name="confirm-passwordR" type="password" id="materialLoginFormPasswordConfirm-register" class="form-control">
                            <label for="materialLoginFormPasswordConfirm-register">Confirmar Contraseña</label>
                        </div>
                        <!-- Date and Gender -->
                        <div class="form-row">
                            <div class="col">
                                <!-- First name -->
                                <div class="md-form">
  <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker">
  <label for="date-picker-example">Try me...</label>
</div>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <select class="mdb-select md-form mt-0">
                                    <option value="" disabled selected>¿Qué es usted?</option>
                                    <option value="H">Hombre</option>
                                    <option value="M">Mujer</option>
                                    <option value="T">Trans</option>
                                </select>
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
    </section>


<script>
    $('.datepicker').pickadate({
weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
showMonthsShort: true
})
</script>