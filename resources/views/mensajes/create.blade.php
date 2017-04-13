@extends('layouts.admin')

@section('encabezado')
Nuevo Mensaje
@endsection

@section('head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script src="{{asset('vendors/selectize/dist/js/standalone/selectize.min.js')}}"></script>

<script>tinymce.init({ selector:'textarea' });</script>

<link href="{{ asset('vendors/selectize/dist/css/selectize.bootstrap3.css') }}" rel="stylesheet">

<style type="text/css">
        .selectize-control::before {
            -moz-transition: opacity 0.2s;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
            content: ' ';
            z-index: 2;
            position: absolute;
            display: block;
            top: 12px;
            right: 34px;
            width: 16px;
            height: 16px;
            background: url(images/spinner.gif);
            background-size: 16px 16px;
            opacity: 0;
        }
        .selectize-control.loading::before {
            opacity: 0.4;
        }
        </style>
@endsection


@section('contenido')

    {!!Form::open(array('url'=>'mensaje','method'=>'POST','autocomplete'=>'on'))!!}
    {{Form::token()}}
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Ingrese Información
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                        <label for="todos">Enviar a: </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="todos" id="uno" value="0" checked>UNO
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="todos" id="todos" value="1">TODOS
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6" id="div_destinatario">
                                                        <label for="receptor_user_id">Destinatario</label>
                                                        <select class="form-control" name="receptor_user_id" id="destinatario" placeholder="Seleccione Destinario..."
                                                        >
                                                            
                                                            @if(old('receptor_user_id'))
                                                                <option selected value="{{old('receptor_user_id')}}" required>{{old('receptor_user_id')}}</option>
                                                            @else
                                                                <option selected value="">Seleccione Destinario</option>
                                                            @endif    
                                                            @foreach($users as $u)
                                                                <option value="{{$u->id}}">{{$u->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                        <label for="descripcion">Mensaje</label>
                                                        <textarea name="mensaje">
                                                        </textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                        <button class="btn btn-primary" type="submit">Enviar</button>
                                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                                </div>
                              
                                            </div>
                                        </div>
                </div>
            </div></div></div>

    {!!Form::close()!!}

<script>
       $(document).ready(function(){
        $('#destinatario').selectize({
            create: true
            }
            );

        $('#todos').click(function(){
            $("#div_destinatario").fadeOut("slow");            

        });
        $('#uno').click(function(){
            $("#div_destinatario").fadeIn("slow");            

        });
    });         
</script>    


@endsection

