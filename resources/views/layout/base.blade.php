<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @yield('css')

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css"
        integrity="sha256-+iogSQQebNm3dRNrrJiTa1ETQGIL+smA6rL+umhEvrQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="{{ asset('/css/Look!/home.css') }}">
</head>

<body>
    <header>
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark default-color">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="/home">
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
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="/home"><i class="fas fa-home fa-lg"></i></a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-globe fa-lg"></i></a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="chat"><i class="fas fa-comment fa-lg"></i></a>
                        </li>
                    </ul>

                    <!-- Search form -->
                    <ul class="justify-content-center ul-search">
                        <form class="form-inline" action="{{ url('searchProfile') }}" method="GET"
                            onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                            <input class="form-control form-control-sm mr-2 w-75" type="search" placeholder="Buscar"
                                name="searchProfile" aria-label="Buscar" id="searchProfile">
                            <i class="fas fa-search white-text" aria-hidden="true"></i>
                        </form>
                    </ul>



                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item dropdown avatar">
                            <a class="nav-link dropdown-toggle p-0" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset(Session::get('usuario')->imagen)}}"
                                     class="rounded-circle z-depth-0" alt="avatar image" height="35" width="35" >
                            </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                        aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="/profile">Perfil</a>
                            <a class="dropdown-item" href="/logout">Salir</a>
                        </div>
                    </li>
                    </ul>
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        <!--/.Navbar-->
    </header>
    <!-- OBTAIN THE USER LOGGED -->
    <input type="hidden" id="obtenerUsuarioOjb" value="{{ Session::get('usuario')->id }}">
    <!-- PRINT PROFILE SEARCHED -->
    <section>
        <div class="print-profileSearch">
            <div id="printProfileSearched"></div>
        </div>
    </section>

    <div class="container-fluid" id="container" style="padding-top: 5rem;">
        @yield('content')
    </div>

    <!-- jQuery y Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/js/mdb.min.js"
        integrity="sha256-R/XsWrXe04gYQmFYf8lc7jMaga8aLyzmGxWpaqbC+K8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script type="text/javascript">
        // Definición de variables/metodos globales
        window.user_id = $('#obtenerUsuarioOjb').val();
        window.receiver_id = '';

        var pusher = new Pusher('c3136ce130df8039ac5b', {
            cluster: 'us3',
            forceTLS: true
        });
        var channel = pusher.subscribe('look');
        var path = window.location.pathname;
        var contactsContainer = $('#contacts-container');

        channel.bind('chat', function(data) {
            if (user_id == data.from) {
                if (path == '/chat')
                    contactsContainer.find("[data-id='"+ receiver_id +"']").click();
            }
            else {
                $.each(data.to, function(i, to) {
                    if (user_id == to) {
                        if (receiver_id == data.from) {
                            if (path == '/chat')
                                contactsContainer.find("[data-id='"+ receiver_id +"']").click();
                        }
                        else {
                            Toastify({
                                text: "Tienes un mensaje",
                                duration: 5000,
                                destination: "/chat",
                                newWindow: true,
                                close: true,
                                gravity: "top", // `top` or `bottom`
                                position: 'right', // `left`, `center` or `right`
                                backgroundColor: "#00695c",
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                onClick: function(){} // Callback after click
                            }).showToast();

                            updateContacts();
                        }

                        return false;
                    }
                });
            }
        });

        function updateContacts() {
            if (path != '/chat')
                return null;

            $.get('get-contacts', function(contacts) {
                html = '';

                $.each(contacts, function(id, user) {
                    html += '<div class="d-flex justify-content-between p-2 align-items-center contact-badge hoverable user" data-id="'+user.id+'">'+
                        '<div class="d-flex flex-row align-items-center">'+
                            '<img class="contact-img mx-2 p-0 rounded-circle z-depth-0" alt="avatar image" src="'+user.imagen+'" width="35" height="35">'+
                            '<div class="d-flex flex-column">'+
                                '<p class="contact-username mb-0">'+user.usuario+'</p>'+
                                '<small>Te envió un mensaje</small>'+
                            '</div>'+
                        '</div>'+
                        '<span class="badge badge-pill badge-default mr-2 no-read" style="'+((user.not_read == 0) ? 'display: none;' : '')+'">'+user.not_read+'</span>'+
                    '</div>'
                });

                contactsContainer.html(html);
            });
        }
    </script>

    <script src="{{ asset('js/Look!/searcherProfile.js') }}"></script>
    @yield('javascript')
</body>

</html>
