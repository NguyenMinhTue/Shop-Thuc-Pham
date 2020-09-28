<?php


namespace App\Http\Controllers\Requests;


use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'link'=>'required',
            'image'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'link.required' => 'Link không được để trống',

            'image.required' => 'Ảnh không được để trống',
        ];
    }
}
