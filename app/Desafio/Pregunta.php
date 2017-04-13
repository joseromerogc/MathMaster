<?php

namespace mathmaster\Desafio;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public $timestamps=false;
    protected $fillable = [
      	    'puntos' ,
            'pista',
            'formulacion',
            'respuesta',
            'desafio_id',
    ];

    public function Desafio()
    {
        return $this->belongsTo('mathmaster\Desafio\Desafio');
    }

    public function opciones()
    {
        return $this->hasMany('mathmaster\Desafio\Opcion');
    }

    public function respuestas()
    {
        return $this->hasMany('mathmaster\Desafio\RespuestaUser');
    }
}
