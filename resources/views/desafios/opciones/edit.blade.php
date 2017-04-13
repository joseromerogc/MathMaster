@extends('layouts.admin')

@section('encabezado')
Crear Opciones | {{$pregunta->Desafio->nombre}}
@endsection

@section('head')
<script src="{{asset('vendors/ckeditor/ckeditor.js')}}">
    CKEDITOR.replace( 'editor1', { toolbar : [ [ 'EqnEditor', 'Bold', 'Italic' ] ] });
</script>

@endsection


@section('contenido')

    {!!Form::open(array('url'=>'opcion','method'=>'POST','autocomplete'=>'on'))!!}
    {{Form::token()}}
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Actualice Datos
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="pregunta">Pregunta</label>
                                                        <input type="text" name="pregunta" value="{{$pregunta->formulacion}}" readonly>
                                                        <input type="hidden" name="pregunta_id" value="{{$pregunta->id}}" readonly>
                                                    </div>
                                            </div>
                                            </div>    

                                            @foreach($opciones as $o)
                                            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                        <label for="descripcion">Opción {{strtoupper($o->opcion)}}</label>
                                                        <textarea class="ckeditor" name="valors[{{$o->opcion}}]">
                                                        {{$opciones[$o->opcion]->valor}}
                                                        </textarea>

                                                </div>
                                            </div>
                                            @endforeach
                              
                                            </div>
                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                        <button class="btn btn-primary" type="submit">Ajustar</button>
                                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                                </div>
                              
                                            </div>
                                        </div>
                </div>
            </div></div></div>

    {!!Form::close()!!}
    
@endsection