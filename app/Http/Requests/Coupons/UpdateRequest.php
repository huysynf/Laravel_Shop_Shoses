<?php

namespace App\Http\Requests\Coupons;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'code'=>'required|unique:coupons,code,'.$this->coupon,
            'type'=>'required',
            'value'=>'required|numeric|min:0',
            'status'=>'required',
            'expiry_date'=>'required',
            'quantity'=>'required|numeric|min:0',
        ];
    }
}
