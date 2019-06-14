<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>COMERCIALIZADORA GRECO</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('nuevos/vendor/bootstrap/css/bootstrap.min.css')}}">

  <!-- Custom fonts for this template -->
  <link href="{{asset('nuevos/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('/nuevos/css/agency.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <img width="50" height="50" src="nuevos/img/2847e4bf-9cf9-4379-889d-c9c5c7fc700c.jpg">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">GRECO</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <!--
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#sesion">Iniciar Sesión</a>
              </li>
-->
<li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="vistaprincipal">Menu Principal</a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="limpieza  ">Limpieza</a>
          </li>

<li class="nav-item">
<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Inicio Sesion
</button>
</li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>

  <header class="masthead">

    <div class="slider">
      <link href="{{asset('Carrusel/css/slider.css')}}" rel="stylesheet">

      <ul>
        <li><img width="350" height="550" src="Carrusel/img/seguridad-industrial-inicio.jpg" alt=""></li>
        <li><img width="350" height="550" src="Carrusel/img/depositphotos_104906074-stock-photo-safety-industrial-and-construction-equipment.jpg" alt=""></li>
        <li><img width="350" height="550" src="Carrusel/img/salud_seguridad-e1383914561518.jpg" alt=""></li>
        <li><img width="350" height="550" src="Carrusel/img/esp_higiene.jpg" alt=""></li>
      </ul>
    </div>

    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Productos de Seguridad</h2>
            <h3 class="section-subheading text-muted">Encontraras algunas imagenes y caracteristicas de los 
            productos.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img width="350" height="350" class="img-fluid" src="nuevos/img/portfolio/cascos-de-seguridad-industrial-we.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Cascos</h4>
              <p class="text-muted">Equipo de Seguridad.</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img  class="img-fluid" style="width: 18rem;" src="nuevos/img/portfolio/guantes.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Guantes de Seguridad</h4>
              <p class="text-muted">Equipo de Seguridad.</p>
            </div>
          </div>

          
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img width="350" height="250" class="img-fluid" src="nuevos/img/portfolio/S-10493S-1.5.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Lentes Industrial</h4>
              <p class="text-muted">Equipo para limpieza.</p>
            </div>
          </div>
</section>
        <!-- Footer -->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <span class="copyright">Copyright &copy; Comercializadora Greco 2018</span>
              </div>
            </div>
          </div>
        </footer>

        <!-- Detalles de la Galeria -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Sesion -->
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Iniciar Sesión</h2>
          <h3 class="section-subheading text-muted">Aqui puedes Iniciar tu Sesión.</h3>
        </div>
      </div>
      <!-- comieza el codigo para el login-->
      <form action="{{route('validalogin')}}" method="POST">
                  {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                @if($errors->first('user'))
                  <i> {{ $errors->first('user') }} </i>
                  @endif <br>
                  Tecla usuario<input class="form-control" name="user" id="name" type="text" 
                  placeholder="Usuario*" required data-validation-required-message="ingrese el usuario.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                @if($errors->first('pasw'))
                  <i> {{ $errors->first('pasw') }} </i>
                  @endif <br>
                  teclea password<input class="form-control" id="email" name="pasw"
                   type="password" placeholder="Contraseña *"
                    required data-validation-required-message="Ingrese la contraseña.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" 
                type="submit" value="Iniciar sesion">Iniciar</button>
     <br>
          </form>
          @if(Session::has('error'))
              <div>{{Session::get('error')}}</div>
              <script>
                  alert("{{Session::get('error')}}");
              </script>
              @endif
        
              </div>
            </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

  <!-- Modal 1 -->
  <div class="modal fade bd-example-modal-xl" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Productos Seguridad Industrial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- Detalles de la imagen-->
              <div class="modal-body">
              <h2 ALIGN="center" class="text-uppercase">GRECO</h2>
              <p class="item-intro text-muted">Estos son algunos productos de Seguridad Industrial.</p>
              <p>Cascos de diferentes colores con cinta adaptable.</p>
              </div>
              <div class="card mx-auto " style="width: 18rem;">
                <img  class="img-fluid d-block mx-auto" src="nuevos/img/portfolio/cascos-de-seguridad-industrial-we.jpg" alt="">
                <br>
                <ul class="list-inline">
                  <li>Proveedor: Trupper.</li>
                  <li>Categoria: Equipo de Seguridad.</li>
                  <li>Precio: $ 350.00 M/N</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    <!-- Modal 2 -->
  <div class="modal fade bd-example-modal-xl" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Productos Limpieza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- Detalles de la imagen-->
              <div class="modal-body">
              <h2 ALIGN="center" class="text-uppercase">GRECO</h2>
              <p class="item-intro text-muted">Estos son algunos productos de Seguridad Industrial.</p>
              <p>Guantes termoelectricos diseñados para el uso industrial y electrico.</p>
              </div>
              <div class="card mx-auto " style="width: 18rem;">
                <img  class="img-fluid d-block mx-auto" src="nuevos/img/portfolio/guantes.jpg" alt="">
                <br>
                <ul class="list-inline">
                  <li>Proveedor: Trupper.</li>
                  <li>Categoria: Equipo de Seguridad.</li>
                  <li>Precio: $ 258.00 M/N</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
<!-- Modal 3  -->
<div class="modal fade bd-example-modal-xl" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Productos de Seguridad Industrial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!-- Detalles de la imagen-->
              <div class="modal-body">
              <h2 ALIGN="center" class="text-uppercase">GRECO</h2>
              <p class="item-intro text-muted">Estos son algunos productos de Seguridad Industrial.</p>
              <p>Lentes para el usu industrial diseñados con platico aprueva de rayones.</p>
              </div>
              <div class="card mx-auto " style="width: 18rem;">
                <img  class="img-fluid d-block mx-auto" src="nuevos/img/portfolio/S-10493S-1.5.jpg" alt="">
                <br>
                <ul class="list-inline">
                  <li>Proveedor: Trupper.</li>
                  <li>Categoria: Equipo de Seguridad Industrial.</li>
                  <li>Precio: $ 100.00 M/N</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('nuevos2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('nuevos2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('nuevos2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{asset('nuevos2/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('nuevos2/js/contact_me.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('nuevos2/js/agency.min.js')}}"></script>

</body>

</html>