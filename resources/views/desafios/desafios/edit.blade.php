@extends('layouts.admin')

@section('encabezado')
Actualizar Desafio {{$desafio->nombre}}| {{$subescenario->nombre}}
@endsection

@section('head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection


@section('contenido')

    {!!Form::open(array('action' => ['Desafio\DesafioController@update','id'=>$desafio->id], 'method'=>'PUT' ,'autocomplete'=>'off'))!!}
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
                                                    <input type="text" name="nombre" value="{{$desafio->nombre}}" class="form-control" placeholder="Ingrese Nombre del Escenario">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="tipo">SubEscenario</label>
                                                        <select class="form-control" name="sub_escenario_id">
                                                            <option value="{{$subescenario->id}}">{{$subescenario->nombre}}</option>
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="fondo">Imagen a Mostrar</label>
                                                    <input type="url" name="fondo" value="{{$desafio->fondo}}" class="form-control" placeholder="Ingrese url de la Imagen">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nivel">Nivel</label>
                                                    <input type="number" name="nivel" min="1" max="115"  value="{{$desafio->nivel}}" class="form-control" placeholder="Ingrese Número">
                                                </div>

                                            </div>

                                            <div class="col-lg-8 col-lg-8 col-md-8 col-sm-8">
                                                <div class="form-group">
                                                        <label for="descripcion">Descripción</label>
                                                      <input type="text" name="descripcion" value="{{$desafio->descripcion}}" class="form-control" placeholder="Ingrese una breve descripción del Desafio">  
                                            </div>
                                            </div>

                                            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tipo">Color</label>
                                                        <select class="form-control" name="color">
                                                            
                                                            @if($desafio->color)
                                                                <option selected value="{{$desafio->color}}" required>{{$desafio->color}}</option>
                                                            @else
                                                                <option selected value="">Seleccione Color</option>
                                                            @endif    
                                                            @foreach($colors as $c)
                                                                <option value="{{$c['value']}}">{{$c['nombre']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                        <label for="planteamiento">Planteamiento del Desafio</label>
                                                        <textarea name="planteamiento">
                                                            {{$desafio->planteamiento}}
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