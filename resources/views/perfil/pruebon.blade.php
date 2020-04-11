   <div class="col-lg-4 col-md-12 mb-4">
          <!--Card-->
          <div class="card card-cascade wider mb-4">
      
            <!--Card image-->
            <input type="hidden" value="{{ $item->id }}">
            <div class="view view-cascade">
              <a class="myBox" href="{{ $item->imagen }}" data-lcl-txt="Description" author="{{ session::get('usuario')->usuario }}">
                <img src="{{ $item->imagen }}" class="card-img-top" style="height:200px">
              </a>
              
            </div>
            <!--/Card image-->
      
            <!--Card content-->
            <div class="card-body card-body-cascade text-center">
              <!--Title-->
              <h4 class="card-title"><strong>{{ session::get('usuario')->usuario }}</strong></h4>
              <h5 class="indigo-text"><strong>{{ session::get('usuario')->nombres.' '.session::get('usuario')->apellidos }}</strong></h5>
      
              <p class="card-text">Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque
                laudantium, totam
                rem aperiam.
              </p>
      <hr>
              <a class=""><i class="far fa-comment"></i></a>
              <a class=""><i class="far fa-heart"></i></a>
              <!--Dribbble-->
              <a class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a>
      
            </div>
            <!--/.Card content-->
      
          </div>
          
          <!--/.Card-->
        </div>