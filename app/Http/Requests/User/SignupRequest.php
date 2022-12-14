<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SignupRequest extends FormRequest
{
//    public function authorize()
//    {
//        return true;
//    }

    public function rules()
    {
        return [

        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Это поле необходимо для заполнения',
            'login.string' => 'Данные должны соответствовать строчному типу',
            'login.unique:users,login' => 'Логин уже занят',
            'login.min:4' => 'Логин должен состоять из 4 и более символов',
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'name.min:2' => 'Имя должно состоять из 4 и более символов',
            'surname.required' => 'Это поле необходимо для заполнения',
            'surname.string' => 'Данные должны соответствовать строчному типу',
            'surname.min:3' => 'Фамилия должна состоять из 3 и более символов',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Данные должны соответствовать строчному типу',
            'email.email' => 'Данные должны соответсвовать типу почты',
            'email.unique:users,email' => 'Почта уже занята',
            'phone.required' => 'Это поле необходимо для заполнения',
            'phone.string' => 'Данные должны соответствовать строчному типу',
            'phone.unique:users,phone' => 'Телефон уже занят',
            'phone.min:11' => 'Телефон должен состоять из 11 символов',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Данные должны соответствовать строчному типу',
            'password.min:5' => 'Пароль должен состоять из 5 символов',
            'avatar.required' => 'Это поле необходимо для заполнения',
            'avatar.file' => 'Данные должны соответствовать файловому типу',
            'avatar.mimes:jpg,jpeg,png' => 'Загружаемые файлы должны иметь расширения jpg,jpeg,png'
        ];
    }

//    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json([
//            'status' => false,
//            'errors' => $validator->errors()
//        ], 422));
//    }
}
