<?php

namespace mathmaster\Http\Controllers\Desafio;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\Escenario;
use mathmaster\Desafio\Experiencia;
use mathmaster\Escenario\SubEscenario;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Redirect;
use mathmaster\Http\Requests\Desafio\Escenario\SubEscenarioFormRequest;
use DB;
use Laratrust;

class SubEscenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $areas;
    private $colors;

    public function __construct()
    {
        $this->middleware('auth');
        $this->areas = ['Álgebra','Aritmética'];
        $this->colors = [
        ['value'=>'orange','nombre'=>'Naranja'],
        ['value'=>'naranja','nombre'=>'nombre']
        ];
    }

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idescenario)
    {   
        $escenario = Escenario::findOrFail($idescenario);
        $colors = $this->colors;
        $areas = $this->areas;

        return view('desafios.subescenarios.create',
            ['escenario'=>$escenario],['colors'=>$colors,'areas'=>$areas]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubEscenarioFormRequest $request)
    {
        $this->validate($request, [
        'nombre' => 'required|max:255|unique:sub_escenarios',
        ]);
        $subescenario = SubEscenario::create([
            'nombre' => $request->get('nombre'),
            'descripcion' => Purifier::clean($request->get('descripcion')),
            'fondo' => $request->get('fondo'),
            'area' => $request->get('area'),
            'puntos' => $request->get('puntos'),
            'color' => $request->get('color'),
            'escenario_id' => $request->get('escenario_id'),
        ]);
        $subescenario->save();
        return redirect()->route('subescenario.show', ['id' => $subescenario->id])->with('alert-success', "SubEscenario Actualizado con Éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $subescenario = SubEscenario::where('id',$id)->with('escenario')->with('desafios')->get()->first();

       $experiencia = Experiencia::where('user_id',Laratrust::user()->id)->get()->first();
       $escenario = $subescenario->Escenario;

       if(!Laratrust::user()->hasRole('admin')){
       if($escenario->nivel > $experiencia->nivel)
            return Redirect::to('escenario')->with('alert-danger', "<i class='fa fa-envelope'></i><b> ÁREA RESTRINGIDA. Debes ser de nivel <em>$escenario->nivel</em></b>");
       }                 
       if($experiencia)
            $nivel = $experiencia->nivel;
        else
            $nivel = 0;

        return view('desafios.subescenarios.show',["subescenario"=>$subescenario,'nivel'=>$nivel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $colors = $this->colors;
        $areas = $this->areas;
        $subescenario = SubEscenario::where('id',$id)->with('escenario')->with('desafios')->get()->first();
        return view('desafios.subescenarios.edit',["subescenario"=>$subescenario,
            'colors'=>$colors,'areas'=>$areas]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubEscenarioFormRequest $request, $id)
    {
        $this->validate($request, [
        'nombre' => 'required|max:255',
        ]);


        $subescenario = SubEscenario::findOrFail($id);
        $subescenario->puntos=$request->get('puntos');
        $subescenario->descripcion = Purifier::clean($request->get('descripcion'));
        $subescenario->fondo = $request->get('fondo');
        $subescenario->area = $request->get('area');
        $subescenario->color = $request->get('color');
        $subescenario->escenario_id =$request->get('escenario_id');
        $subescenario->update();

        return redirect()->route('subescenario.show', ['id' => $subescenario->id])->with('alert-success', "SubEscenario Actualizado con Éxito");
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
