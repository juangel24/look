<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Look</title>

    @yield('css')


    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('/css/Look!/login.css') }}">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link p-0" href="/profile">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0" alt="avatar image" height="35">
                            </a>
                        </li>
                    </ul>

                    <!-- Search form -->
                    <form class="form-inline ml-auto" action="{{ url('searchProfile') }}" method="GET" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
                        <input class="form-control form-control-sm mr-2 w-75" type="search" placeholder="Search" name="searchProfile" aria-label="Search" id="searchProfile">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </form>
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        <!--/.Navbar-->
    </header>

    <body>
        <!-- PRINT PROFILE SEARCHED -->
        <section>
            <div class="print-profileSearch">
                <div id="printProfileSearched"></div>
            </div>
        </section>
    </body>

    <!-- jQuery y Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>


    <script>
        $('#searchProfile').on('keyup', function(e) {
            e.preventDefault();
            $value = $('#searchProfile').val();
            console.log($value);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'searchProfile',
                method: 'GET',
                data: {
                    'search': $value
                },
                success: function(data) {
                    if ($value != "") {
                        $('#printProfileSearched').html("");
                        $.each(data, function(key, item) {
                            $html = " <a class='searchProfile' href=''> " +
                                " <div class='sProfile'> " +
                                " <ul class='listSearchProfile'> " +
                                " <li class='li-search-profile'><img class='img-search-profile' src='" + item.imagen + "' alt=''></li> " +
                                " <li class='li-search-profile'><p> " + item.nombres + item.apellidos + " </p></li> " +
                                " </ul> " +
                                " </div> " +
                                " </a> ";
                            console.log($html);
                            $('.print-profileSearch').css("display", "block");
                            $('#printProfileSearched').append($html);
                        })
                    } else {
                        $('.print-profileSearch').css("display", "none");
                    }
                },
                error: function() {
                    alert("No se ha podido obtener la información");
                }
            });
        });
    </script>
    <section class="as">
        <div class="container ">
            <div class="row">
                <div class="col-9 ">
                    <!--https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg -->
                    <div class="text-center ">
                        <div class="publicacion border border-top-0 ">
                            <div class=" foto">
                                <figure class="figure">
                                    <img src="https://a.wattpad.com/cover/164613855-288-k229076.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                                    <input id="id" class="likes" type="text" value="0">
                                </figure>
                            </div>
                            <div class="inreta ">

                                <span class="input-group-btn">
                                    {{csrf_field()}}
                                    <input id="id" class="idimagen" type="text" value="1" hidden>
                                    <button type="button" class="btn btn-default btn-like">like!</button>
                                    <button type="button" class="btn btn-default">stop!</button>



                                </span>
                                <figcaption class="figure-caption">A caption for the above image.</figcaption>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-3">
                    <h5>asd</h5>
                </div>

            </div>
        </div>
    </section>

</body>
<style>
    .as {
        margin-top: 3rem;
    }

    .publicacion {
        background: wheat;

    }
</style>
<script>
    $(document).ready(function() {
        $('.btn-like').click(function() {

            var token = $('input[name=_token]').val();
            var id = $(this).parent().find('.idimagen').val();

            $.ajax({
                url: "/likes",
                data: {
                    id: id,
                    _token: token
                },
                type: "POST",
                datatype: "json",
                success: function(response) {
                    console.log(Object.keys(response).length)
                    var cantidad = $('.likes').val();
                    var auxi = 1;
                    var sum = parseFloat(cantidad) + parseFloat(auxi);
                    $('.likes').val(sum);

                }
            });


        });
    });
</script>

</html>