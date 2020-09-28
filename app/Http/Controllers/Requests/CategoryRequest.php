<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|min:5|max:25',
            'desc'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Độ dài tên phải nhỏ hơn 25 ký tự ',
            'name.min' => 'Độ dài tên phải lớn hơn 5 ký tự',
            'desc.required' => 'Mô tả không được để trống',
        ];
    }
}
