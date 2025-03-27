<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'district_id' => 'required|exists:districts,id',
            'name' => 'required|string|max:255',
            'remarks' => 'nullable|string',
        ];
    }
}
