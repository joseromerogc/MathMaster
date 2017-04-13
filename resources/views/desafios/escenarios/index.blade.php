@extends('layouts.admin')

@section('encabezado')
<i class="fa fa-globe fa-fw"></i> Escenarios <i class="fa fa-globe fa-fw"></i>
@role('admin')
<a href="{{url('escenario/create')}}"><button class="btn btn-success">Nuevo Escenario</button></a>
@endrole
@endsection

@section('head')
<style type="text/css">
    .disabled_div {
    pointer-events: none;
    opacity: 0.4;
    }
</style>    
@endsection

@section('contenido')

<div class="row">

<div class="col-lg-12">
                    
			    @foreach($escenarios as $esc)
                <div class="col-lg-12">
                     <!--  Alert Styles -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 >{{$esc['nombre']}}</h1>
                        </div>
                        <div class="panel-body">
                        @foreach($esc['query'] as $e)
                            
                                <div class="col-lg-6 

                                @if(Laratrust::user()->hasRole('admin'))
                                @else    
                                    @if($e->nivel>$nivel)
                                        disabled_div
                                    @endif    
                                @endif
                                ">
                                    <div class="panel panel-primary">

                                    <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4>{{ $e->nombre}}</h4>
                                        </div>   
                                        <div class="col-lg-6">
                                            <div class="text-right">
                                                Nivel
                                                <span class="middle-label label label-success">
                                                    {{$e->nivel}}
                                                </span></i> 
                                            </div>
                                        </div>    
                                    </div>     
                                    </div>
                                    <div class="panel-body text-center">
                                            
                                            <img src="{{$e->fondo}}" class="img-circle" alt="Lights" height="200px" height="200px">
                                              <p>{!!html_entity_decode($e->descripcion)!!}</p>
                                    </div>
                                    <div class="panel-footer text-center">
                                        <a href="{{url('escenario',['id'=>$e->id])}}" ><i class="fa fa-eye fa-fw"></i>Explorar</a>
                                    </div>
                                    </div>
                                </div>
                        @endforeach
                        </div>

                    </div>
                </div>
                @endforeach
				
</div>

@endsection
