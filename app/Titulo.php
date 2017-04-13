<?php

namespace mathmaster;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
   public $timestamps=false;
   protected $fillable = [
      	    'nivel' ,
            'rango',
            'nombre',
            'efectividad',
            'velocidad', 
            'imagen',           
    ];
}
