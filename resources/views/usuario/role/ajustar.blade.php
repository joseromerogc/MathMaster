@extends('layouts.admin')

@section('encabezado')
Agregar Rol
@endsection

@section('contenido')

    {!!Form::open(array('action' => ['Laratrust\RoleController@ajustar','idusr'=>$user->id], 'method'=>'POST' ,'autocomplete'=>'off'))!!}
    {{Form::token()}}
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Seleccione el/los Roles del Usuario <b>{{$user->name}}</b>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                          
                <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                        <label>Roles</label>
                        <select multiple class="form-control" name="roles[]" required>
                                       {{--ROLES SELECCIONADOS--}}
                                       @foreach ($roles_user as $r)
                                                <option value="{{$r->id}}" selected> {{$r->display_name}}</option>
                                        @endforeach        

                                        @foreach ($roles as $r)
                                                <option value="{{$r->id}}" > {{$r->display_name}}</option>
                                        @endforeach        
                        </select>
                </div>        

                <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
  
                </div>
                        </div>
                </div>
            </div>
            </div>
</div>

    {!!Form::close()!!}
    
@endsection