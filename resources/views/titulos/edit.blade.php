@extends('layouts.admin')

@section('encabezado')
Actualizar Título
@endsection

@section('contenido')

    {!!Form::open(array('action' => ['TituloController@update','id'=>$titulo->id],'autocomplete'=>'on'))!!}
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
                                                    <input type="text" name="nombre" value="{{$titulo->nombre}}" class="form-control" placeholder="Ingrese Nombre del Título">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="fondo">Imagen a Mostrar</label>
                                                    <input type="url" name="imagen" value="{{$titulo->imagen}}" class="form-control" placeholder="Ingrese url de la Imagen">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nivel">Rango</label>
                                                    <input type="number" name="rango" min="1" max="115"  value="{{$titulo->rango}}" class="form-control" placeholder="Ingrese Número">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nivel">Nivel</label>
                                                    <input type="number" name="nivel" min="1" max="115"  value="{{$titulo->nivel}}" class="form-control" placeholder="Ingrese Número">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nivel">Velocidad</label>
                                                    <input type="number" name="velocidad" min="1" max="115"  value="{{$titulo->velocidad}}" class="form-control" placeholder="Ingrese Número">
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nivel">Efectividad</label>
                                                    <input type="number" name="efectividad" min="1" max="115"  value="{{$titulo->efectividad}}" class="form-control" placeholder="Ingrese Número">
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