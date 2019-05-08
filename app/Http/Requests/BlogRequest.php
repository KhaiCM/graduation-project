<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'describe' => 'required|min:3|max:255',
            'content' => 'required|min:3',
            'file' => 'required|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('message.cannotblank_title'),
            'title.min' => trans('message.title_tooshort'),
            'title.max' => trans('message.title_toolong'),
            'describe.required' => trans('message.cannotblank_describe'),
            'describe.min' => trans('message.describe_tooshort'),
            'describe.max' => trans('message.describe_toolong'),
            'content.required' => trans('message.cannotblank_content'),
            'content.min' => trans('message.content_tooshort'),
            'file.required' => trans('message.file_required'),
            'file.mimes' => trans('message.file_mimes'),
            'file.max' => trans('message.file_max')
        ];
    }
}
