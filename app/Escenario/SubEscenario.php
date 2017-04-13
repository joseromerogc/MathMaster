<?php

namespace mathmaster\Escenario;

use Illuminate\Database\Eloquent\Model;

class SubEscenario extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'nombre' ,
        'descripcion',
        'fondo',
        'area',
        'puntos',
        'color',
        'escenario_id'
    ];

    public function Escenario()
    {
        return $this->belongsTo('mathmaster\Escenario');
    }

    public function desafios()
    {
        return $this->hasMany('mathmaster\Desafio\Desafio');
    }
}
