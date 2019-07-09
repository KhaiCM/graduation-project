<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarFormRequest extends FormRequest
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
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required',
            'note' => 'required'
        ];
    }

    public function message()
    {
        return [
            'date.required' => 'ngày hẹn không thể trống',
            'time.required' => 'thời gian không thể trống',
            'phone.required' => 'số điện thoại không thể trống',
            'note.required' => 'ghi chú không thể trống',
        ];
    }
}
