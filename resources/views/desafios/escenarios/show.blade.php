@extends('layouts.admin')

@section('encabezado')
<i class="fa fa-globe fa-fw"></i> {{$escenario->nombre}} <i class="fa fa-globe fa-fw"></i>
@role('admin')
<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Opciones <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="{{URL::action('Desafio\EscenarioController@edit',$escenario->id) }}">Editar</a></li>
      <li><a href="#">Eliminar</a></li>
      <li><a href="{{url('subescenario/create/'.$escenario->id)}}">Nuevo Subescenario</a></li>
    </ul>
  </div>
@endrole
@endsection
@section('contenido')

<div class="row">
<div class="col-lg-12">
        <div class="text-center">
            <img  src="{{asset('img/dart-board.png')}}" height="60px" />            
        </div>
			    @foreach($subescenarios as $sub)
                    <div class="col-lg-12">
                     <!--  Alert Styles -->
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h1 >{{$sub['nombre']}}</h1>
                        </div>
                        <div class="panel-body">
                        @foreach($sub['query'] as $s)
                            <div class="col-lg-6">
                            <div class="panel panel-blue">
                            <div class="panel-heading text-center">
                               <h3>{{ $s->nombre}}</h3>
                            </div>
                            <div class="panel-body text-center">
                                    
                                    <img src="{{$s->fondo}}" class="img-circle" alt="fondo" height="200px" height="200px">
                                      <p>{!!html_entity_decode($s->descripcion)!!}</p>
                            </div>
                            <div class="panel-footer text-center">
                                <a href="{{url('subescenario',['id'=>$s->id])}}" ><i class="fa fa-eye fa-fw"></i>Explorar</a>
                            </div>
                            </div>
                        </div>
                        
                        @endforeach
                        </div>
                    </div>
                    </div>
                @endforeach
				
</div>
</div>

@endsection
