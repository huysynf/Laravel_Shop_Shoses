<?php

namespace App\Http\Requests\Products;

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
                'name'=>['required','unique:products,name'],
                'product_key'=>'required|unique:products,product_key',
                'image'=>'required|image|mimes:jpeg,bmp,png',
                'brand_id'=>'required',
                'sale'=>'required|numeric|min:0|max:100',
                'categories'=>'required',
                'status'=>'required',
                'description'=>'required',
            ];
    }
}
