<div class="col-12 ">
                        <!--https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg -->

                        <div class="col-12">
                            <div class="row infotmacion">
                                <div class="col-3">
                                    <img class="d-flex mr-3" id="fotodeperfil" src="{{ asset($fo['usuario']->imagen) }}" style="display:block; height:100px;width:100px;border-radius:60%;">
                                </div>
                                <div class="col-7">
                                    <h5><a href="/visita/{{$fo['usuario']->id}}">{{$fo['usuario']->usuario}} </a></h5>
                                </div>

                            </div>
                        </div>
                        <div class="text-center ">

                            <!-- ################################################### -->
                            <div class="publicacion border border-top-0 ">
                                <div class=" foto">
                                    <figure class="figure">
                                        <img src="{{$fo->imagen}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                                    </figure>
                                </div>
                                <div class="inreta ">

                                    <span class="input-group-btn">
                                        {{csrf_field()}}
                                        <input id="id" class="idimagen" type="text" value="{{$fo->id}}" hidden>
                                        <input id="can" class="can" type="text" value="{{$fo->can}}" hidden>
                                        <figcaption class="figure-caption">
                                            <button class="btn btn-link verlikes" value="{{$fo->id}}" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">

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





                                        <button type="button" class="btn btn-default btn-comentario" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">comentario!</button>

                                    </span>
                                    <figcaption class="figure-caption">{{$fo->descripcion}}</figcaption>

                                </div>
                            </div>
                            <!-- ################################################### -->

                        </div>

                    </div>