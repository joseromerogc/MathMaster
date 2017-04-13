@extends('layouts.admin')

@section('encabezado')
Notificaciones
@endsection

@section('head')
<link href="{{asset('plugins/timeline/timeline.css')}}" rel="stylesheet" />
@endsection

@section('contenido')

<div class="col-lg-12">
                    <!--Timeline -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i>Historial de Desafio
                        </div>

                        <div class="panel-body">
                            <ul class="timeline">
                                
                                @foreach($historial as $i=>$h)
                                    @if(($i+1)%2==0) <!-- IMPARES-->
                                    <li>
                                        <div class="timeline-badge success">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Historial #{{$h->id}}</h4>
                                                <p>
                                                    <small class="text-muted"><i class="fa fa-time"></i>{{$h->diffFecha()}}</small>
                                                </p>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{!!$h->notificacion!!}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @else <!-- IMPARES-->
                                    <li class="timeline-inverted">
                                        <div class="timeline-badge warning">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Historial #{{$h->id}}</h4>
                                                <p>
                                                    <small class="text-muted"><i class="fa fa-time"></i>{{$h->diffFecha()}}</small>
                                                </p>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{!!$h->notificacion!!}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!--End Timeline -->
</div>


@endsection
