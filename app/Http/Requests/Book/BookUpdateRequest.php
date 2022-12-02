<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
{
//    public function authorize()
//    {
//        return false;
//    }

    public function rules()
    {
        return [
            'name' => ['nullable', 'min:2', 'string'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
            'author' => ['nullable', 'min:5', 'string'],
            'rack' => ['nullable', 'numeric'],
            'genre' => 'nullable',
            'shelf' => ['nullable', 'numeric'],
            'row' => ['nullable', 'numeric'],
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
