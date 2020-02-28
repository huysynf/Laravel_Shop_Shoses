<?php

namespace App\Http\Requests\Users;

use App\Rules\CheckPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
                'name'=>'required',
                'gender'=>'required',
                'address'=>'required',
                'email'=>'required|email|unique:users,email,'.$this->id,
                'phone'=>['required',new CheckPhoneNumber()],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống',
            'gender.required'=>'Giới tính không được để trống',
            'address.required'=>'Địa chỉ không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Email đã được sử dụng.',
            'phone.required'=>'Điên thoại không được để trống',
        ];
    }
}
