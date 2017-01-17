@extends('layouts.admin')

@section('encabezado')
Tu Perfil
@endsection

@section('contenido')

<div class="row">

				{{-- MOSTRAR INFORMACIÓN DE USUARIO --}}
				<div class="col-lg-4 col-lg-4 col-md-4 col-sm-4">
	                <div class="panel panel-primary text-center no-boder">
	                        <div class="panel-body green">
	                        	<i class="fa fa-user fa-3x"></i>
	                            <h3>{{$perfil->user->name}}</h3>
	                        </div>
	                        <div class="panel-footer">
	                            <span class="panel-eyecandy-title">Nombre de Usuario
	                            </span>
	                        </div>
	                </div>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4">
	                <div class="panel panel-primary text-center no-boder">
	                        <div class="panel-body blue">
	                        	<i class="fa fa-envelope fa-3x"></i>
	                            <h3>{{$perfil->user->email}}</h3>
	                        </div>
	                        <div class="panel-footer">
	                            <span class="panel-eyecandy-title">Correo Electrónico
	                            </span>
	                        </div>
	                </div>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4">
	                <div class="panel panel-primary text-center no-boder">
	                        <div class="panel-body yellow">
	                        
	                        @if($perfil->perfil=='Estudiante')
	                            <i class="fa fa-pencil fa-3x"></i>
	                        @elseif ($perfil->perfil=='Docente')
	                        	<i class="fa fa-book fa-3x"></i>
	                        @else
	                        	<i class="fa fa-user-o fa-3x"></i>
	                       	@endif

	                            <h3>{{$perfil->perfil}}</h3>
	                        </div>
	                        <div class="panel-footer">
	                            <span class="panel-eyecandy-title">Perfil de Usuario
	                            </span>
	                        </div>
	                </div>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4">
	                <div class="panel panel-primary text-center no-boder">
	                        <div class="panel-body red">
	                        
	                        	<i class="fa fa-globe fa-3x"></i>
	                            <h3>{{$perfil->country->name}}</h3>
	                        </div>
	                        <div class="panel-footer">
	                            <span class="panel-eyecandy-title">País
	                            </span>
	                        </div>
	                </div>
                </div>
                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4">
	                <div class="panel panel-primary text-center no-boder">
	                        <div class="panel-body orange">
	                            	<i class="fa fa-info-circle fa-3x"></i>
	                            <h3>{{$perfil->genero}}</h3>
	                        </div>
	                        <div class="panel-footer">
	                            <span class="panel-eyecandy-title">Género
	                            </span>
	                        </div>
	                </div>
                </div>

                <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                        <a class="btn btn-primary btn-block" href="{{url('/perfil/edit')}}">Actualizar Perfil</a>
                                                </div>
                              
				</div>
</div>

@endsection
