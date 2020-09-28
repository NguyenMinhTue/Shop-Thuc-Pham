<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required|min:3|max:25',
            'desc'=>'required',
//            'old_price'=>'required|double',
            'old_price'=>'required|numeric',
            'new_price'=>'required|numeric',
//            'new_price'=>'required',
            'image'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Độ dài tên phải nhỏ hơn 25 ký tự ',
            'name.min' => 'Độ dài tên phải lớn hơn 5 ký tự',
            'desc.required' => 'Mô tả không được để trống',
//            'old_price.double'=>'Giá sản phẩm kiểu double :)',
            'old_price.required' => 'Giá sản phẩm không được để trống',
            'old_price.numeric' => 'Giá sản phẩm không phù hợp',
            'new_price.required' => 'Giá sản phẩm không được để trống',
            'new_price.numeric' => 'Giá sản phẩm không phù hợp',
//            'new_price.double'=>'Giá sản phẩm kiểu double :)',
            'image.required' => 'Ảnh không được để trống',

        ];
    }
}
