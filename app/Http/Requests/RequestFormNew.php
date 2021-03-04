<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestFormNew extends FormRequest
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
           'titulo'=>['required','string','Min:10'],
            'extracto'=>['required','string','Min:20'],
            'cuerpo'=>['required','string','Min:200'],
            'foto'=>['required','image'],
            'state'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'titulo.required'=>'El titulo es requerido',
            'extracto.required'=>'El extracto es requerido',
            'cuerpo.required'=>'El cuerpo es requerido',
            'foto.required'=>'La foto es requerida',
            'state.required'=>'El state es requerido'
        ];
    }
}
