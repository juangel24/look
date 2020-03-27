<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- LINKS -->
    <link rel="stylesheet" href="css/loading.css">

    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800&display=swap">

    <!-- LIBRERIES -->
 <!-- STYLES -->
        <!-- MDBootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mdb.min.css">
        <link rel="stylesheet" href="css/style.css">
    

    <!-- SCRIPTS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    
    <script src=""></script>
    

    <title>Look!</title>
</head>
<body id="portada">
    @include('globals.navbar')
        <!-- <main class="py-4"> -->
            <div class="">
                @yield('content')
            </div>
        <!-- </main> -->
        
</body>
</html>