@extends('layouts.admin')

@section('encabezado')
Mensajes
@endsection

@section('head')
    <link href="{{ asset('css/notificacions/bootstrap-notifications.css') }}" rel="stylesheet">
@endsection

@section('contenido')

<div class="col-lg-12">
<div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="row">
                        <div class="col-lg-8"><h4>Mensajes Recibidos </h4></div>
                        <div class="col-lg-4"><a href="{{url('mensaje/create')}}"><button class="btn btn-success">Nuevo Mensaje</button></a></div>
                        </div>    
                        </div>
                        <div class="panel-body">
                            <ul class="notifications">

                              @foreach($mensajes as $m)  
                              <li class="notification">
                                  <div class="media">
                                    <div class="media-left">
                                      <div class="media-object">
                                        <img src="{{asset('img/user.jpg')}}" class="img-circle" alt="Name">
                                      </div>
                                    </div>
                                    <div class="media-body">
                                      <strong class="notification-title"><a href="#">{{$m->User->name}}</a> Te Envió </strong>
                                      <p class="notification-desc">
                                          {!!$m->mensaje!!}
                                      </p>
                                      <div class="notification-meta">
                                        <small class="timestamp">{{$m->diffFecha()}}</small>
                                      </div>
                                      

                                    </div>
                                  </div>
                                <a href="" data-target="#modal-delete-{{$m->id}}" data-toggle="modal" ><button class="btn btn-danger" > Eliminar</button></a>
                              </li>
                              @include('mensajes.deletemodal')
                              @endforeach

                            </ul>
                            
                        </div>
                            
                        </div>
</div>
                    <!--End Advanced Tables -->
</div>


@endsection
