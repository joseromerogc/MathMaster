<?php

namespace mathmaster\Perfil;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    public function users()
    {
        return $this->hasMany('mathmaster\User');
    }
}
