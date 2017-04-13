<?php

namespace mathmaster\Desafio;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    public $timestamps=false;
    protected $fillable = [
      	    'nivel' ,
            'puntos_nivel',
            'efectividad',
            'velocidad',
            'user_id',
    ];
}
