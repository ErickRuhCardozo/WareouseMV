<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:6'],
            'password' => ['required', 'min:5'],
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
