<?php

namespace App\Http\Requests\Products;

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
            'name'=>['required','unique:products,name,'.$this->id],
            'product_key'=>'required|unique:products,product_key,'.$this->id,
            'image'=>'required|image|mimes:jpeg,bmp,png',
            'sale'=>'required|numeric|min:0|max:100',
            'categories'=>'required',
            'brand_id'=>'required',
            'status'=>'required',
            'description'=>'required',
        ];
    }
}
