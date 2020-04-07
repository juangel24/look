<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- LINKS -->

    <!-- STYLES -->
         <!-- MDBootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/Look!/login.css">
    <link rel="stylesheet" href="css/Look!/perfil.css">
    <link rel="stylesheet" href="css/Look!/register.css">

   <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

    <!-- LIBRERIES -->
 <!-- STYLES -->
        <!-- MDBootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mdb.min.css">
        <link rel="stylesheet" href="css/style.css">
    

    <!-- SCRIPTS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

    <title>Look!</title>
</head>
<body id="portada">
    @include('globals.navbar')
        <!-- <main class="py-4"> -->
            <div class="">
                @yield('content')
            </div>
        <!-- </main> -->
        
<!-- End your project here-->

  

    </body>
</html>