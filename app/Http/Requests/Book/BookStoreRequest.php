<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookStoreRequest extends FormRequest
{
//    public function authorize()
//    {
//        return false;
//    }
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'string'],
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png'],
            'author' => ['required', 'min:5', 'string'],
            'genre' => ['required', 'string'],
            'rack' => ['required', 'numeric'],
            'shelf' => ['required', 'numeric'],
            'row' => ['required', 'numeric'],
            'description' => ['nullable', 'string']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ], 422));
    }
}
