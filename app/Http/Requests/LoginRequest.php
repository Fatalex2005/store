<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'    => 'required|string|max:64',
            'password_hash' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Поле не может быть пустым.',
            'username.max' => 'Поле не может содержать более :max символов.',
            'password_hash.required' => 'Поле не может быть пустым.',
            'password_hash.max' => 'Поле не может содержать более :max символов.',
        ];
    }

}
