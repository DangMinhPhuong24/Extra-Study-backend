<?php

namespace App\Http\Requests\User;

use App\Traits\ValidateTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordAPIRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'new_password_confirmation' => [
                'bail',
                'required_with:password',
                'same:password'
            ],
            'token' => ['exists:password_reset_tokens,token']
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
            'password.required' => __('validation.password.required'),
            'password.min' => __('validation.password.min'),
            'new_password_confirmation.required_with' => __('validation.new_password_confirmation.required_with'),
            'new_password_confirmation.same' => __('validation.new_password_confirmation.same'),
            'token.exists' => __('validation.token.exists'),
        ];
    }
}
