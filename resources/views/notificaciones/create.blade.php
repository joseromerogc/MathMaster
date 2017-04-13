@extends('layouts.admin')

@section('encabezado')
Nuevo Escenario | {{$escenario->nombre}}
@endsection

@section('head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection


@section('contenido')

    {!!Form::open(array('url'=>'subescenario','method'=>'POST','autocomplete'=>'on'))!!}
    {{Form::token()}}
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
                                                    <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Ingrese Nombre del Escenario">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="tipo">Escenario</label>
                                                        <select class="form-control" name="escenario_id">
                                                            <option value="{{$escenario->id}}">{{$escenario->nombre}}</option>
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="fondo">Imagen a Mostrar</label>
                                                    <input type="url" name="fondo" value="{{old('fondo')}}" class="form-control" placeholder="Ingrese url de la Imagen">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nivel">Puntos</label>
                                                    <input type="number" name="puntos" min="1" max="115"  value="{{old('puntos')}}" class="form-control" placeholder="Ingrese Número">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="tipo">Color</label>
                                                        <select class="form-control" name="color">
                                                            
                                                            @if(old('color'))
                                                                <option selected value="{{old('color')}}" required>{{old('color')}}</option>
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
                                                            
                                                            @if(old('area'))
                                                                <option selected value="{{old('area')}}" required>{{old('area')}}</option>
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