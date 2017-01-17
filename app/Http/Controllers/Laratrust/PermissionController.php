<?php

namespace mathmaster\Http\Controllers\Laratrust;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\App\Permission;
use mathmaster\App\Role;
use Illuminate\Support\Facades\Redirect;
use mathmaster\Http\Requests\Usuario\PermissionFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class PermissionController extends Controller
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
        $permissions=DB::table('permissions')->get();
        return view('usuario.permission.index',["permissions"=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionFormRequest $request)
    {
        $permission = new Permission;
        $permission->name=$request->get('name');
        $permission->display_name=$request->get('display_name');
        $permission->description=$request->get('description');
        $permission->save();
        return Redirect::to('permission')->with('alert-success', "Permiso <b>$permission->display_name</b> Creado con Éxito");;
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
        $permission=Permission::findOrFail($id);
        $name=$permission->name;
        $permission->delete();

        return Redirect::to('permission')->with('alert-success', "Permiso <b>$permission->name</b> Eliminado con Éxito");
    }
    /**
     * Muestra una lista de permisos a registrar
     *
     * @return \Illuminate\Http\Response
     */
    public function listaajustar($idrole)
    {
        //$roles=Role::all();
        $role=Role::findOrFail($idrole);

        $ids = DB::table('permission_role')->where('role_id', '=', $idrole)->pluck('permission_id');

        $permissions = Permission::whereNotIn('id', $ids)->get();
        return view('usuario.permission.ajustar',["permissions"=>$permissions,"role"=>$role,'ids'=>$ids,'permission_role'=>$role->permissions]);
    }

public function ajustar(Request $request)
    {   
        $permissions= Input::get('permissions');
        $idrole = Input::get('idrole');
        $role=Role::findOrFail($idrole);
        $role->permissions()->sync([]); //ELIMINAR PARA AGREGAR LOS NUEVOS PERMISOS
        if($permissions)
            $role->attachPermissions($permissions);
        else
            $role->permissions()->sync([]);

        return Redirect::to('role')->with('alert-success', "Permisos Ajustados Éxitosamente a <b>$role->display_name</b>");
    }
}
