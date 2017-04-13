@extends('layouts.admin')

@section('encabezado')
Escritorio
@endsection

@section('contenido')

<div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa fa-user fa-3x"></i>&nbsp;<b> {{$cantidadusuarios}}</b> {{trans_choice('pluralization.usuariosregistrados', $cantidadusuarios)}}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-key fa-3x"></i>&nbsp;<b> {{$cantidaddesafios}}</b> Desafios
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <i class="fa fa-wrench fa-3x"></i>&nbsp;<b> {{$cantidaddesafios}}</b> Desafios
                    </div>
                </div>
</div>

@endsection
