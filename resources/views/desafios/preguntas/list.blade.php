<ul class="nav nav-pills">
                                @foreach($preguntas['preguntas'] as $i =>$p )
                                <li @if($i==0) class="active" @endif>
                                    <a href="#p{{$i+1}}" data-toggle="tab">Pregunta {{$i+1}}</a>
                                </li>
                                @endforeach

</ul>

<div class="tab-content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @include('desafios.preguntas.preguntas')                          
            </div>                                
        </div>
</div>     
