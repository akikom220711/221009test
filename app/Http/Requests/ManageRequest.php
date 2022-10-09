<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageRequest extends FormRequest
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
            'search_name' => 'nullable|max:255',
            'date_forth' => 'nullable|date',
            'date_back' => 'nullable|date',
            'search_email' => 'nullable|email|max:255'
        ];
    }
}
