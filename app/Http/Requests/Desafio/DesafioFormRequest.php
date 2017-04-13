<?php

namespace mathmaster\Http\Requests\Desafio;

use Illuminate\Foundation\Http\FormRequest;

class DesafioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:255 |unique:desafios',
            'nivel' => 'required|numeric',
            'descripcion' => 'required|max:55',
            'planteamiento' => 'required',
            'fondo' => 'required|url',
            'sub_escenario_id' => 'required',
            'color' => 'required',
        ];
    }    
}
