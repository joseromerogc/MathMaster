@extends('layouts.admintable')

@section('encabezado')
Usuarios
@endsection

@section('script')

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#listausuario').DataTable({
                    "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ Usuarios por Página",
            "sZeroRecords": "No se encontraron Resultados",
            "sSearch": "Buscar: ",
            "sInfo": "Mostrando _START_ a _END_  de un Total de _TOTAL_ Usuarios",
            "sInfoEmpty": "Mostrando 0 de 0 de 0 Usuarios",
            "sInfoFiltered": "(Filtrado de un _MAX_ total de Usuarios)",
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
                        <div class="col-lg-8"><h4>Lista de Usuarios </h4></div>
                        <div class="col-lg-4"><a href="articulo/create"><button class="btn btn-success">Nuevo Usuario</button></a></div>
                        </div>    
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="listausuario">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Correo Electrónico</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $u)
                                            <tr>
                                                <td>{{$u->id}}</td>
                                                <td>{{$u->name}}</td>
                                                <td>{{$u->email}}</td>
                                                <td></td>
                                                {{-- <td>
                                                    <a href="{{URL::action('ArticuloController@edit',$art->idarticulo) }}"><button class="btn btn-info"> Editar</button></a>
                                                    <a href="" data-target="#modal-delete-{{$art->idarticulo}}" data-toggle="modal" ><button class="btn btn-danger" > Eliminar</button></a>
                                                </td> --}}
                                            </tr>
                                            {{-- @include('almacen.articulo.modal') --}}
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
</div>

@endsection
