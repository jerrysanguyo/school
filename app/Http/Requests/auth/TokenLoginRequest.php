<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class TokenLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }
    
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
