@foreach($preguntas['preguntas'] as $i =>$p )
                <div 
                                @if($i==0) class="tab-pane fade in active" @else class="tab-pane fade" @endif
                            id="p{{$i+1}}">
                                    <h4 class="text-center">Pregunta {{$i+1}}</h4>
                                    <p>{{$p->formulacion}}</p>
                                    <p>Puntos <span class="label label-info">{{$p->puntos}}</span>
                                    </p>
                                    <p>
                                        @include('desafios.preguntas.pista')
                                    </p>
                            @permission('create-desafio')
                                    <h3>Pista:</h3>

                                    <p>{!!html_entity_decode($p->pista)!!}</p>
                                    
                            <p>
                                <a href="{{url('opcion/create',['id'=>$p->id])}}">
                            <button class="btn btn-success">
                                <i class="fa fa-check-square fa-fw"></i>
                                @if($p->opciones->isEmpty())
                                    Agregar 
                                @else
                                    Ajustar
                                @endif    
                                Opciones
                            </button>
                            </a>
                            </p>
                            @endpermission
@if(!$p->opciones->isEmpty())
            @if(!$preguntas['respuestas'][$i])
            <p>
            <a href="{{url('respuesta/iniciar',['idpregunta'=>$p->id])}}">
                                        <button class="btn btn-success">
                                            <i class="fa fa-check-share fa-fw"></i>
                                            Responder
                                        </button>
            </a>
            </p>
            @else
                @if($preguntas['respuestas'][$i]->superada=="SI")
                    <div class="alert alert-success">
                        <strong>Muy Bien!</strong> 
                        Respuesta Superada
                    </div>
                @else
                <div class="col-sm-12 col-md-12">
                    @foreach($p->opciones as $o)
                  <div class="col-sm-4 col-md-4">
                    <div class="thumbnail">
                      <p>{!!html_entity_decode($o->valor)!!}</p>
                      <div class="caption">
                        <h3>Opción {{strtoupper($o->opcion)}}</h3>
                        <p>
                        <a href="" data-target="#modal-seleccionar-{{$o->id}}" data-toggle="modal" href="#" class="btn btn-primary" role="button">
                        Seleccionar</a> </p>
                      </div>
                    </div>
                  </div>

                    @include('desafios.preguntas.opcionesmodal')
                    @endforeach
                </div>
                @endif
            @endif
@endif
</div>
@endforeach