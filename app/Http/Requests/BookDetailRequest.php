<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookDetailRequest extends FormRequest
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
            'book_id'=>['required'],
            'book_type_id'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            'book_id.required'=>'Tên sách không được để trống',
            'book_type_id'=>'Thể loại sách không được để trống ',
        ];
    }
}
