<?php

namespace mathmaster\Http\Controllers;

use Illuminate\Http\Request;
use mathmaster\User;
use mathmaster\App\Role;
use Laratrust;

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
        return view('admin.home',["usuarios"=>$usuarios,"cantidadusuarios"=>$cantidadusuarios]);
        }
        else{
         return view('home');   
        }
        
    }
}
