@extends('layouts.admin')

@section('encabezado')
Nuevo Escenario
@endsection

@section('head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection


@section('contenido')

    {!!Form::open(array('url'=>'escenario','method'=>'POST','autocomplete'=>'on'))!!}
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
                                                        <label for="tipo">Tipo de Escenario</label>
                                                        <select class="form-control" name="tipo">
                                                            
                                                            @if(old('tipo'))
                                                                <option selected value="{{old('tipo')}}" required>{{old('tipo')}}</option>
                                                            @else
                                                                <option selected value="">Seleccione Opción</option>

                                                            @endif    
                                                            <option value="Antiguo">Antiguo</option>
                                                            <option value="Moderno">Moderno</option>
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
                                                    <label for="nivel">Nivel</label>
                                                    <input type="number" name="nivel" min="1" max="115"  value="{{old('nivel')}}" class="form-control" placeholder="Ingrese Número">
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