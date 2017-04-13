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
    <!-- Favicon -->
        <link rel="icon" href="http://icons.iconarchive.com/icons/oxygen-icons.org/oxygen/16/Categories-applications-education-university-icon.png" type="image/x-icon">

{{-- $("#msg").html(data.msg); --}}

    <script type="text/javascript" src="{{asset('js/ajax.js')}}" >
    </script>
    <script type="text/javascript">
        function getMessage(){
            alert("hello");
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){
                  console.log(data.msg);
               }
            });
         }
    </script>

</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">

        <!-- navbar top -->
        @include('headers.nav2')
        <!-- end navbar top -->

        
        <!--  page-wrapper -->
        <div id="page-wrapper" style="margin: 0 0 0 0px;">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    
                    @yield('contenido')

                </div>
                <!--End Page Header -->
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{asset('plugins/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('plugins/pace/pace.js')}}"></script>
    <script src="{{asset('scripts/siminta.js')}}"></script>

</body>

</html>
