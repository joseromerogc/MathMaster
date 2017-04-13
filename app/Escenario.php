<?php

namespace mathmaster;

use Illuminate\Database\Eloquent\Model;

class Escenario extends Model
{	
	public $timestamps=false;
	
    protected $fillable = [
        'nombre' ,
            'descripcion',
            'fondo',
            'tipo',
            'nivel',
    ];
    public function subescenarios()
    {
        return $this->hasMany('mathmaster\Escenario\subescenario');
    }
}
