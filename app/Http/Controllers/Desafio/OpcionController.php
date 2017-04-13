<?php

namespace mathmaster\Http\Controllers\Desafio;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\Desafio\Desafio;
use mathmaster\Desafio\Opcion;
use mathmaster\Desafio\Pregunta;
use Mews\Purifier\Facades\Purifier;
use DB;

class OpcionController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idpregunta)
    {
        $pregunta = Pregunta::findOrFail($idpregunta)->with('desafio')->get()->first();
        $opciones_list = DB::table('opcions')->where('pregunta_id',$idpregunta)->get();

        if($opciones_list->first()){
            $opciones = array();
            foreach ($opciones_list as $o) {
                $opciones[$o->opcion]=$o;
            }

            return view('desafios.opciones.edit',
            ['pregunta'=>$pregunta],['opciones'=>$opciones]);
            }
        return view('desafios.opciones.create',
            ['pregunta'=>$pregunta],['opciones'=>$this->opciones]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $valor = $request->get("valors");
        
        foreach ($this->opciones as $o) {
            
            $opcion=DB::table('opcions')->where('opcion',$o,'and')
                                       ->where('pregunta_id',$request->get('pregunta_id'),'and')->get()->first();
                            

                            if(!$opcion){
                                $opcion = Opcion::create([
                                'opcion' => $o,
                                'valor' => Purifier::clean($valor["$o"]),
                                'pregunta_id' => $request->get('pregunta_id'),
                                ]);
                                $opcion->save();
                            }
                            else{
                                $opc= Opcion::findOrFail($opcion->id);
                                $opc->opcion= $opcion->opcion;
                                $opc->valor= Purifier::clean($valor["$o"]);
                                $opc->pregunta_id= $request->get('pregunta_id');
                                $opc->update();
                            }
        
        }

        $pregunta = Pregunta::findOrFail($request->get('pregunta_id'))->get()->first();

        return redirect()->route('desafio.show', ['id' => $pregunta->desafio_id])->with('alert-success', "Opciones creadas con Éxito");
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
        //
    }
}
