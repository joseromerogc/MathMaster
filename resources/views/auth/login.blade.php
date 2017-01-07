@extends('layouts.admin2')
@section('contenido')
		    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Ingrese Datos de Acceso</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ url('/password/reset') }}">Olvidastes Tus Datos?<span class="glyphicon glyphicon-name"></span></a></div>
                    </div>     

                    {{-- INICIO FORMULARIO INGRESO --}}
                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                                    
                            <div style="margin-bottom: 25px" class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="login-username" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>                            
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                    
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif        
                            </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" > 
                                          Recordarme
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                    <button type="submit" class="btn btn-success btn-block">
                                    Ingresar
                                    </button>
                                      {{-- <a id="btn-login" href="#" class="btn btn-success btn-block">Ingresar  </a> --}}
                                      {{-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> --}}

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            No Tienes una Cuenta! 
                                        <a href="{{url('/register')}}">
                                            Registrate Aquí
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     
                        {{-- FIN FORMULARIO INGRESO --}}    
            
         </div> 
    </div></div></div>
@endsection