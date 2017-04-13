@extends('layouts.admin')

@section('encabezado')
<i class="fa fa-globe fa-fw"></i> {{$subescenario->nombre}}| 
<a href="{{URL::action('Desafio\EscenarioController@show',$subescenario->escenario->id) }}">{{$subescenario->escenario->nombre}}</a> <i class="fa fa-globe fa-fw"></i>
@role('admin')
<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Opciones <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="{{URL::action('Desafio\SubEscenarioController@edit',$subescenario->id) }}">Editar</a></li>
      <li><a href="#">Eliminar</a></li>
      <li><a href="{{url('desafio/create/'.$subescenario->id)}}">Nuevo Desafio</a></li>
    </ul>
</div>
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
                     <!--  Alert Styles -->
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h1 >Lista de Desafios</h1>
                        </div>
                        <div class="panel-body">
                        @foreach($subescenario->desafios as $d)
                            <div class="col-lg-4
                            @if(Laratrust::user()->hasRole('admin'))
                                @else    
                                    @if($d->nivel>$nivel)
                                        disabled_div
                                    @endif    
                                @endif
                                ">
                            <div class="panel panel-blue">
                            <div class="panel-heading text-center">
                               <div class="row">
                                        <div class="col-lg-6">
                                            <h4>{{ $d->nombre}}</h4>
                                        </div>   
                                        <div class="col-lg-6">
                                            <div class="text-right">
                                                Nivel
                                                <span class="middle-label label label-success">
                                                    {{$d->nivel}}
                                                </span></i> 
                                            </div>
                                        </div>    
                                    </div>     
                            </div>
                            <div class="panel-body text-center">
                                    
                                    <img src="{{$d->fondo}}" class="img-circle" alt="fondo" height="200px" height="200px">
                                      <p>{!!html_entity_decode($d->descripcion)!!}</p>
                            </div>
                            <div class="panel-footer text-center">
                                <a href="{{url('desafio',['id'=>$d->id])}}" ><i class="fa fa-eye fa-fw"></i>Explorar</a>
                            </div>
                            </div>
                        </div>
                        
                        @endforeach
                        </div>
                    </div>
                    </div>
</div>

@endsection
