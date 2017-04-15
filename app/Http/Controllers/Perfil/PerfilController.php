<?php

namespace mathmaster\Http\Controllers\Perfil;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use Laratrust;
use mathmaster\Perfil\Perfil;
use mathmaster\Perfil\Matetoon;
use mathmaster\Http\Requests\Usuario\PerfilFormRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil = Perfil::where('user_id', Laratrust::user()->id)->with('user')->with('country')->first();

        $user = DB::table('users')->where('id', Laratrust::user()->id)->first();

        if(!$perfil)
            return redirect()->action('Perfil\PerfilController@create');
        else
            return view('perfil.index',['perfil'=>$perfil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $perfil = DB::table('perfils')->where('user_id', Laratrust::user()->id)->first();
        if(!$perfil){
        $countries = DB::table('countries')->orderBy('name')->get();
        return view('perfil.create',['countries'=>$countries]);   
        }
        else{
            return redirect()->action('Perfil\PerfilController@index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilFormRequest $request)
    {
        $user =Laratrust::user();
        $perfil = Perfil::create([
            'perfil' => $request->get('perfil'),
            'country_id' => $request->get('country'),
            'user_id' => $user->id,
            'apodo' => $request->get('apodo'),
            'genero' => $request->get('genero'),
        ]);
        $perfil->save();
        return redirect()->action('Perfil\PerfilController@index')->with('alert-success', "Perfil Creado con Éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'sirve';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $perfil = Perfil::where('user_id', Laratrust::user()->id)->with('country')->first();
        $countries = DB::table('countries')->orderBy('name')->get();
        return view('perfil.edit',['countries'=>$countries,'perfil'=>$perfil]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user =Laratrust::user();
        $perfil = Perfil::where('user_id', Laratrust::user()->id)->first();


        
        $perfil->perfil = $request->get('perfil');
            $perfil->country_id= $request->get('country');
            $perfil->user_id = $user->id;
            $perfil->apodo = $request->get('apodo');
            $perfil->genero = $request->get('genero');
        $perfil->update();
        return redirect()->action('Perfil\PerfilController@index')->with('alert-success', "Perfil Actualizado con Éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // return "sfsf";
    }
    public function matetoon($url)
    {   
        $matetoon = Matetoon::where('user_id', Laratrust::user()->id)->first();

        $img['newton']="https://lh3.googleusercontent.com/-pp7SnnO7bWo/U6N4BC_b82I/AAAAAAAAEsg/uVDOxLXUKhU/s1600/caricature-isaac-newton.png";
        $img['leibniz']="https://goo.gl/60JCFA";
        $img['descartes']="https://goo.gl/s6CFtq";
        $img['gauss']="https://goo.gl/3XtFuw";

        if($matetoon){
            $matetoon->imagen=$img[$url];
            $matetoon->update();
        }
        else{
        $matetoon = MateToon::create([
            'imagen' => $img[$url],
            'user_id' => Laratrust::user()->id,
        ]);
        $matetoon->save();
        }
        return Redirect::back()->with('alert-success','<b>MateTOON</b> Cambiado Exitosamente');
    }

}
