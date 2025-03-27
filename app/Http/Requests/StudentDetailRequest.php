<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'house_no' => 'required|string',
            'street' => 'required|string',
            'barangay_id' => 'required|integer|exists:barangays,id',
            'district_id' => 'required|integer|exists:districts,id',
            'city' => 'required|string',
        ];
    }
}
