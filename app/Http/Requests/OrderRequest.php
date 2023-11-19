<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'payment_method_id'=>['required'],
            'shipping_method_id'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            'payment_method_id.required'=>'Bạn chưa chọn phương thức thanh toán  ',
            'shipping_method_id.required'=>'Bạn chưa chọn phương thức vận chuyển',
        ];
    }
}
