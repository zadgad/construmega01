<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ConstruMEGA_System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{asset('plantillas/img/syste.jpg')}}" rel="icon">
    <link href="{{asset('plantillas/img/system.jpg')}}" rel="apple-touch-icon">
    @section('links')
      @parent
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    @endsection
    <link href="{{asset('plantillas/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('plantillas/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('plantillas/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantillas/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('plantillas/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('plantillas/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('plantillas/css/sweetalert2.css')}}" rel="stylesheet"/>

    <header id="header">


        <div class="container-fluid">

          <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto">ConstruMEGA</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
          </div>

          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="#intro">Inicio</a></li>

              {{--  <li><a href="{{ route('login') }}" >Iniciar Sesion</a></li>   --}}
              @guest
              <li><a href={{route("login")}} >Iniciar sesion</a></li>

              {{--  <li><a href="{{ route('register') }}">Registrarse</a></li>  --}}
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu">
                      <li>
                          <a href=logout
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action=logout method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest


            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </header><!-- #header -->
      <section id="intro">
        <div class="intro-container">
          <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

              <div class="carousel-item active">
                <div class="carousel-background"><img src="{{url('plantillas/img/1.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Material de Construccion</h2>
                    <p>Encuentra: Tuberia de gas, agua y desagüe. Calefacción por el piso, membranas acústicas e impermeables. Inodoros, lavamanos, duchas, griferia, hidromasajes, termotanques, anafes, calefón, calderas, hornos, estufas.</p>
                      <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>

                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="{{url('plantillas/img/2.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Material</h2>
                    <p>Las estructuras de la casa se componen de una serie de elementos, que en este caso los describiremos, como ejemplo de su cálculo: de concreto armado, columnas, losa maciza, viguetas, bovedillas y demás. </p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="{{asset('plantillas/img/3.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Quienes Somos</h2>
                    <p>En Construmega Srl nos dedicamos a la importación de productos de construcción de alta calidad producidos principalmente en Argentina y México. Nuestra Sede Central se encuentra en Tarija Bolivia al 2020 contamos con una experiencia de mas de 5 años en el mercado. Somos una organización capaz de cumplir tus expectativas en el sector de la construcción, en base a tres puntales fundamentales.</p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">

                <div class="carousel-background"><img src="{{asset('plantillas/img/4.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Direcciones</h2>
                    <p>Tarija: Barrio San Geronimo Av. Alto de la Alianza
                        Cochabamba: José Antonio Zegada 1885-1849, Cochabamba
                        La Paz:</p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

              <div class="carousel-item">
                <div class="carousel-background"><img src="{{asset('plantillas/img/5.jpg')}}" alt=""></div>
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>MATERIALES DE CONSTRUCCIÓN</h2>
                    <p>Los materiales de construcción son los productos, subproductos y materias primas empleados en la fabricación de edificaciones y obras civiles. Sus características y propiedades son determinantes en la definición de las cualidades físicas de la construcción en sí, así como el método constructivo, equipos y mano de obra necesarios para desarrollarla.</p>
                    <a href="{{ route('registro') }}" class="btn-get-started scrollto">Registrarse</a>
                  </div>
                </div>
              </div>

            </div>

            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>
        </div>

        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong>SistemCon</strong>. Todos Los Derechos Reservados Zadbrack
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
            -->
            {{-- Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade --}}
          </div>
        </div>

      </section><!-- #intro -->



      </footer><!-- #footer -->

      {{-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> --}}

      <!-- JavaScript Libraries -->
      <script src="{{asset('plantillas/lib/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/jquery/jquery-migrate.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/easing/easing.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/superfish/hoverIntent.js')}}"></script>
      <script src="{{asset('plantillas/lib/superfish/superfish.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/wow/wow.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/waypoints/waypoints.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/counterup/counterup.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/owlcarousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/isotope/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/lightbox/js/lightbox.min.js')}}"></script>
      <script src="{{asset('plantillas/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
      <!-- Contact Form JavaScript File -->
      <script src="{{asset('plantillas/contactform/contactform.js')}}"></script>

      <!-- Template Main Javascript File -->
      <script src="{{asset('plantillas/js/main.js')}}"></script>

    </body>
    </html>
