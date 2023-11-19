<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'order_name'=>['required'],
            'order_email'=>['required', 'email'],
            'order_phone'=>['required'],
            'city'=>['required'],
            'district'=>['required'],
            'ward'=>['required'],
            'sonha'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            'order_name.required'=>'Tên người nhận hàng không để trống',
            'order_email.required'=>'Email nhận hàng không để trống',
            'order_email.email'=>'Email không đúng định dạng',
            'order_phone.required'=>'SĐT nhận hàng không để trống',
            'city.required'=>'Chọn thành phố',
            'district.required'=>'Chọn quận/huyện',
            'ward.required'=>'Chọn xã/phường',
            'sonha'=>'Số nhà hoặc tên đường không được để trống'

        ];
    }
}
