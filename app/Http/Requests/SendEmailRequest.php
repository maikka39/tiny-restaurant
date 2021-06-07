<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'firstname.required' => 'Laat ons weten wie je bent!',
            'lastname.required' => 'Laat ons weten wie je bent!',
            'email.required' => 'Laat ons weten hoe we je kunnen bereiken!',
            'message.required' => 'Je bericht is nog leeg!',
            'g-recaptcha-response.required' => 'Laat ons weten dat je geen robot bent!',
            'g-recaptcha-response.captcha' => 'Er is iets fout gegaan, probeer het opnieuw.',
        ];
    }
}
