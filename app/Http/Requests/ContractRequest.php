<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'lessee_id' => 'min:3',
            'rent_time' => 'min:3',
            'start_date' => 'min:3',
            'end_date' => 'min:3',
            'content' => 'min:3',
            'total_money' => 'min:3',
        ];
    }
}
