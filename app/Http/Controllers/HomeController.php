<?php

namespace mathmaster\Http\Controllers;

use Illuminate\Http\Request;
use mathmaster\User;
use mathmaster\TituloUser;
use mathmaster\App\Role;
use mathmaster\Desafio\Desafio;
use mathmaster\Desafio\RespuestaUser;
use mathmaster\Desafio\Experiencia;
use mathmaster\Notificaciones;
use Laratrust;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        //sino tiene el usuario participante lo registramos

        if(Laratrust::user()->hasRole('admin')){
        $usuarios=Role::with('users')->where('id', 3)->get();            
        $cantidadusuarios=$usuarios->count();
        $cantidaddesafios = Desafio::all()->count();            

        return view('admin.home',["usuarios"=>$usuarios,"cantidadusuarios"=>$cantidadusuarios,
            'cantidaddesafios'=>$cantidaddesafios
            ]);
        }
        else{

        $experiencia=Experiencia::where('user_id',Laratrust::user()->id)->get()->first();   

        if(!$experiencia){
            $experiencia=  Experiencia::create([
                                'nivel' => 0,
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

        $superadas = RespuestaUser::where('user_id',Laratrust::user()->id)->get()->count();

         if(!$experiencia){
                    Experiencia::create([
                                'nivel' => 0,
                                'puntos_nivel' => 0,
                                'efectividad' => 0,
                                'velocidad' => 0,
                                'user_id' => Laratrust::user()->id
                                ]);                    
                }   

        $respuestas_completadas = RespuestaUser::where('user_id',Laratrust::user()->id,'and')->where('superada','SI')->get()->count();
        
        if($respuestas_completadas)
            $velocidad = ($experiencia->velocidad/$respuestas_completadas)/60;
        else
            $velocidad = 0;      

         $titulo = TituloUser::where('user_id',Laratrust::user()->id)->with('titulo')->get()->last();


         return view('home',['experiencia'=>$experiencia,'superadas'=>$superadas,'velocidad'=>$velocidad,'titulo'=>$titulo]);   
        }
        
    }
  public function tops()
    {   
       $usuarios = User::join('experiencias as e','users.id','=', 'e.user_id')->
       select('users.name',DB::raw('(e.nivel*250+e.puntos_nivel) as puntostotal'),'e.nivel'
        )->get();

      return view('usuario.tops',['usuarios'=>$usuarios]);   

    }  

}
