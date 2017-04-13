<?php

namespace mathmaster\Http\Controllers;

use Illuminate\Http\Request;
use mathmaster\Http\Controllers\Controller;
use mathmaster\User;
use mathmaster\Mensaje;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Redirect;
use mathmaster\Http\Requests\Desafio\Escenario\SubEscenarioFormRequest;
use Carbon\Carbon;
use Mail;
use Auth;
use Laratrust;
use Validator;

class MensajeController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $mensajes = Mensaje::where('receptor_user_id',Auth::user()->id)->get();
       return view('mensajes.show',['mensajes'=>$mensajes]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $usuarios=User::with('roles')->get();
        return view('mensajes.create',['users'=>$usuarios]
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
        $this->validate($request, [
        'mensaje' => 'required',
        ]);

        if($request->get('todos')==1)
        {
            $receptor=NULL;
        }
        else
        {   
            Validator::make($request->all(), [
            'receptor_user_id' => 'required'
        ],['receptor_user_id.required'=>"Debe ingresar un Destinario"]
        )->validate();

            $receptor=$request->get('receptor_user_id');    
        }

        $subescenario = Mensaje::create([
            'emisor_user_id' => Laratrust::user()->id,
            'receptor_user_id' => $receptor,
            'mensaje' => Purifier::clean($request->get('mensaje')),
            'fecha' => Carbon::now(),
            'todos' => $request->get('todos'),
            'leido' => 'NO',
        ]);
        $subescenario->save();
        return Redirect::to('usuario')->with('alert-success', "Mensaje Enviado con Éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
       $mensajes = Mensaje::where('receptor_user_id',Auth::user()->id)->get();
       return view('mensajes.show',['mensajes'=>$mensajes]);
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
        $subescenario = SubEscenario::findOrFail($id)->with('escenario')->with('desafios')->get()->first();
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
        $msg=Mensaje::findOrFail($id);
        $msg->delete();

        return redirect()->route('mensaje.show',['id'=>Auth::user()->id])->with('alert-success', "Mensaje Eliminado con Éxito");    
    }

    public function mail(Request $request)
    {
    
    $envio = Mail::send('emails.mensaje', ['mensaje'=>$request->get('message')], function ($message) use ($request){
    $message->from('us@example.com', $request->get('name'));

    $message->to($request->get('email'))->cc($request->get('email'));
    $message->subject($request->get('subject'));
    });

    return Redirect::to('/')->with('alert-success', "Mensaje Enviado con Éxito");

    }

    public function leido(Request $request){
      
      $id = $request->get('id');
      $mensaje = Mensaje::findOrFail($id);
      $mensaje->leido ="SI";
      if($mensaje->update())
        return response()->json(array('success'=> true));
      else
        return response()->json(array('success'=> false));
   }
    
    public function general()
    {
       $mensajes = Mensaje::where('todos',1)->get();
       return view('mensajes.general',['mensajes'=>$mensajes]); 
    }
}
