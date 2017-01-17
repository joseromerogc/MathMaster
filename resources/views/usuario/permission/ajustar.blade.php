@extends('layouts.admin')

@section('encabezado')
Agregar Permiso
@endsection

@section('contenido')

    {!!Form::open(array('action' => ['Laratrust\PermissionController@ajustar','idrole'=>$role->id], 'method'=>'POST' ,'autocomplete'=>'off'))!!}
    {{Form::token()}}
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Seleccione el/los Permisos del Role <b>{{$role->display_name}}</b>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                          
                <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                        <label>Permisos</label>
                        <select multiple class="form-control" name="permissions[]">
                                       {{--ROLES SELECCIONADOS--}}
                                       @foreach ($permission_role as $p)
                                                <option value="{{$p->id}}" selected> {{$p->display_name}}</option>
                                        @endforeach        

                                        @foreach ($permissions as $p)
                                                <option value="{{$p->id}}" > {{$p->display_name}}</option>
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