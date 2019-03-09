<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'address' => 'required|min:|max:255',
            'price' => 'required',
            'acreage' => 'required',
            'describe' => 'required|min:5|max:300',
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validate.name_required'),
            'name.min' => __('validate.name_length'),
            'name.max' => __('validate.name_length'),
            'address.required' => __('validate.name_required'),
            'address.min' => __('validate.name_length'),
            'address.max' => __('validate.name_length'),
            'price.required' => __('validate.name_required'),
            'acreage.required' => __('validate.name_required'),
            'describe.required' => __('validate.name_required'),
            'describe.min' => __('validate.name_length'),
            'describe.max' => __('validate.name_length'),
            'file.required' => __('validate.name_required'),
            'file.max' => __('message.max'),
        ];
    }
}
