@extends('layouts.admin')

@section('encabezado')
Títulos
@endsection

@section('head')
    <link href="{{ asset('css/notificacions/bootstrap-notifications.css') }}" rel="stylesheet">
@endsection

@section('contenido')

<div class="col-lg-12">
<div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="row">
                        <div class="col-lg-8"><h4>Lista de Títulos </h4></div>
                        <div class="col-lg-4"><a href="{{url('titulo/create')}}"><button class="btn btn-success">Nuevo</button></a></div>
                        </div>    
                        </div>
                        <div class="panel-body">

                            @foreach($titulos as $t)
                            <div class="col-lg-8">
                            <div class="media">
                              <div class="media-left" style="float: left; margin: 10px;">
                                <a href="#">
                                  <img class="media-object" src="{{$t->imagen}}" alt="..." style="width:60px" >
                                </a>
                              </div>
                              <div class="media-body">
                                <h4 class="media-heading">{{$t->nombre}}</h4>
                                <span class="label label-success">Rango <span class="badge">{{$t->rango}}</span></span>
                                <span class="label label-info">Nivel <span class="badge">{{$t->nivel}}</span></span>
                                <span class="label label-primary">Efectividad <span class="badge">{{$t->efectividad}}</span></span>
                                <span class="label label-warning">Velocidad <span class="badge">{{$t->efectividad}}</span></span>
                                <div style="float:right; margin-bottom: 10px;">
                              <a href="{{URL::action('TituloController@edit',$t->id) }}"><button class="btn btn-info"> Editar</button></a>
                                                    <a href="" data-target="#modal-delete-{{$t->id}}" data-toggle="modal" ><button class="btn btn-danger" > Eliminar</button></a>
                            @include('titulos.deletemodal')
                            </div>
                            </div>
                            </div>
                            </div>
                            <hr style="clear: both;">
                            @endforeach  
                        </div>
                        </div>
</div>
                    <!--End Advanced Tables -->
</div>


@endsection
