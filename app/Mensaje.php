<?php

namespace mathmaster;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    public $timestamps=false;
    protected $fillable = [
      	    'tipo' ,
            'mensaje',
            'fecha',
            'emisor_user_id',
            'receptor_user_id',
            'leido',
            'todos'
    ];

    public function User()
    {
        return $this->belongsTo('mathmaster\User','emisor_user_id');
    }

    public function diffFecha(){
        $str = $this->fecha;
        date_default_timezone_set('America/Caracas'); //Change as per your default time
        $str = strtotime($str);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return "Hace ".intval($time_differnce/$years)." Años";
        }else if(intval($time_differnce/$years) > 0)
        {
            return "Hace ".intval($time_differnce/$years)." Año";
        }else if(intval($time_differnce/$months) > 1)
        {
            return "Hace ".intval($time_differnce/$months)." Meses";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return "Hace ".intval(($time_differnce/$months))." Mes";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return "Hace ".intval(($time_differnce/$days))." Dias";
        }else if (intval(($time_differnce/$days)) > 0) 
        {
            return "Hace ".intval(($time_differnce/$days))." Dia";
        }else if (intval(($time_differnce/$hours)) > 1) 
        {
            return "Hace ".intval(($time_differnce/$hours))." Horas";
        }else if (intval(($time_differnce/$hours)) > 0) 
        {
            return "Hace ".intval(($time_differnce/$hours))." Hora";
        }else if (intval(($time_differnce/$minutes)) > 1) 
        {
            return "Hace ".intval(($time_differnce/$minutes))." Minutos";
        }else if (intval(($time_differnce/$minutes)) > 0) 
        {
            return "Hace ".intval(($time_differnce/$minutes))." Minuto";
        }else if (intval(($time_differnce)) > 1) 
        {
            return "Hace ".intval(($time_differnce))." seconds ago";
        }else
        {
            return "Hace pocos segundos";
        }
    }
}
