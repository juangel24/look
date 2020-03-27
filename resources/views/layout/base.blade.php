<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Look</title>

    @yield('css')
	<link rel="stylesheet" href="css/Look!/perfil.css">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark default-color">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">
                    <img src="/img/white_logo.png" height="30" alt="Look">
                </a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav w-100 justify-content-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><i class="fas fa-home fa-lg"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-globe fa-lg"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-comment fa-lg"></i></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item avatar">
                            <a class="nav-link p-0" href="#">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg"
                                    class="rounded-circle z-depth-0" alt="avatar image" height="35">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        <!--/.Navbar-->
    </header>

    <div class="container-fluid mt-3" id="container">
        @yield('content')
    </div>

    <!-- jQuery y Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>

    <script type="text/javascript">
        $("body").tooltip({
			selector: '[data-toggle=tooltip]'
		});

    </script>
    @yield('javascript')
</body>

</html>
