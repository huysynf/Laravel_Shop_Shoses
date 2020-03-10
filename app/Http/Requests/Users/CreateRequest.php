<?php

namespace App\Http\Requests\Users;

use App\Rules\CheckPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'password' => 'required|min:6|confirmed',
            'name'=>'required',
            'role'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'email'=>'required|unique:users,email|email',
            'phone'=>['required',new CheckPhoneNumber()],
            'image'=>'required|image|mimes:jpeg,bmp,png,jpg',
        ];
    }
}
