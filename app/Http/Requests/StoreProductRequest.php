<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:5', 'unique:products'],
            'code' => ['required', 'min:13'],
            'category_id' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'category_id' => 'Selecione a categoria desse Produto',
        ];
    }
}
