<?php

namespace mathmaster\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class PerfilFormRequest extends FormRequest
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
            'perfil' => 'required|max:100',
            'genero' => 'required|max:100',
            'country' => 'required|max:100',
        ];
    }
}

