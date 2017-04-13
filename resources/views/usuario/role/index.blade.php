@extends('layouts.admintable')

@section('encabezado')
Roles
@endsection

@section('script')

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#listaroles').DataTable({
                    "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ Roles por Página",
            "sZeroRecords": "No se encontraron Resultados",
            "sSearch": "Buscar: ",
            "sInfo": "Mostrando _START_ a _END_  de un Total de _TOTAL_ Roles",
            "sInfoEmpty": "Mostrando 0 de 0 de 0 Roles",
            "sInfoFiltered": "(Filtrado de un _MAX_ total de Roles)",
            "oPaginate": {
                "sNext": "Página Siguiente",
                "sPrevious": "Página Anterior"
                }
        }
         }           );
            } );
</script>
@endsection


@section('contenido')

<div class="col-lg-12">
<div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="row">
                        <div class="col-lg-8"><h4>Lista de Roles </h4></div>
                        <div class="col-lg-4"><a href="{{url('role/create')}}"><button class="btn btn-success">Nuevo Rol</button></a></div>
                        </div>    
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="listaroles">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Nombre para Mostrar</th>
                                            <th>Descripción</th>
                                            <th>Permisos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $r)
                                            <tr>
                                                <td>{{$r->id}}</td>
                                                <td>{{$r->name}}</td>
                                                <td>{{$r->display_name}}</td>
                                                <td>{{$r->description}}</td>
                                                <td>
                                                    @foreach($r->permissions as $p)
                                                    <span class="label label-primary">{{$p->display_name}}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{URL::action('UsuarioController@edit',$r->id) }}"><button class="btn btn-info"> Editar</button></a>
                                                    <a href="" data-target="#modal-delete-{{$r->id}}" data-toggle="modal" ><button class="btn btn-danger" > Eliminar</button></a>
                                                    <a href="{{URL::action('Laratrust\PermissionController@listaajustar',$r->id) }}" ><button class="btn btn-success" > Ajustar Permisos</button></a>
                                                </td>
                                            </tr>
                                            @include('usuario.role.modal')
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
</div>

@endsection
