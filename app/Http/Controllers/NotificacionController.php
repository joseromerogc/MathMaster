<?php

namespace mathmaster\Http\Controllers;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\Notificaciones;
use Illuminate\Support\Facades\Redirect;
use Auth;


class NotificacionController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Ihttp://localhost:8000/homelluminate\Http\Response
     */

    public function historial()
    {
        
        Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','historial')->update(['leido'=>"SI"]);

        $historial = Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','historial')->orderby('fecha','desc')->get();
        return view('notificaciones.historial',['historial'=>$historial]); 
    }
    public function desafio()
    {
        
        Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','desafio')->update(['leido'=>"SI"]);

        $historial = Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','desafio')->orderby('fecha','desc')->get();
        return view('notificaciones.desafio',['historial'=>$historial]); 
    }
    public function nivel()
    {
        
        Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','nivel')->update(['leido'=>"SI"]);

        $historial = Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','nivel')->orderby('fecha','desc')->get();
        return view('notificaciones.nivel',['historial'=>$historial]); 
    }
    public function titulo()
    {
        
        Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','titulo')->update(['leido'=>"SI"]);

        $historial = Notificaciones::where('user_id',Auth::user()->id,'and')
        ->where('tipo','titulo')->orderby('fecha','desc')->get();
        return view('notificaciones.titulo',['historial'=>$historial]); 
    }

    
}
