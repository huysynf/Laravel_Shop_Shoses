<?php

namespace App\Http\Requests\Users;

use App\Rules\CheckPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class CreateGestRequest extends FormRequest
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
              'password' => 'required|min:5|confirmed',
              'name'=>'required',
              'email'=>'required|unique:users,email|email',
              'phone'=>['required',new CheckPhoneNumber()],
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'Mật khẩu không để trống ',
             ' password.min'=>'Mật khẩu lớn hơn 5 kí tụ ',
             'password.confirmed'=>'Mật khẩu với nhập lại mật khẩu không trùng nhau ',
            'name.required'=>'Tên  không để trống ',
            'phone.required'=>'Số điện thoại không để trống ',
            'email.required'=>'Email không để trống ',
            'email.email'=>'Email đãn được sử dụng ',

        ];
    }
}
