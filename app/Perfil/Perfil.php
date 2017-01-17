<?php

namespace mathmaster\Perfil;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{   
    public $timestamps=false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'apodo', 'perfil', 'country_id','genero','user_id'
    ];
    protected $guarded=[
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('mathmaster\User');

    }
    public function country()
    {
        return $this->belongsTo('mathmaster\Perfil\Country');
    }
}
