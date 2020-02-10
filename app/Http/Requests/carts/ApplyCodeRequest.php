<?php

namespace App\Http\Requests\carts;

use Illuminate\Foundation\Http\FormRequest;

class ApplyCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coupon_code' => 'required'
        ];
    }
    public function messages()
    {
        return
        [
            'coupon_code.required' => 'Nhập Mã giảm giá',
        ];
    }
}
