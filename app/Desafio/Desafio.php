<?php

namespace mathmaster\Desafio;

use Illuminate\Database\Eloquent\Model;

class Desafio extends Model
{
    public $timestamps=false;
    protected $fillable = [
      	    'nombre' ,
            'descripcion',
            'fondo',
            'planteamiento',
            'nivel',
            'color',
            'sub_escenario_id',
    ];

    public function SubEscenario()
    {
        return $this->belongsTo('mathmaster\Escenario\SubEscenario');
    }

    public function preguntas()
    {
        return $this->hasMany('mathmaster\Desafio\Pregunta');
    }
}
