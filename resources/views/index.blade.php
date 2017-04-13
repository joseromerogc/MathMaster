    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MathMaster</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('corporal/assets/css/bootstrap.min.css')}}">
        
        <!-- Main Style -->
        <link rel="stylesheet" type="text/css" href="{{asset('corporal/assets/css/main.css')}}">

        <!-- Responsive Style -->
        <link rel="stylesheet" type="text/css" href="{{asset('corporal/assets/css/responsive.css')}}">

        <!--Icon Fonts-->
        <link rel="stylesheet" media="screen" href="{{asset('corporal/assets/fonts/font-awesome/font-awesome.min.css')}}" />


        <!-- Extras -->
        <link rel="stylesheet" type="text/css" href="{{asset('corporal/assets/extras/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('corporal/assets/extras/lightbox.css')}}">

        <!-- Favicon -->
        <link rel="icon" href="http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/16/Categories-applications-education-university-icon.png" type="image/x-icon">

        <!-- jQuery Load -->
        <script src="{{asset('corporal/assets/js/jquery-min.js')}}"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

    <body data-spy="scroll" data-offset="20" data-target="#navbar">
    <!-- Nav Menu Section -->
    <div class="logo-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="50">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-3">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#home"><i class="fa fa-pencil"></i> MathMaster</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav col-md-9 pull-right">
                            <li class="active"><a href="#hero-area"><i class="fa fa-home"></i> Inicio</a></li>
                            <li><a href="#services"><i class="fa fa-gamepad"></i> Diversión</a></li>
                            <li><a href="#about"><i class="fa fa-info"></i> Quienes somos</a></li>
                            <li><a href="#contact"><i class="fa fa-envelope"></i> Contactanos</a></li>
                            </ul>
        </div>
      </div>
    </nav>
    </div>
<!-- Nav Menu Section End -->

<!-- Hero Area Section -->


<section id="hero-area">
<div class="container">

<div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <div class="alert alert-{{ $msg }} alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>{!! Session::get('alert-' . $msg) !!}</h4>
                        </div>
                        @endif
                    @endforeach    
</div>

    <div class="row">
<div class="col-md-12">
        <h1 class="title">MathMaster - Desafios Matemáticos</h1>
        <h2 class="subtitle">Demuestras tus habilidades y destrezas !</h2>

        <img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft" src="{{asset('img/dart-board.png')}}" alt="dartboard" width="20px" >

        <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5">
        <p class="text-justify" style="font-size: 18px">
            Disfruta de esta aventura que te lleva por diferentes escenarios para asumir retos maravillos y únicos. Demuestra tus habilidades matemáticas en este fabuloso encuentro.
        </p>
        <a href="{{ url('/register') }}" class="btn btn-common btn-lg">Registrate!</a>
        <a href="{{ url('/login') }}" class="btn btn-primary btn-lg">Accede</a>
        </div>

</div>

    </div>
</div>
</section>

<!-- Hero Area Section End-->



<!-- Service Section -->

<section id="services">
<div class="container text-center">
<div class="row">
<h1 class="title">Diversión</h1>
<h2 class="subtitle">Que nos ofrece</h2>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="service-item">
    <img src="{{asset('img/mind.png')}}" 
    alt="mind">
    <h3>Desafios a tu mente</h3>
    <p>
        Una selección de los mejores desafios que llevaran al límite tus habilidades
    </p>
    </div>
    </div>


    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="service-item">
    <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/128/gamepad-icon.png" 
    alt="gamepad">
    <h3>Niveles</h3>
    <p>
        De acuerdo a tus puntos de experiencia iras subiendo de nivel para abrir nuevos desafios
    </p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="service-item">
    <img src="{{asset('img/gift.png')}}" 
    alt="gift">
    <h3>100% Gratuito</h3>
    <p>
        Diversión sin gastar ni un centavo
    </p>
    </div>
    </div>

</div>
</div>
 </section>
<!-- Service Section End -->

<!-- About Section -->

    <section id="about">
    <div class="container">
    <div class="row">
    <h1 class="title">Quienes somos</h1>
    <h2 class="subtitle">Matemática Positiva</h2>

    <div class="col-md-8 col-sm-12">
    <p>
    Sitio Dedicado al Universo Matemático
    </p>
    </div>

    <img class="col-md-4 col-md-4 col-sm-12 col-xs-12" src="https://matematicapositiva.files.wordpress.com/2014/12/matematicapositiva.png" alt="">

    </div>
    </div>
    </section>
<!-- About Section End -->



<!-- Conatct Section -->
    <section id="contact">
    <div class="container text-center">
    <div class="row">
    <h1 class="title">Contactanos</h1>

    <h2 class="subtitle">Tu opinión es importante</h2>


    <form role="form" action="{{url('/enviarmail')}}" class="contact-form" method="post">
    {{ csrf_field() }}
    <div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">
    <div class="form-group">
    <div class="controls">
    <input type="text" class="form-control" placeholder="Nombre" name="name">
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <input type="email" class="form-control email" placeholder="Correo" name="email">
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <input type="text" class="form-control requiredField" placeholder="Asunto" name="subject">
    </div>
    </div>

    <div class="form-group">

    <div class="controls">
    <textarea rows="7" class="form-control" placeholder="Mensaje" name="message"></textarea>
    </div>
    </div>
    <button type="submit" id="submit" class="btn btn-lg btn-common">Enviar</button><div id="success" style="color:#34495e;"></div>

    </div>
    </form>

    <div class="col-md-6 wow fadeInRight">
    <div class="social-links">
    <a class="social" href="https://www.facebook.com/matematicapositiva/" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
    <a class="social" href="https://twitter.com/MatematicaPos" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
    <a class="social" href="https://plus.google.com/u/0/+Matem%C3%A1ticaPositiva" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>
    <a class="social" href="https://www.linkedin.com/in/jose-romero-09a3b0128/" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a>
	</div>
<div class="contact-info">
    <p><i class="fa fa-map-marker"></i> Santa Ana de Coro, Venezuela</p>
     <p><i class="fa fa-envelope"></i> mathmaster@matematicapositiva.com.ve</p>
</div>

    <p>
    <blockquote>
        Las Matemáticas son un reto.
    </blockquote>
    </p>
    
    </div>

    </div>
    </div>
    </section>

<!-- Conatct Section End-->


    <div id="copyright">
    <div class="container">
    <div class="col-md-10 text-center"><p>© MathMaster 2017 <br> Diseño creado por <a href="http://graygrids.com">GrayGrids</a></p></div>
    <div class="col-md-2">
        <span class="to-top pull-right"><a href="#hero-area"><i class="fa fa-angle-up fa-2x"></i></a></span>
        </div>
    </div>
    </div>
<!-- Copyright Section End-->

        <!-- Bootstrap JS -->
        <script src="{{asset('corporal/assets/js/bootstrap.min.js')}}"></script>

            <!-- Smooth Scroll -->
                    <!-- Smooth Scroll -->
        <script src="{{asset('corporal/assets/js/smooth-scroll.js')}}"></script>
        <script src="{{asset('corporal/assets/js/lightbox.min.js')}}"></script>

        <!-- All JS plugin Triggers -->



    </body>
    </html>