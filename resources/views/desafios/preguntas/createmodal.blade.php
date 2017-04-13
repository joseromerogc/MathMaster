<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
 id="modal-create" >
     
{!!Form::open(array('url'=>'pregunta','method'=>'POST','autocomplete'=>'on'))!!}
    {{Form::token()}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="close">
                    <span aria-hidden="true">&times;</span>    
                </button>
                <h4 class="modal-title">Registrar Nueva Pregunta</h4>
            </div>
            <div class="modal-body">
                    
                <div class="form-group">
                                                        <label for="desafio">Desafio</label>
                                                        <select class="form-control" name="desafio_id">
                                                            <option value="{{$desafio->id}}">{{$desafio->nombre}}</option>
                                                        </select>
                </div>
                <div class="form-group">
                                                    <label for="nombre">Formulación</label>
                                                    <input type="text" name="formulacion" value="{{old('formulacion')}}" class="form-control" placeholder="Ingrese Formulación de la Pregunta">
                </div>                                    
                <div class="form-group">
                    <label for="nivel">Puntos</label>
                                            <input type="number" name="puntos" min="1" max="315"  value="{{old('puntos')}}" class="form-control" placeholder="Ingrese Puntos">
                </div>
                <div class="form-group">
                                            <label for="nivel">Respuesta</label>
                                            <select class="form-control" name="respuesta">
                                                            @if(old('respuesta'))
                                                                <option selected value="{{old('respuesta')}}" required>{{old('respuesta')}}</option>
                                                            @else
                                                                <option  value="">Seleccione</option>
                                                                <option  value="a">a</option>
                                                                <option  value="b">b</option>
                                                                <option  value="c">c</option>
                                                                <option  value="d">d</option>
                                                                <option  value="e">e</option>
                                                                <option  value="f">f</option>
                                                                <option  value="g">g</option>
                                                            @endif
                                                        </select>
                </div>                                                        
                <div class="form-group">
                                            <label for="pista">Pista</label>
                                                        <textarea name="pista" class="ckeditor">
                                                            {{old('respuesta')}}
                                                        </textarea>
                </div>                                                        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary" >
                    Guardar
                </button>
            </div>
        </div>    
    </div>
    
    {{Form::close()}}
</div>