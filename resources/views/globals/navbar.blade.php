<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand logo" href="/"><img src="{{ asset('img/logo.png')}}" class="logo-img" alt=""></div></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto nav-links">
      <li class="nav-item nav-lines">
        <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item nav-lines">
        <a class="nav-link" href="/acerca-de">Acerca de</a>
      </li>
      <li class="nav-item nav-lines">
        <a class="nav-link" href="/servicios" tabindex="-1" aria-disabled="true">Servicios</a>
      </li>
      <li class="nav-item nav-lines">
        <a class="nav-link disabled" href="/casos-exito" tabindex="-1" aria-disabled="true">Casos de exito</a>
      </li>
    </ul>
  </div>
</nav>


<script>

$(document).ready(function(){
  var cambio = false;
    $('.nav-lines a').each(function(index) {
      if(this.href.trim() == window.location){
        $(this).parent().addClass("active");
        cambio = true;
      }
    });
    if(!cambio){
      $('.nav li:first').addClass("active");
    }
});
 </script>