<?php

namespace App\Http\Requests\User;

use App\Traits\ValidateTrait;
use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordAPIRequest extends FormRequest
{
    use ValidateTrait;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9@.-]*$/',
                'ends_with:' . config('constants.user.domain_email'),
                'exists:users,email,deleted_at,NULL'
            ],
            
        ];
    }

    /**
     * Validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => __('validation.email.required'),
            'email.email' => __('validation.email.valid'),
            'email.regex' => __('validation.email.regex'),
            'email.ends_with' => __('validation.email.ends_with'),
            'email.exists' => __('validation.email.exists'),
        ];
    }
}
