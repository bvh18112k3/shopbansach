<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
        $table_name = (new Book())->getTable();
        $id = request()->segment('3');
        return [
            'name' => ['required', Rule::unique($table_name)->ignore($id)],
            'publishing_company' => ['required'],
            'publishing_year' => ['required'],
            'description' => ['required'],
            'pages' => ['required'],
            'weight' => ['required'],
            'size' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'status' => ['required'],
            'discount' => ['required'],
            'author_id' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên sách không được để trống',
            'name.unique'=>'Tên sách đã có',
            'publishing_company.required'=>'Nhà xuất bản không được để trống',
            'publishing_year'=>'Năm xuất bản không được để trống ',
            'description.required'=>'Mô tả sách không được để trống',
            'pages.required'=>'Số trang của sách không được để trống',
            'weight.required'=>'Trọng lượng của sách không được để trống',
            'size.required'=>'Kích thước của sách không được để trống',
            'price.required'=>'Giá bán của sách không được để trống',
            'quantity.required'=>'Số lượng của sách không được để trống',
            'discount.required'=>'Giảm giá không được để trống',
            'author_id.required'=>'Tác giả của sách không được để trống'
        ];
    }
}
