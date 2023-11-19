<?php

namespace App\Http\Requests;

use App\Models\BookType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookTypeRequest extends FormRequest
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
        $table_name = (new BookType())->getTable();
        $id = request()->segment('3');
        return [
            'name'=>['required', Rule::unique($table_name)->ignore($id)],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Thể loại sách không được để trống',
            'name.unique'=>'Thể loại sách đã có'
        ];
    }
}
