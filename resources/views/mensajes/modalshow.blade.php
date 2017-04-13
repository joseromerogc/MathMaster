<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
 id="modal-mensaje-show-{{$m->id}}" >
     
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="close">
                    <span aria-hidden="true">&times;</span>    
                </button>
                <h4 class="modal-title">Mensaje de {{$m->User->name}}</h4>
            </div>
            <div class="modal-body">
            <p>    
            <b>Mensaje:</b> {!!$m->mensaje!!}
            </p>
            <p>
                <b>Enviado:</b>{{$m->fecha}}
            </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" >
                    Listo
                </button>
            </div>
        </div>    
    </div>
</div>