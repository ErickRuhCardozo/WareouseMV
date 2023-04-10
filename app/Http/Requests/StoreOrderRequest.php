<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'products' => ['required', 'array']
        ];
    }
}
