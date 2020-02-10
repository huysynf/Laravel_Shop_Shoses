<?php

namespace App\Http\Requests\carts;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'qty'=>'min:0',
            'color'=>'required',
            'size'=>'required',
        ];
    }
    public function messages()
    {
        return
        [
            'qty.min'=>'Số lượng lớn hơn 0',
            'color.required'=>'Chọn màu',
            'size.required'=>'Chọn Kích cỡ',
        ];
    }
}
