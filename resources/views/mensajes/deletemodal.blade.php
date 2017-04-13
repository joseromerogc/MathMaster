<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
 id="modal-delete-{{$m->id}}" >
     
{{Form::open(array('action'=>array('MensajeController@destroy',$m->id),
    'method'=>'delete'))}}
    {{Form::token()}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="close">
                    <span aria-hidden="true">&times;</span>    
                </button>
                <h4 class="modal-title">Eliminar Mensaje</h4>
            </div>
            <div class="modal-body">
            <p>Confirme si desea Eliminar el Mensaje</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary" >
                    Confirmar
                </button>
            </div>
        </div>    
    </div>
    
    {{Form::close()}}
</div>