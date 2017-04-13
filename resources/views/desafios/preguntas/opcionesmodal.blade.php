<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
             id="modal-seleccionar-{{$o->id}}" >
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
                        <p>{!!html_entity_decode($o->valor)!!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >
                                Cancelar
                            </button>
                            <a href="{{url('respuesta/validar',['idpregunta'=>$o->pregunta_id,'respuesta'=>$o->opcion])}}">
                            <button type="submit" class="btn btn-primary" >
                                Confirmar
                            </button>
                            </a>
                        </div>
                    </div>    
                </div>
</div>