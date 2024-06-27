<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name'        => 'string|max:32',
            'description' => 'nullable|string',
            'price'        => ['numeric', 'min:0', 'regex:/^\d{1,8}(\.\d{1,2})?$/'], // Формат decimal(10,2)
            'quantity'    => 'integer|min:1',
            'category_id' => 'integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'name.max'            => 'Поле должно содержать не более :max символов.',
            'price.numeric'       => 'Поле должно быть числом.',
            'price.min'           => 'Поле должно быть не менее :min.',
            'price.regex'         => 'Недопустимый формат поля.',
            'quantity.integer'    => 'Поле должно быть целым числом.',
            'quantity.min'        => 'Поле должно быть не менее :min.',
            'category_id.integer' => 'Поле должно быть целым числом.',
            'category_id.min'     => 'Поле должно быть не менее :min.',
        ];
    }

}
