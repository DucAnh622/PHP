<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSinhVienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'Name' => 'required|string|max: 50',
            'Age' => 'required|integer',
            'MSSV' => 'required|string|max: 255',
        ];
    }
    public function messages(): array
    {
        return [
            'Name.required' => 'Name is invalid!',
            'Age.required' => 'Age is invalid!',
            'MSSV.required' => 'MSSV is invalid!',
        ];
    }
}
