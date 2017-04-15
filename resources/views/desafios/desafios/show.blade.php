@extends('layouts.admin')

@section('encabezado')
<i class="fa fa-gamepad fa-fw"></i> Desafio {{$desafio->nombre}} | 
<a href="{{URL::action('Desafio\SubEscenarioController@show',$desafio->SubEscenario->id) }}">{{$desafio->SubEscenario->nombre}}</a>
 <i class="fa fa-gamepad fa-fw"></i>
 @role('admin')
<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Opciones <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="{{URL::action('Desafio\DesafioController@edit',$desafio->id) }}">Editar</a></li>
      <li><a href="#">Eliminar</a></li>
      <li><a href="{{url('desafio/create/'.$desafio->SubEscenario->id)}}">Nuevo Desafio</a></li>
    </ul>
</div>
@endrole
@endsection

@section('head')
<script src="{{asset('vendors/ckeditor/ckeditor.js')}}">
    CKEDITOR.replace( 'editor1', { toolbar : [ [ 'EqnEditor', 'Bold', 'Italic' ] ] });
</script>
@endsection

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        <div class="panel-body">
                            <div class="col-lg-12">
                            <div class="panel panel-{{$desafio->color}}">
                            <div class="panel-heading text-center">
                               <h3>{{ $desafio->nombre}}</h3>
                            </div>
                            <div class="panel-body">
                                    
                                    <div class="text-center">
                                    <img src="{{$desafio->fondo}}" class="img-circle" alt="fondo" height="200px" height="200px">
                                      <p>{!!html_entity_decode($desafio->planteamiento)!!}</p>
                                    </div>                                              

                            @permission('create-desafio')
                            <a href="" data-target="#modal-create" data-toggle="modal" >
                            <button class="btn btn-primary btn-block">
                                <i class="fa fa-question fa-fw"></i>Agregar Pregunta
                            </button>
                            </a>

                            @include('desafios.preguntas.createmodal')
                            </div>
                            @endpermission
                            

                            <div class="panel-footer">
                                    @include('desafios.preguntas.list')
                            </div>
                            </div>
                        </div>
        </div>
    </div>                
</div>

@endsection
