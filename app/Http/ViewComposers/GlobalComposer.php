<?php
namespace mathmaster\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use mathmaster\Mensaje;
use mathmaster\Titulo;
use mathmaster\User;
use mathmaster\TituloUser;
use mathmaster\Notificaciones;
use mathmaster\Desafio\Experiencia;
use mathmaster\Desafio\RespuestaUser;
use Laratrust;
use Carbon\Carbon;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {   
        if(Auth::user()){

        $msgs = Mensaje::where('receptor_user_id',Auth::user()->id,'and')->where('leido','NO')->with('user')->get();

        $respuestas_completadas = RespuestaUser::where('user_id',Auth::user()->id,'and')->where('superada','SI')->get()->count();

        $experiencia =Experiencia::where('user_id',Auth::user()->id)->first();

        if(!$experiencia){
            $experiencia=  Experiencia::create([
                                'nivel' => 1,
                                'puntos_nivel' => 0,
                                'efectividad' => 0,
                                'velocidad' => 0,
                                'user_id' => Laratrust::user()->id
                                ]);
                  $notificacion=  Notificaciones::create([
                                'tipo' => 'historial',
                                'notificacion' =>'Registro',
                                'todos'=>0,
                                'fecha'=>Carbon::now(),
                                'leido'=>'NO',
                                'user_id' => Laratrust::user()->id
                                ]);
                  $notificacion->save();
                  $experiencia->save();
        }

        $titulo = Titulo::where('nivel','>=',$experiencia->nivel,'and')->
        where('efectividad','>=',$experiencia->efectividad,'and')->
        where('velocidad','<=',$experiencia->velocidad)
        ->orderby('rango','asc')->get()->last();

        $titulouser = TituloUser::where('user_id',Laratrust::user()->id,'and')->
        where('titulo_id',$titulo->id)->get()->first();

        if(!$titulouser){

            $titulouser=  TituloUser::create([
                                'fecha'=>Carbon::now(),
                                'titulo_id' =>$titulo->id,
                                'user_id' => Laratrust::user()->id
                                ]);
                  $notificacion=  Notificaciones::create([
                                'tipo' => 'titulo',
                                'notificacion' =>'Has Obtenido el Título de '.$titulo->nombre,
                                'todos'=>0,
                                'user_id' => Laratrust::user()->id,
                                'leido'=>'NO',
                                'fecha'=>Carbon::now(),
                                ]);
                  $notificacion->save();
                  $titulouser->save();
        }

        $titulo_meta =Titulo::where('rango',$titulo->rango+1)->get()->first();

        if(!$titulo_meta)
            $titulo_meta = $titulo;

        if($respuestas_completadas)
            $velocidad = $experiencia->velocidad/$respuestas_completadas;
        else
            $velocidad = 0;

        $meta_e=$titulo_meta->efectividad;

        if($meta_e == 0)       
                $efectividad_porc=0;
            else
                $efectividad_porc = round(($experiencia->efectividad/$meta_e))*100;

        $meta_n=$titulo_meta->nivel;

        if($meta_n == 0)       
                $nivel_porc=0;
            else    
                $nivel_porc = round((($experiencia->nivel/$meta_n)*100));

        $meta_v=$titulo_meta->velocidad;

        if($meta_v>$velocidad)
            $velocidad_porc = 100;
        else
            if($velocidad == 0)       
                $velocidad_porc= 0;
            else    
                $velocidad_porc = round((($velocidad-$meta_v)/$velocidad)*100) ; //porcentaje de velocidad

        $puntos_nivel_porc = round(($experiencia->puntos_nivel/250)*100) ; //porcentaje de nivel

        $msgenerales = Mensaje::where('todos',1)->with('user')->orderby('fecha','asc')->get();//Mensaje General 
        $noti_nivel =Notificaciones::where('user_id',Auth::user()->id,'and')->where('tipo','nivel','and')->where('leido',"NO")->get();
        $noti_desafio =Notificaciones::where('user_id',Auth::user()->id,'and')->where('tipo','desafio','and')->where('leido',"NO")->get();
        $noti_historial =Notificaciones::where('user_id',Auth::user()->id,'and')->where('tipo','historial','and')->where('leido',"NO")->get();
        $noti_titulo =Notificaciones::where('user_id',Auth::user()->id,'and')->where('tipo','titulo','and')->where('leido',"NO")->get();

        //RANKING

        $total_usuario = User::join('experiencias as e','users.id','=', 'e.user_id')->
       join('role_user as ru','users.id','=', 'ru.user_id')->
       where('ru.role_id','=','3')->get()->count();
       //usuarios por debajo del nivel y puntos
       $usuarios_down = User::join('experiencias as e','users.id','=', 'e.user_id')->
       join('role_user as ru','users.id','=', 'ru.user_id')->
       where('ru.role_id','=','3','and')->where('e.nivel','<',$experiencia->nivel,'and')
       ->where('e.puntos_nivel','<=',$experiencia->puntos_nivel)
       ->get()->count();

       $rank= $total_usuario-$usuarios_down;


        $view->with('msgs', $msgs);
        $view->with('nivel_porc', $nivel_porc);
        $view->with('puntos_nivel_porc', $puntos_nivel_porc);
        $view->with('velocidad_porc', $velocidad_porc);
        $view->with('efectividad_porc', $efectividad_porc);
        $view->with('msgenerales', $msgenerales);
        $view->with('noti_nivel', $noti_nivel);
        $view->with('noti_desafio', $noti_desafio);
        $view->with('noti_historial', $noti_historial);
        $view->with('noti_titulo', $noti_titulo);
        $view->with('ranking', $rank);
        $view->with('notificaciones', $noti_nivel->count()+$noti_desafio->count()+$msgenerales->count()+$noti_historial->count()+$noti_titulo->count());

        }
    }


}