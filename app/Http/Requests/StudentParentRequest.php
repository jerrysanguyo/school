<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentParentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }
    
    public function rules(): array
    {
        $parentId = $this->route('parent')?->id;
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email'          => 'required|string|email|max:255|unique:users,email,' . $parentId,
            'contact_number' => 'required|string|max:255|unique:users,contact_number,' . $parentId,
        ];
    }
}