@extends('layouts.admin')

@section('encabezado')
Perfil de Usuario
@endsection

@section('contenido')

    {!!Form::open(array('url'=>'perfil','method'=>'POST','autocomplete'=>'on'))!!}
    {{Form::token()}}
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Ingrese Datos de Perfil
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="perfil">Perfil de Usuario</label>
                                                        <select class="form-control" name="perfil">
                                                            
                                                            @if(old('perfil'))
                                                                <option selected value="{{old('perfil')}}">{{old('perfil')}}</option>
                                                            @else
                                                                <option selected value="">Seleccione Opción</option>

                                                            @endif    
                                                            <option value="Estudiante">Estudiante</option>
                                                            <option value="Docente">Docente</option>
                                                            <option value="Aficionado">Aficionado</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="pais">Pais</label>
                                                        <select  name="country" class="form-control">
                                                            @if(!old('country'))
                                                                <option selected value="">Seleccione Opción</option>
                                                            @endif    

                                                            @foreach($countries as $c)
                                                                @if(old('country')==$c->id)
                                                                <option selected value="{{old('country')}}">{{$c->name}}</option>
                                                                @else
                                                                <option value="{{$c->id}}">{{$c->name}}</option>  
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="genero">Género</label>
                                                        <select name="genero" class="form-control">
                                                            @if(old('genero'))
                                                                <option selected value="{{old('genero')}}">{{old('genero')}}</option>
                                                            @else
                                                                <option selected value="">Seleccione Opción</option>
                                                            @endif    
                                                            <option>Femenino</option>
                                                            <option>Masculino</option>
                                                            
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="apodo">Apodo</label>
                                                    <input type="text" name="apodo" value="{{old('apodo')}}" class="form-control" placeholder="Ingrese Apodo">
                                                    
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