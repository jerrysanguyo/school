<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'time-in'  => 'required|date_format:H:i:s.v',
            'time-out' => 'nullable|date_format:H:i:s.v',
        ];
    }
}
