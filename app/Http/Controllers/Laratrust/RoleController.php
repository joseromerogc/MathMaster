<?php

namespace mathmaster\Http\Controllers\Laratrust;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\App\Role;
use mathmaster\User;
use Illuminate\Support\Facades\Redirect;
use mathmaster\Http\Requests\Usuario\RoleFormRequest;
use Illuminate\Support\Facades\Input;
use Laratrust\Traits\LaratrustUserTrait;
use DB;

class RoleController extends Controller
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
        $roles=Role::with('permissions')->get();
        return view('usuario.role.index',["roles"=>$roles]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        $role = new Role;
        $role->name=$request->get('name');
        $role->display_name=$request->get('display_name');
        $role->description=$request->get('description');
        $role->save();
        return Redirect::to('role')->with('alert-success', "Role $role->display_name Creado con Éxito");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::findOrFail($id);
        $name=$role->name;
        $role->delete();

        return Redirect::to('role')->with('alert-success', "Rol $role->name Eliminado con Éxito");
    }

    /**
     * Muestra una lista de roles a registrar
     *
     * @return \Illuminate\Http\Response
     */
    public function listaajustar($iduser)
    {
        //$roles=Role::all();
        $user=User::findOrFail($iduser);

        $ids = DB::table('role_user')->where('user_id', '=', $iduser)->pluck('role_id');

        $roles = Role::whereNotIn('id', $ids)->get();
        return view('usuario.role.ajustar',["roles"=>$roles,"user"=>$user,'ids'=>$ids,'roles_user'=>$user->roles]);
    }

public function ajustar(Request $request)
    {   
        $roles= Input::get('roles');
        $id = Input::get('idusr');
        $user=User::findOrFail($id);
        $user->syncRoles($roles);
        

        return Redirect::to('usuario')->with('alert-success', "Roles Ajustados Éxitosamente a <b>$user->name</b>");
    }

}
