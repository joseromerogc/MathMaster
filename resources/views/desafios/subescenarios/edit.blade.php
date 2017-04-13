@extends('layouts.admin')

@section('encabezado')
Actualizar SubEscenario | {{$subescenario->nombre}} | {{$subescenario->escenario->nombre}}
@endsection

@section('head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection


@section('contenido')

    {!!Form::open(array('action' => ['Desafio\SubEscenarioController@update','id'=>$subescenario->id], 'method'=>'PUT' ,'autocomplete'=>'off'))!!}
    {{Form::token()}}
    {{ method_field('PUT') }}
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Ingrese Datos
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" name="nombre" value="{{$subescenario->nombre}}" class="form-control" placeholder="Ingrese Nombre del Escenario">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="tipo">Escenario</label>
                                                        <select class="form-control" name="escenario_id">
                                                            <option value="{{$subescenario->escenario->id}}">{{$subescenario->escenario->nombre}}</option>
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="fondo">Imagen a Mostrar</label>
                                                    <input type="url" name="fondo" value="{{$subescenario->fondo}}" class="form-control" placeholder="Ingrese url de la Imagen">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nivel">Puntos</label>
                                                    <input type="number" name="puntos" min="1" max="115"  value="{{$subescenario->puntos}}" class="form-control" placeholder="Ingrese Número">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="tipo">Color</label>
                                                        <select class="form-control" name="color">
                                                            
                                                            @if($subescenario->color)
                                                                <option selected value="{{$subescenario->color}}" required>{{$subescenario->color}}</option>
                                                            @else
                                                                <option selected value="">Seleccione Color</option>
                                                            @endif    
                                                            @foreach($colors as $c)
                                                                <option value="{{$c['value']}}">{{$c['nombre']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="areas">Áreas</label>
                                                        <select class="form-control" name="area">
                                                            
                                                            @if($subescenario->area)
                                                                <option selected value="{{$subescenario->area}}" required>{{$subescenario->area}}</option>
                                                            @else
                                                                <option selected value="">Seleccione Color</option>
                                                            @endif    
                                                            @foreach($areas as $a)
                                                                <option value="{{$a}}">{{$a}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                        <label for="descripcion">Descripción</label>
                                                        <textarea name="descripcion">
                                                        {{$subescenario->descripcion}}
                                                        </textarea>
                                                </div>
                              
                                            </div>

                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                                </div>
                              
                                            </div>
                                        </div>
                </div>
            </div></div></div>

    {!!Form::close()!!}
    
@endsection