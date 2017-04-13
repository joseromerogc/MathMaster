<?php

namespace mathmaster\Desafio;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
   public $timestamps=false;
    protected $fillable = [
      	    'opcion' ,
            'valor',
            'pregunta_id',

    ];

    public function Pregunta()
    {
        return $this->belongsTo('mathmaster\Desafio\Pregunta');
    }

}
