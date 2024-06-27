<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'username'      => 'required|string|max:64',
            'password_hash'      => 'required|string|min:8|max:255|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'email'         => 'required|email|max:64|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Поле обязательно для заполнения.',
            'username.max' => 'Поле должно содержать не более :max символов.',

            'password_hash.required' => 'Поле обязательно для заполнения.',
            'password_hash.min' => 'Поле должно содержать не менее :min символов.',
            'password_hash.max' => 'Поле должно содержать не более :max символов.',
            'password_hash.regex' => 'Пароль должен содержать как минимум одну цифру, одну заглавную букву, одну малую букву и один специальный символ.',

            'email.required' => 'Поле обязательно для заполнения.',
            'email.email' => 'Поле должно быть действительным адресом электронной почты.',
            'email.max' => 'Поле должно содержать не более :max символов.',
            'email.unique' => 'Такое уже существует.',
        ];
    }
}
