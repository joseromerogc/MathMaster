<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{asset('img/logo.png')}}" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->

                <!-- MENSAJES -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger
                        @if($msgs->count()>0) 
                        blink_me @endif 
                        ">{{$msgs->count()}}</span><i class="fa fa-envelope fa-3x"></i>
                    </a>
                    <!-- dropdown-messages -->
                    <ul class="dropdown-menu dropdown-messages">
                        

                        @foreach($msgs as $m)
                        <li>
                            <a href="" onclick="getMessage({{$m->id}})" 
                            data-target="#modal-mensaje-show-{{$m->id}}" data-toggle="modal">
                                <div>
                                    <strong><span class=" label label-danger">{{$m->User->name}}</span></strong>
                                    <span class="pull-right text-muted">
                                        <small><em>{{$m->diffFecha()}}</em>
                                        </small>
                                    </span>
                                </div>
                                <div>
                                {!! str_limit($m->mensaje, $limit = 100, $end = '...')!!}
                                </div>

                            </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach

                        @if($msgs->isEmpty())
                        <li > 
                                <div class="text-center text-muted">
                                    <em>No Hay Mensajes Nuevos</em>
                                </div>
                        </li>
                        <li class="divider"></li>
                        @endif



                        <li>
                            <a class="text-center" href="{{URL::action('MensajeController@show',Auth::user()->id) }}">
                                <strong>Leer Todos</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- end dropdown-messages -->
                </li>

                <!-- TAREAS -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-success">4</span>  <i class="fa fa-tasks fa-3x"></i>
                    </a>
                    <!-- dropdown tasks -->
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Puntos Nivel</strong>
                                        <span class="pull-right text-muted">{{$puntos_nivel_porc}}% Completado</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$puntos_nivel_porc}}%">
                                            <span class="sr-only">{{$puntos_nivel_porc}}% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>                        
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Título (Nivel)</strong>
                                        <span class="pull-right text-muted">{{$nivel_porc}}% Completado</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$nivel_porc}}%">
                                            <span class="sr-only">{{$nivel_porc}}% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="divider"></li><li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Título (Velocidad)</strong>
                                        <span class="pull-right text-muted">{{$velocidad_porc}}% a Reducir</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$velocidad_porc}}%">
                                            <span class="sr-only">{{$velocidad_porc}}% Reducir (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Título (efectividad)</strong>
                                        <span class="pull-right text-muted">{{$efectividad_porc}}% Completado</span>
                                    </p>
                                    <div class="progress progress-striped active ">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$efectividad_porc}}%">
                                            <span class="sr-only">{{$efectividad_porc}}% Completado (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        
                    </ul>
                    <!-- end dropdown-tasks -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <span class="top-label label label-warning @if($notificaciones>0) 
                        blink_me @endif    
                        "

                        >{{$notificaciones}}</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
                    
                        @if($noti_historial->count()>0)
                        <li>
                            <a href="{{url('/notificaciones/historial')}}">
                                <div>
                                    <i class="fa fa-envelope fa-fw"> </i>{{$noti_historial->count()}} Historial
                                    <span class="pull-right text-muted small">{{$noti_historial->last()->DiffFecha()}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif
                        @if($msgenerales->count()>0)
                        <li>
                            <a href="{{url('/mensajes/general')}}">
                                <div>
                                    <i class="fa fa-envelope fa-fw"> </i>{{$msgenerales->count()}} Mensajes Generales
                                    <span class="pull-right text-muted small">{{$msgenerales->last()->DiffFecha()}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif

                        @if($noti_nivel->count()>0)
                        <li>
                            <a href="{{url('/notificaciones/nivel')}}">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>{{$noti_nivel->count()}} Notif. de Nivel
                                    <span class="pull-right text-muted small">{{$noti_nivel->last()->DiffFecha()}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif
                        @if($noti_titulo->count()>0)
                        <li>
                            <a href="{{url('/notificaciones/titulo')}}">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>{{$noti_titulo->count()}} Notif. de Título
                                    <span class="pull-right text-muted small">{{$noti_titulo->last()->DiffFecha()}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif
                        @if($noti_desafio->count()>0)
                        <li>
                            <a href="{{url('/notificaciones/desafio')}}">
                                <div>
                                    <i class="fa fa-task fa-fw"></i>{{$noti_desafio->count()}} Notif. de Desafio
                                    <span class="pull-right text-muted small">{{$noti_desafio->last()->DiffFecha()}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/perfil')}}"><i class="fa fa-user fa-fw"></i>Perfil de Usuario</a>
                        </li>
                        <li><a href="{{url('/usuario/editar')}}"><i class="fa fa-gear fa-fw"></i>Modificar Cuenta</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out fa-fw"></i>Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>    

                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>