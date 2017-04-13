<?php

namespace mathmaster\Http\Controllers;

use Illuminate\Http\Request;
use mathmaster\User;
use Laratrust;
use Illuminate\Support\Facades\Redirect;
use mathmaster\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $usuarios=User::with('roles')->get();            
            return view('usuario.index',["usuarios"=>$usuarios]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFormRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $user->save();
        return Redirect::to('usuario')->with('alert-success', "Usuario $user->name Creado con Éxito");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Laratrust::user()->can('edit-user')){
            $user=User::findOrFail($id);
            return view('usuario.edit',['user'=>$user]);       
        }
        else{
         $user=Laratrust::user();
            return view('usuario.edit',['user'=>$user]);          
        }
    }
    public function editar()
    {
    
         $user=Laratrust::user();
            return view('usuario.edit',['user'=>$user]);          
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =Laratrust::user();

        if(Laratrust::user()->can('edit-user')){
            $user=User::findOrFail($id);
        }else{
            $user =Laratrust::user();            
        }

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
        
        $user->update();
        return Redirect::to('usuario')->with('alert-success', "Usuario $user->name Actualizado con Éxito");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $name=$user->name;
        $user->delete();

        return Redirect::to('usuario')->with('alert-success', "Usuario $user->name Eliminado con Éxito");
    }
}
