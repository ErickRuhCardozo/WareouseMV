<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:4', 'unique:unities']
        ];
    }
}
