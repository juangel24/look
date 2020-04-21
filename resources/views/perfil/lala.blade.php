<input type="hidden" value="{{ $item->id }}" name="id_post" id="id_post">
                  <div class="view overlay" data-postid="{{ $item->id }}">
                    <a class="myBox" data-target="#imagemodal{{ $item->id }}" data-toggle="modal" id="imgmodal">
                      <img src="{{ asset("$item->imagen ")}}" class="card-img-top" style="height:270px;" id="imgpost">
                      <div class="mask flex-center rgba-black-light">
                       <i class="fas fa-heart fa-lg white-text pr-3"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-comment fa-lg white-text pr-3" style="margin-left:20px;"></i>
                      </div>
                    </a>
                  </div>
                    @csrf
                    <div class="modal fade" id="imagemodal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="spanclose">&times;</span>
                      </button>
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content post">
                        <div class="modal-body">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-5">
                                  <img src="{{ asset("$item->imagen ")}}" class="img-fluid imagepost" id="imagepost">
                                </div>
                                <div class="col-md-7 scrollable border border-default" id="div-comments-posts" data-postid="{{ $item->id }}">
                                  <div class="d-flex justify-content-between align-items-center border-bottom border-default p-3 comment-header">
                                    <div class="d-flex flex-row">
                                        <a class="p-0 waves-effect waves-light" href="/profile">
                                            <img class="rounded-circle z-depth-0" src="{{ $usuario->imagen }}" width="35" height="35">
                                        </a>
                                        <h5 class="ml-2 mb-0 align-self-center">{{ session::get('usuario')->usuario }}</h5>
                                      
                                      </diV>
                                  <a class="waves-effect waves-light dropdown-toggle text-default mr-4" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    {{--<i class="fas fa-ellipsis-h text-default fa-2x"></i>  --}}
                                   </a>
                                  <div class="dropdown-menu">
                                    <button class="dropdown-item" onclick="deletepost();">Eliminar</button>
                                  
                                   </div>

                                  </div>
                                <div class="d-flex flex-row align-items-center" id="comment" >
                                  <div class="md-form border-top border-default comment-header">
                                        <input name="comment_content"  id="comment_content" placeholder="Escribe tu comentario aquí..." type="text" class="form-control">
                                    </div>
                                    <a id="icon-send-comment" class="button waves-effect waves-light"  type="submit"><i class="fas fa-paper-plane text-default fa-2x"></i></a>
                                </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- Card -->