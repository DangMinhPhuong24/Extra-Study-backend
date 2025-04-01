<?php

namespace App\Http\Requests\User;

use App\Traits\ValidateTrait;
use Illuminate\Foundation\Http\FormRequest;

class LoginAPIRequest extends FormRequest
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
            'username' => 'required|exists:users,username,deleted_at,NULL',
            'password' => 'required',
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
            'username.required' => __('validation.username.required_login'),
            'username.exists' => __('validation.username.exists'),
            'password.required' => __('validation.password.required_login'),
        ];
    }
}
