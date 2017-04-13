<?php

namespace mathmaster\Http\Requests\Desafio\Pregunta;

use Illuminate\Foundation\Http\FormRequest;

class PreguntaFormRequest extends FormRequest
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
            'puntos' => 'required|numeric',
            'formulacion' => 'required|max:140',
            'respuesta' => 'required|max:100',
            'pista' => 'required',
            'desafio_id' => 'required',
        ];
    }
}
