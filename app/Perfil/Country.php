<?php

namespace mathmaster\Perfil;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps=false;
    
    public function perfiles()
    {
        return $this->hasMany('mathmaster\Perfil\Perfil');
    }
}
