<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeSettingsRequest extends FormRequest
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
            'banner_title' => ['required', 'string', 'max:50'],
            'banner_description' => ['required', 'string', 'max:150'],
            'links' => ['array', 'max:10'],
            'links.*.name' => ['required', 'string'],
            'links.*.url' => ['required', 'url'] 
        ];
    }
}
