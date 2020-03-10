<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
           'email'=>'required',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return[
            'password.required'=>'Mật khẩu không để trống ',
            'email.required'=>'Tên  không để trống ',
        ];
    }
}
