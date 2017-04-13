@extends('layouts.admin')

@section('encabezado')
Bienvenid@
@endsection

@section('contenido')

<div class="row">
<div class="col-lg-12">
                    <!--Timeline -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i>Tus Credenciales
                        </div>

                        <div class="panel-body">
                                <!--quick info section -->
                                <div class="col-lg-4">
                                    <div class="alert alert-success text-center">
                                        <i class="fa fa-angle-double-up fa-3x"></i>&nbsp;<b> {{$experiencia->nivel}}</b> Nivel
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="alert alert-info text-center">
                                        <i class="fa fa-bullseye fa-3x"></i>&nbsp;<b> {{$experiencia->puntos_nivel}} </b> Punto(s) Nivel
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="alert alert-danger text-center">
                                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b> {{$titulo->Titulo->rango}}</b> Rango - Título <b>{{$titulo->Titulo->nombre}}</b>
                                    </div>
                                </div>
                            
                                <div class="col-lg-4">
                                    <div class="alert alert-info text-center">
                                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b> {{$velocidad}}</b> Velocidad
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="alert alert-warning text-center">
                                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b> {{$experiencia->efectividad}}</b> Efectividad
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="alert alert-warning text-center">
                                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b> {{$superadas}}</b> Desafio(s) Superados
                                    </div>
                                </div>
                        </div>

            </div>
</div>

</div>

@endsection
