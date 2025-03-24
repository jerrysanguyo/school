<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        $userId = $this->route('user')?->id;
        return [
            'first_name'   => 'required|string|max:255',
            'middle_name'  => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'          => 'required|string|email|max:255|unique:users,email,' . $userId,
            'contact_number' => 'required|string|max:255|unique:users,contact_number,' . $userId,
            'password'     => 'required|string|min:8',
        ];
    }
}