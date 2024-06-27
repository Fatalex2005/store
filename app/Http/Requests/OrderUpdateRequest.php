<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'address' => 'string|max:255',
            'status' => 'string|max:32'
        ];
    }
    public function messages()
    {
        return [
            'address.max'         => 'Поле должно содержать не более :max символов.',
            'status.max'         => 'Поле должно содержать не более :max символов.',
        ];
    }
}
