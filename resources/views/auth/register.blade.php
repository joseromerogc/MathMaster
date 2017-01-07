@extends('layouts.admin2')
@section('contenido')
<div class="container">    
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Registro</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="{{url('/login')}}">Ingresar</a></div>
                        </div>  
                        <div class="panel-body" >

                        {{-- INICIO FORMULARIO DE REGISTRO --}}        

                            <form id="signupform" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-3 control-label">Nombre Completo</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre Completo" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-3 control-label">Correo Electrónico</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                    </div>
                                </div>
                                    
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-3 control-label">Contraseña</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required="">
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-3 control-label">Confirmar Contraseña</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation"  placeholder="Confirmar Contraseña">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info btn-block"><i class="icon-hand-right"></i> Registrate</button>
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    {{-- <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div> --}}                                           
                                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ url('/password/reset') }}">Olvidastes Tus Datos?</a></div>    
                                </div>
                                
                            </form>
                         </div>
                    </div>
            
         </div> 
    </div>
@endsection