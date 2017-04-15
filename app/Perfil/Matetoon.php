<?php

namespace mathmaster\Perfil;

use Illuminate\Database\Eloquent\Model;

class Matetoon extends Model
{
    public $timestamps=false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen',
        'user_id'
    ];
    protected $guarded=[
    ];

}
