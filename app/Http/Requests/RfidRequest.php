<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RfidRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'rfid'  => 'required|string|unique:rfids',
        ];
    }
}
