<?php

namespace mathmaster\Http\Controllers\Desafio;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\Http\Requests\Desafio\Escenario\EscenarioFormRequest;
use mathmaster\Escenario;
use mathmaster\Desafio\Experiencia;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Redirect;
use DB;
use Laratrust;

class EscenarioController extends Controller
{   
    private $tipos;

    public function __construct()
    {
        $this->middleware('auth');
        $this->tipos = ['Antiguo','Moderno'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $escenarios = [];

        foreach ($this->tipos as $t) {

                            $query=DB::table('escenarios')->where('tipo',$t)->get();
                            if(!$query->isEmpty()){
                                $escenarios[$t]['query']= $query;
                                $escenarios[$t]['nombre']=$t;
                            }
                        }
        $experiencia = Experiencia::where('user_id',Laratrust::user()->id)->get()->first();
        
        if($experiencia)
            $nivel = $experiencia->nivel;
        else
            $nivel = 0;

        return view('desafios.escenarios.index',["escenarios"=>$escenarios,'nivel'=>$nivel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desafios.escenarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscenarioFormRequest $request)
    {
        $this->validate($request, [
        'nombre' => 'required|max:255 |unique:escenarios',
        ]);

        $escenario = Escenario::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => Purifier::clean($request->get('descripcion')),
            'fondo' => $request->get('fondo'),
            'tipo' => $request->get('tipo'),
            'nivel' => $request->get('nivel'),
        ]);
        $escenario->save();
        return Redirect::to('usuario')->with('alert-success', "Escenario $escenario->name Creado con Éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $subescenarios = [];
        $escenario = Escenario::findOrFail($id);
        
        $areas = ['Álgebra','Aritmética'];

        $experiencia = Experiencia::where('user_id',Laratrust::user()->id)->get()->first();
        
        if(!Laratrust::user()->hasRole('admin')){
            if($escenario->nivel > $experiencia->nivel)
                return Redirect::to('escenario')->with('alert-danger', "<i class='fa fa-envelope'></i><b> ÁREA RESTRINGIDA. Debes ser de nivel <em>$escenario->nivel</em></b>");
        }

        foreach ($areas as $a) {

                            $query=DB::table('sub_escenarios')->where('area',$a,'and')->where('escenario_id',$id)->get();
                            if(!$query->isEmpty()){
                                $subescenarios[$a]['query']= $query;
                                $subescenarios[$a]['nombre']=$a;
                            }
                        }                
                            
        return view('desafios.escenarios.show',["escenario"=>$escenario,"subescenarios"=>$subescenarios,
            'areas'=>$areas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $escenario = Escenario::findOrFail($id);
        return view('desafios.escenarios.edit',["escenario"=>$escenario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EscenarioFormRequest $request, $id)
    {   
        $this->validate($request, [
        'nombre' => 'required|max:255',
        ]);

        $escenario = Escenario::findOrFail($id);
        $escenario->nombre=$request->get('nombre');
        $escenario->descripcion = Purifier::clean($request->get('descripcion'));
        $escenario->fondo = $request->get('fondo');
        $escenario->tipo = $request->get('tipo');
        $escenario->nivel = $request->get('nivel');
        $escenario->update();

        return redirect()->route('escenario.show', ['id' => $escenario->id])->with('alert-success', "Escenario Actualizado con Éxito");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
