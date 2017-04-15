<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MathSolver @yield('titulo')</title>
    <!-- Core CSS - Include with every page -->
    <link href="{{asset('plugins/bootstrap/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/pace/pace-theme-big-counter.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main-style.css')}}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- Favicon -->
        <link rel="icon" href="http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/16/Categories-applications-education-university-icon.png" type="image/x-icon">

    {{-- $("#msg").html(data.msg); --}}

    <script src="{{asset('js/ajax.js')}}"></script>
    <script type="text/javascript">
$(document).ready(function() {
        function blinker() {
    $('.blink_me').fadeOut(80);
    $('.blink_me').fadeIn(80);
    }
    setInterval(blinker, 1000);
});
    </script>

    @yield('head')
</head>

<body>
    
    
    <!--  wrapper -->
    <div id="wrapper">

        <!-- navbar top -->
        @include('headers.nav')
        <!-- end navbar top -->

        <!-- navbar side -->
        @include('sidebars.sidebar')
        <!-- end navbar side -->
        
        <!--  page-wrapper -->

        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                @include('headers.page')
                <!--End Page Header -->

                @yield('contenido')
            </div>

        </div>
        <!-- end page-wrapper -->
        <!-- SHOW MODAL -->
        @foreach($msgs as $m)
            @include('mensajes.modalshow')
        @endforeach

        @include('sidebars.modal-image')

    <!-- end wrapper -->
    
    

    <!-- Core Scripts - Include with every page -->
    
    <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('plugins/pace/pace.js')}}"></script>
    <script src="{{asset('scripts/siminta.js')}}"></script>
    @yield('script')


</body>

</html>
