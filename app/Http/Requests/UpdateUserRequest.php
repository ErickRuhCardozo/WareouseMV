<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:6'],
            'unity_id' => ['required', 'numeric'],
            'role_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'unity_id.numeric' => 'Selecione uma Unidade para este Usuário',
            'role_id.numeric' => 'Selecione o Tipo desse Usuário',
        ];
    }
}
