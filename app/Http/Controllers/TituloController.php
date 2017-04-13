<?php

namespace mathmaster\Http\Controllers;

use Illuminate\Http\Request;
use mathmaster\Titulo;

class TituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $titulos = Titulo::all();
        return view('titulos.index',['titulos'=>$titulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titulo = Titulo::create([
            'nombre' => $request->get('nombre'),
            'imagen' => $request->get('imagen'),
            'nivel' => $request->get('nivel'),
            'rango' => $request->get('rango'),
            'efectividad' => $request->get('efectividad'),
            'velocidad' => $request->get('velocidad'),
        ]);
        $titulo->save();
        return redirect()->route('titulo.index')->with('alert-success', "Título Creado con Éxito");
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
        $titulo = Titulo::findOrFail($id);   
        return view('titulos.edit',['titulo'=>$titulo]);

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
        $titulo = Titulo::findOrFail($id);
            $titulo->nombre = $request->get('nombre');
            $titulo->imagen = $request->get('imagen');
            $titulo->nivel = $request->get('nivel');
            $titulo->rango = $request->get('rango');
            $titulo->efectividad = $request->get('efectividad');
            $titulo->velocidad = $request->get('velocidad');
        
        $titulo->update();
        return redirect()->route('titulo.index')->with('alert-success', "Título Actualizado con Éxito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $titulo = Titulo::findOrFail($id);
        $titulo->delete();
        return redirect()->route('titulo.index')->with('alert-success', "Título Borrado con Éxito");
    }
}
