<?php

namespace App\Http\Requests\User;

use App\Traits\ValidateTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserAPIRequest extends FormRequest
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
        $method = $this->method();

        switch ($method) {
            case "GET":
            case "DELETE":
                return [
                    'id' => ['required', 'integer', 'exists:users,id'],
                ];
            case "POST":
                $valid = [
                    'username' => [
                        'required',
                        'regex:/^[a-zA-Z0-9]*$/',
                        'unique:users,username,'
                    ],
                    'email' => [
                        'required',
                        'email',
                        'regex:/^[a-zA-Z0-9@.-]*$/',
                        'ends_with:' . config('constants.user.domain_email'),
                        'unique:users,email'
                    ],
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
                ];
                $baseRule = $this->commonValidate();
                return array_merge($baseRule, $valid);
            case "PUT":
            case "PATCH":
                $valid = [
                    'id' => ['required', 'integer', 'exists:users,id'],
                    'username' => [
                        'nullable',
                        'regex:/^[a-zA-Z0-9]*$/',
                        'unique:users,username,' . $this['id'] . ',id'
                    ],
                    'email' => [
                        'required',
                        'email',
                        'regex:/^[a-zA-Z0-9@.-]*$/',
                        'ends_with:' . config('constants.user.domain_email'),
                        'unique:users,email,' . $this['id'] . ',id'
                    ],
                    'password' => [
                        'nullable',
                        Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()
                    ],
                    'new_password_confirmation' => [
                        'bail',
                        'nullable',
                        'required_with:password',
                        'same:password'
                    ],
                ];
                $baseRule = $this->commonValidate();

                return array_merge($baseRule, $valid);
            default:
                return [];
        }
    }

    /**
     * Validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => __('validation.id.required'),
            'id.integer' => __('validation.id.integer'),
            'id.exists' => __('validation.id.exists'),
            'username.required' => __('validation.username.required'),
            'username.regex' => __('validation.username.regex'),
            'username.unique' => __('validation.username.unique'),
            'email.required' => __('validation.email.required'),
            'email.email' => __('validation.email.valid'),
            'email.regex' => __('validation.email.regex'),
            'email.ends_with' => __('validation.email.ends_with'),
            'email.unique' => __('validation.email.unique'),
            'password.required' => __('validation.password.required'),
            'password.min' => __('validation.password.min'),
            'new_password_confirmation.min' => __('validation.password.min'),
            'new_password_confirmation.required_with' => __('validation.new_password_confirmation.required_with'),
            'new_password_confirmation.same' => __('validation.new_password_confirmation.same'),
            'name.required' => __('validation.name.required'),
            'name.regex' => __('validation.name.regex'),
            'role_id.required' => __('validation.role_id.required'),
            'role_id.integer' => __('validation.role_id.integer'),
            'role_id.exists' => __('validation.role_id.exists'),
        ];
    }

    /**
     * @return array[]
     */
    private function commonValidate(): array
    {
        return [
            'name' => ['required', 'regex:/^[a-zA-ZÀ-ỹ0-9\s]*$/'],
            'role_id' => ['nullable', 'integer', 'exists:roles,id'],    
        ];
    }
}
