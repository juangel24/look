@extends('layout.base')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/Look!/home.css') }}">
    <style>
        .as {
            margin-top: 3rem;
        }

        .publicacion {
            /*background: wheat;*/
            margin-bottom: 2rem;

        }

        /*.infotmacion {
            background: wheat;
        }*/

        .estado {
            margin: 0px;
            padding: 0px;
        }
    </style>
@endsection

@section('content')
<section class="as">
    <div class="container ">
        <div class="row">
            <div class="col-md-9 col-sm-12">

                @foreach($fo as $fo)
                <div class="col-10">
                    <!--https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg -->


                    <div class="col-12">
                        <div
                            class="row infotmacion border-top border-default border-left border-default border-right border-default">
                            <div class="col-3">
                                <img class="d-flex mr-3" id="fotodeperfil" src="{{ asset($fo['usuario']->imagen) }}"
                                    style="display:block; height:80px;width:80px;border-radius:60%;">
                            </div>
                            <div class="col-7">
                                <h5><a href="/profile/{{$fo['usuario']->usuario}}" class="font-weight-bold bold"
                                        style="color:gray;">{{$fo['usuario']->usuario}} </a></h5>
                                <h5><a href="/profile/{{$fo['usuario']->usuario}}"
                                        class="text-default">{{$fo['usuario']->descripcion}} </a></h5>
                            </div>

                        </div>
                    </div>
                    <div class="text-center border border-default">

                        <!-- ################################################### -->
                        <div class="publicacion border border-top-0 ">
                            <div class=" foto">
                                <figure class="figure">
                                    <img src="{{$fo->imagen}}" class="figure-img img-fluid rounded"
                                        alt="A generic square placeholder image with rounded corners in a figure.">
                                </figure>
                            </div>
                            <div class="d-flex flex-row" style="margin-left:30px;">
                                <a class="" href="/visita/{{$fo['usuario']->id}}">
                                    <h5 class="font-weight-bold" style="color:gray;">{{ $fo['usuario']->usuario}}</h5>
                                </a>
                                <h5 style="margin-left:50px;color:#212121">{{ $fo->descripcion }}</h5>

                            </diV>
                            <div class="inreta ">

                                <span class="input-group-btn">

                                    {{csrf_field()}}
                                    <input id="id" class="idimagen" type="text" value="{{$fo->id}}" hidden>
                                    <input id="can" class="can" type="text" value="{{$fo->can}}" hidden>
                                    <figcaption class="figure-caption">
                                        <button class="btn btn-link verlikes" value="{{$fo->id}}" data-toggle="modal"
                                            data-target="#exampleModal1" data-whatever="@mdo">

                                            {{$fo->likes}} likes

                                        </button>
                                    </figcaption>


                                    @if($fo->can=="si")
                                    <button type="button" class="btn btn-default btn-like" val="like">
                                        <p class="estado">like!</p>
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-default btn-like" val="like">
                                        <p class="estado">dislike!</p>
                                    </button>
                                    @endif
                                    <button type="button" class="btn btn-default btn-comentario" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo">comentario!</button>
                                </span>
                            </div>
                        </div>
                        <!-- ################################################### -->

                    </div>


                </div>
                <br><br><br>
                @endforeach

            </div>
            <div class="col-md-3 d-md-block">
                <div class="overflow-auto">
                    <h5 class="font-weight-bold" style="color:gray">Sugerencias</h5>
                    @foreach($sugerencia as $sug)

                    <a href="/profile/{{$sug->usuario}}" style="color:#212121">{{$sug->usuario}} </a>
                    <hr class="text-default">
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    </div>
    </section>
    <!-- ################################################### -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cemn">

                    </div>

                </div>
                <div class="modal-footer">
                    <form>
                        {{csrf_field()}}

                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text" class="yeah"></textarea>
                        <button type="button" val="" class="btn btn-primary enviar">Send message</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ################################################### -->

    <!-- ################################################### -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Likes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cemn"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/Look!/searcherProfile.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.btn-like').click(function() {

                var token = $('input[name=_token]').val();
                var id = $(this).parent().find('.idimagen').val();
                var like = $(this).parent().find('.can').val();
                var est = $(this).parent().find('.estado');
                var v = $(this).val();
                console.log(est.html());
                var contenido = $(this).parent().find('.verlikes');;

                var s = 0;
                if (est.html() == "like!") {

                    $.ajax({
                        url: "/likes",
                        data: {
                            id: id,
                            _token: token,
                            usu: 1 //aqui lo cambiaremos por la variable id de la variable session like! dislike!
                        },
                        type: "POST",
                        datatype: "json",
                        success: function(response) {
                            contenido.html('');
                            console.log(response)
                            s = response.length
                            contenido.append(s + " likes");
                            est.html('');
                            est.append("dislike!");
                        }
                    });

                } else {

                    $.ajax({
                        url: "/dislike",
                        data: {
                            id: id,
                            _token: token,
                            usu: 1 //aqui lo cambiaremos por la variable id de la variable session like! dislike!
                        },
                        type: "POST",
                        datatype: "json",
                        success: function(response) {
                            contenido.html('');
                            console.log(response)
                            s = response.length
                            contenido.append(s + " likes");
                            est.html('');
                            est.append("like!");
                        }
                    });

                }
            });

            $('.enviar').click(function() {

                var token = $('input[name=_token]').val();
                var id = $(".enviar").val();
                var te = $("#message-text").val();
                var usu = 1;
                var e = "";
                var contenido = $('.cemn');

                console.log(te);
                $.ajax({
                    url: "/enviar",
                    data: {
                        id: id,
                        _token: token,
                        commen: te,
                        usu: usu
                    },
                    type: "POST",
                    datatype: "json",
                    success: function(response) {
                        contenido.html('');
                        console.log(response)
                        $.each(response, function(i, v) {
                            contenido.append('<h5><a href="/profile/' +  v.usuario['usuario'] + '">' + v.usuario['usuario'] + '</a></h5>' +
                                '<p>' + v.comentario + '</p>' +
                                '<hr>');
                        });

                    }
                });
            });

            $('.btn-comentario').click(function() {

                var token = $('input[name=_token]').val();
                var id = $(this).parent().find('.idimagen').val();
                var coms = $(".coms")
                coms.html('');
                console.log(id)
                var contenido = $('.cemn');
                contenido.html('');
                $(".enviar").val(id);
                $.ajax({
                    url: "/coment",
                    data: {
                        id: id,
                        _token: token
                    },
                    type: "POST",
                    datatype: "json",
                    success: function(response) {
                        console.log(response)
                        $.each(response, function(i, v) {
                            contenido.append('<h5><a href="/profile/' +v.usuario['usuario'] + '">' + v.usuario['usuario'] + '</a></h5>' +
                                '<p>' + v.comentario + '</p>' +
                                '<hr>')
                        });
                    }
                });



            });

            $('.verlikes').click(function() {
                var ss = $(this).parent().find('.verlikes').val();
                var token = $('input[name=_token]').val();
                var id = $(this).parent().find('.idimagen').val();
                console.log(id, ss)
                var contenido = $('.cemn');
                contenido.html('');
                $(".enviar").val(ss);
                $.ajax({
                    url: "/verlikes",
                    data: {
                        id: ss,
                        _token: token
                    },
                    type: "POST",
                    datatype: "json",
                    success: function(response) {
                        console.log(response)
                        $.each(response, function(i, v) {

                            contenido.append('<h5><a href="/profile/' + v.megusta1['usuario']+ '">' + v.megusta1['usuario'] + '</a></h5>' +
                                '<hr>')
                        });
                    }
                });


            });


        });
    </script>
@endsection
