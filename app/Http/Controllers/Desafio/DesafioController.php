<?php

namespace mathmaster\Http\Controllers\Desafio;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use mathmaster\Http\Requests\Desafio\DesafioFormRequest;
use mathmaster\Escenario\SubEscenario;
use mathmaster\Desafio\Desafio;
use mathmaster\Desafio\Pregunta;
use mathmaster\Desafio\Experiencia;
use mathmaster\Desafio\RespuestaUser;
use Mews\Purifier\Facades\Purifier;
use DB;
use Laratrust;

class DesafioController extends Controller
{
    private $areas;
    private $colors;

    public function __construct()
    {
        $this->middleware('auth');
        $this->colors = [
        ['value'=>'orange','nombre'=>'Naranja'],
        ['value'=>'naranja','nombre'=>'nombre']
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a f resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idsubescenario)
    {
        $subescenario = SubEscenario::findOrFail($idsubescenario);
        $colors = $this->colors;

        return view('desafios.desafios.create',
            ['subescenario'=>$subescenario],['colors'=>$colors]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesafioFormRequest $request)
    {
        $desafio = Desafio::create([
            'nombre' => $request->get('nombre'),
            'planteamiento' => Purifier::clean($request->get('planteamiento')),
            'fondo' => $request->get('fondo'),
            'descripcion' => $request->get('descripcion'),
            'sub_escenario_id' => $request->get('sub_escenario_id'),
            'color' => $request->get('color'),
            'nivel' => $request->get('nivel'),
        ]);
        $desafio->save();
        return redirect()->route('desafio.show', ['id' => $desafio->id])->with('alert-success', "Desafio $desafio->nombre Creado con Éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desafio = Desafio::where('id',$id)->with('subescenario')->with('preguntas')->get()->first();
        
        $preguntas=Pregunta::where('desafio_id',$desafio->id)->with('opciones')->get();

        $experiencia = Experiencia::where('user_id',Laratrust::user()->id)->get()->first();
        
        if(!Laratrust::user()->hasRole('admin')){
            if($desafio->nivel > $experiencia->nivel)
                return redirect()->route('subescenario.show', ['id' => $desafio->SubEscenario->id])->with('alert-danger', "<i class='fa fa-envelope'></i><b> ÁREA RESTRINGIDA</b>. Debes ser de nivel <em>$desafio->nivel</em>");
        }

        $preguntas_respuestas=array();
        $preguntas_respuestas['preguntas']=array();
        $preguntas_respuestas['respuestas']=array();

        foreach ($preguntas as $key => $p) {
            $preguntas_respuestas['preguntas'][$key]=$p;
            $preguntas_respuestas['respuestas'][$key]=RespuestaUser::where('pregunta_id',$p->id,'and')
            ->where('user_id',Laratrust::user()->id)->get()->first();
            
        }

        $experiencia = Experiencia::where('user_id',Laratrust::user()->id)->get()->first();

        return view('desafios.desafios.show',["desafio"=>$desafio,'preguntas'=>$preguntas_respuestas]);
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
        $desafio=Desafio::where('id',$id)->with('subescenario')->get()->first();
        $subescenario=$desafio->SubEscenario;

        return view('desafios.desafios.edit',
            ['subescenario'=>$subescenario,'colors'=>$colors,'desafio'=>$desafio]
            );
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
        $desafio = Desafio::findOrFail($id);
        $desafio->nombre = $request->get('nombre');
        $desafio->planteamiento= Purifier::clean($request->get('planteamiento'));
        $desafio->fondo = $request->get('fondo');
        $desafio->descripcion= $request->get('descripcion');
        $desafio->sub_escenario_id = $request->get('sub_escenario_id');
        $desafio->color = $request->get('color');
        $desafio->nivel = $request->get('nivel');
    
        $desafio->update();
        return redirect()->route('desafio.show', ['id' => $desafio->id])->with('alert-success', "Desafio $desafio->nombre Actualizado con Éxito");
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
