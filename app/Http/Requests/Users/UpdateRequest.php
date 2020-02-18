<?php

namespace App\Http\Requests\Users;

use App\Rules\CheckPhoneNumber;
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
            'name'=>'required',
            'role'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->id,
            'phone'=>['required',new CheckPhoneNumber()],
        ];
    }
}
