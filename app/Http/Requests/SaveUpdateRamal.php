<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class SaveUpdateRamal extends FormRequest
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
        $id = $this->route()->parameter('id');

        return [
            "empresa_id" => "required",
            "setor_id" => "required",
            "ramal" => "required",
            "nome_maquina" => "required|unique:ramais,nome_maquina,".$id
        ];
    }
}
