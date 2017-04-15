@extends('layouts.admin')

@section('encabezado')
Top Jugadores
@endsection

@section('contenido')
    <div class="col-lg-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Los Mejores</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Nivel</th>
                                            <th>Puntos Totales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($usuarios as $i=>$u)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$u->name}}</td>
                                            <td>{{$u->nivel}}</td>
                                            <td>{{$u->puntostotal}}</td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>
@endsection
