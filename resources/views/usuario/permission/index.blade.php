@extends('layouts.admintable')

@section('encabezado')
Permisos
@endsection

@section('script')

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#listapermissions').DataTable({
                    "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ Permisos por Página",
            "sZeroRecords": "No se encontraron Resultados",
            "sSearch": "Buscar: ",
            "sInfo": "Mostrando _START_ a _END_  de un Total de _TOTAL_ Permisos",
            "sInfoEmpty": "Mostrando 0 de 0 de 0 Permisos",
            "sInfoFiltered": "(Filtrado de un _MAX_ total de Permisos)",
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
                        <div class="col-lg-8"><h4>Lista de Permisos </h4></div>
                        <div class="col-lg-4"><a href="{{url('permission/create')}}"><button class="btn btn-success">Nuevo Rol</button></a></div>
                        </div>    
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="listapermissions">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Nombre para Mostrar</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $p)
                                            <tr>
                                                <td>{{$p->id}}</td>
                                                <td>{{$p->name}}</td>
                                                <td>{{$p->display_name}}</td>
                                                <td>{{$p->description}}</td>
                                                <td>
                                                    <a href="{{URL::action('UsuarioController@edit',$p->id) }}"><button class="btn btn-info"> Editar</button></a>
                                                    <a href="" data-target="#modal-delete-{{$p->id}}" data-toggle="modal" ><button class="btn btn-danger" > Eliminar</button></a>
                                                </td>
                                            </tr>
                                            @include('usuario.permission.modal')
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
</div>

@endsection
