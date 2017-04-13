<?php

namespace mathmaster\Http\Controllers\Desafio;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;

use mathmaster\Http\Requests\Desafio\Pregunta\PreguntaFormRequest;
use Illuminate\Support\Facades\Redirect;
use mathmaster\Desafio\Pregunta;
use Mews\Purifier\Facades\Purifier;
use DB;


class PreguntaController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreguntaFormRequest $request)
    {
        $pregunta = Pregunta::create([
            'puntos' => $request->get('puntos'),
            'formulacion' => $request->get('formulacion'),
            'pista' => Purifier::clean($request->get('pista')),
            'desafio_id' => $request->get('desafio_id'),
            'respuesta' => $request->get('respuesta'),
        ]);
        $pregunta->save();
        return redirect()->route('desafio.show', ['id' => $request->get('desafio_id')])->with('alert-success', "Pregunta ID:$pregunta->id Creado con Éxito");
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
