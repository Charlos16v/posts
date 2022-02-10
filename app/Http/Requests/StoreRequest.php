<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'titulo'=> 'required|min:1|max:28',
            'extracto' => 'required|max:50',
            'contenido' => 'required|min:20|max:256'
            /*
            'caducable' => 'required|min:2|max:3',
            'comentable' => 'required|min:2|max:3',
            'acceso' => 'required|min:2|max:3',*/
        ];
    }
}
