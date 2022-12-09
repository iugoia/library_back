<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login' => ['required', 'string', 'unique:users,login', 'min:4', 'max:30'],
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'surname' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'unique:users,phone', 'min:11'],
            'password' => ['required', 'string', 'min:5'],
            'avatar' => ['required', 'file', 'mimes:jpg,jpeg,png']
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Логин обязательный'
        ];
    }
}
