<nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            @include('sidebars.infouser')
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="">
                        <a href="/home"><i class="fa fa-dashboard fa-fw"></i>Escritorio</a>
                    </li>

                    @permission('create-user')
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i>Usuario<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/usuario')}}"><i class="fa fa-list fa-fw"></i>Lista de Usuario</a>
                                <a href="{{url('/role')}}"><i class="fa fa-sitemap fa-fw"></i>Roles</a>
                                <a href="{{url('/permiso')}}"><i class="fa fa-group fa-fw"></i>Permisos</a>
                                
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    @endpermission
                    <li>
                        <a href="#"><i class="fa fa-globe fa-fw"></i>Escenarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/escenario')}}"><i class="fa fa-list fa-fw"></i>Lista</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe fa-fw"></i>Títulos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/titulo')}}"><i class="fa fa-list fa-fw"></i>Lista</a>
                            </li>
                            <li>
                                <a href="{{url('/titulo/create')}}"><i class="fa fa-list fa-fw"></i>Registrar</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-globe fa-fw"></i>Mensajes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/mensaje')}}"><i class="fa fa-list fa-fw"></i>Bandeja de Entrada</a>
                            </li>
                            <li>
                                <a href="{{url('/mensaje/create')}}"><i class="fa fa-list fa-fw"></i>Enviar</a>
                            </li>
                            <li>
                                <a href="{{url('/mensajes/general')}}"><i class="fa fa-list fa-fw"></i>General</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>