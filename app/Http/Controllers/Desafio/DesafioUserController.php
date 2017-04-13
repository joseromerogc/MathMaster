<?php

namespace mathmaster\Http\Controllers\Desafio;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\Desafio\RespuestaUser;
use mathmaster\Desafio\Pregunta;
use mathmaster\Desafio\Experiencia;
use mathmaster\Notificaciones;
use Laratrust;
use DB;
use Carbon\Carbon;

class DesafioUserController extends Controller
{
    /**
     * valida si la opcion seleccionada es la correcta
     *
     * @return \Illuminate\Http\Response
     */
    public function validar($idpregunta,$opcion)
    {   
            
            $pregunta = Pregunta::findOrFail($idpregunta);

            $respuesta=RespuestaUser::where('pregunta_id',$idpregunta,'and')
                                       ->where('user_id',Laratrust::user()->id)->get()->first();
                            
                            if(!$respuesta){
                            return redirect()->route('desafio.show', ['id' => $pregunta->desafio_id])->with('alert-danger', "ERROR: Iniciar Respuesta");                   
                            }
            $respuesta->intentos++;                

            if(strtoupper($pregunta->respuesta)==strtoupper($opcion)){
                $respuesta->superada='SI';
                //agregar puntos        
                $respuesta->finalizado=Carbon::now();        

                /*
                * Ingresar cambios en nivel
                */

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
                                'tipo' => 'desafio',
                                'notificacion' =>'Has Realizado tu Primer Desafio',
                                'todos'=>0,
                                'fecha'=>Carbon::now(),
                                'leido'=>'NO',
                                'user_id' => Laratrust::user()->id
                                ]);
                  $notificacion->save();

                }

                $puntos= $pregunta->puntos;

                if($respuesta->intentos>1){
                $puntos_nivel=round($puntos-$puntos*(($respuesta->intentos*15)/100));    
                $experiencia->puntos_nivel+=($puntos-$puntos*(($respuesta->intentos*15)/100));
                }
                else{
                 $puntos_nivel=$puntos;   
                 $experiencia->puntos_nivel+=$puntos;
                }

                $subionivel=false;

                if($experiencia->puntos_nivel>250){
                    $experiencia->nivel++;
                    $experiencia->puntos_nivel-=250;
                    $subionivel=true;

                    if($experiencia->nivel%5==0){
                    $notificacion=  Notificaciones::create([
                                'tipo' => 'nivel',
                                'notificacion' =>'Has Llegado al <b>Nivel </b>'.$experiencia->nivel,
                                'todos'=>0,
                                'fecha'=>Carbon::now(),
                                'leido'=>'NO',
                                'user_id' => Laratrust::user()->id
                                ]);
                    $notificacion->save();
                    }
                }

                $iniciado=Carbon::createFromFormat('Y-m-d H:i:s', $respuesta->iniciado);
                $experiencia->velocidad += $respuesta->finalizado->diffInSeconds($iniciado);
                $efect= 1/$respuesta->intentos;
                $experiencia->efectividad = ($experiencia->efectividad+$efect)/2;
                $respuesta->save();
                $experiencia->save();


                $pregunta = Pregunta::findOrFail($idpregunta);

                if($subionivel){
                    return redirect()->route('desafio.show', ['id' => $pregunta->desafio_id])->with('alert-info', "Has llegado al <b>Nivel</b> $experiencia->nivel")->
                    with('alert-success', "<em>Pregunta Superada con Éxito!!</em>. Has ganado <b> $puntos_nivel</b> puntos ");
                }
                else
                {
                return redirect()->route('desafio.show', ['id' => $pregunta->desafio_id])->with('alert-success', "<em>Pregunta Superada con Éxito!!!</em>. Has ganado <b>$puntos_nivel <b> puntos");
                }
            }
            else{
                $respuesta->save();
                return redirect()->route('desafio.show', ['id' => $pregunta->desafio_id])->with('alert-danger', "Respuesta Incorrecta");   
            }        
    }
    public function iniciar($idpregunta)
    {   
            $pregunta = Pregunta::findOrFail($idpregunta);

            $novacio = RespuestaUser::where('user_id',Laratrust::user()->id)->first(); 

            if(!$novacio){
                    $notificacion=  Notificaciones::create([
                                        'tipo' => 'desafio',
                                        'notificacion' =>'Has Iniciado tu Primer Desafio',
                                        'todos'=>0,
                                        'fecha'=>Carbon::now(),
                                        'leido'=>'NO',
                                        'user_id' => Laratrust::user()->id
                                        ]);
                    $notificacion->save();
                    }                       

            $respuesta = RespuestaUser::create([
                                'intentos' => 0,
                                'pista' => 'NO',
                                'superada' => 'NO',
                                'pregunta_id' => $idpregunta,
                                'user_id' => Laratrust::user()->id,
                                'iniciado'=> Carbon::now()
                                ]);
            $respuesta->save();

            if($respuesta)
            {
                return redirect()->route('desafio.show', ['id' => $pregunta->desafio_id])->with('alert-success', "Respuesta Iniciada con Éxito");   
            }
            else{
                return redirect()->route('desafio.show', ['id' => $pregunta->desafio_id])->with('alert-danger', "Respuesta No Iniciada");      
            }
    }

}
