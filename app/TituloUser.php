<?php

namespace mathmaster;

use Illuminate\Database\Eloquent\Model;

class TituloUser extends Model
{
    public $timestamps=false;
    protected $fillable = [
      	    'user_id' ,
            'fecha',            
            'titulo_id'
    ];//

    public function Titulo()
    {
        return $this->belongsTo('mathmaster\Titulo');
    }
}
