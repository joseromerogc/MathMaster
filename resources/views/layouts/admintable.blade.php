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
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main-style.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <!-- Favicon -->
        <link rel="icon" href="http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/16/Categories-applications-education-university-icon.png" type="image/x-icon">
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

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('plugins/pace/pace.js')}}"></script>
    <script src="{{asset('scripts/siminta.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/b-1.2.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap4.min.js"></script>
    @yield('script')

</body>

</html>
