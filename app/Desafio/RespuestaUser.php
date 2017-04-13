<?php

namespace mathmaster\Desafio;

use Illuminate\Database\Eloquent\Model;

class RespuestaUser extends Model
{
    public $timestamps=false;
    protected $fillable = [
      	    'intentos' ,
            'superada',
            'pista',
            'user_id',
            'iniciado',
            'finalizado',
            'pregunta_id',

    ];

    public function User()
    {
        return $this->belongsTo('mathmaster\User');
    }
    public function Pregunta()
    {
        return $this->belongsTo('mathmaster\Desafio\Pregunta');
    }
}
