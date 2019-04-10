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
            'district_id' => 'required',
            'property_type_id' => 'required',
            'address' => 'required|min:|max:255',
            'price' => 'required',
            'acreage' => 'required',
            'describe' => 'required|min:5',
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'end_date' => 'requered',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('label.name_required'),
            'name.min' => __('validate.name_length'),
            'name.max' => __('validate.name_length'),
            'property_type_id.required' => 'message.propertytype_id',
            'district_id.required' => 'message.property_district_id',
            'address.required' => __('validate.name_required'),
            'address.min' => __('validate.name_length'),
            'address.max' => __('validate.name_length'),
            'price.required' => __('validate.name_required'),
            'acreage.required' => __('validate.name_required'),
            'describe.required' => __('validate.name_required'),
            'describe.min' => __('validate.name_length'),
            'file.max' => __('message.max'),
        ];
    }
}
