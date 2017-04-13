  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#pista">Pista</button>
        <div id="pista" class="collapse">
                                    
                                    <a href="" data-target="#modal-pista-{{$p->id}}" data-toggle="modal" >
                                        <button class="btn btn-danger">
                                            <i class="fa fa-question fa-fw"></i>Desbloquear Pista
                                        </button>
                                    </a>
                                    <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-pista-{{$p->id}}" >
             <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                            aria-label="close">
                                <span aria-hidden="true">&times;</span>    
                            </button>
                            <h4 class="modal-title">Confirma</h4>
                        </div>
                        <div class="modal-body">
                        Estas Seguro?
                        <p>{!!html_entity_decode($p->id)!!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >
                                Cancelar
                            </button>
                            <a href="{{url('resdfasdspuesta/validar',['idpregunta'=>$p->id,'respuesta'=>$p->id])}}">
                            <button type="submit" class="btn btn-primary" >
                                Confirmar
                            </button>
                            </a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>