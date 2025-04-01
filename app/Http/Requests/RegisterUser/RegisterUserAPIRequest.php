<?php

namespace App\Http\Requests\RegisterUser;

use App\Traits\ValidateTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserAPIRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $method = $this->method();

        $validId = [
            'id' => 'required|integer|exists:register_user,id'
        ];

        switch ($method) {
            case "GET":
            case "DELETE":
                return $validId;
            case "POST":
            case "PUT":
            case "PATCH":
                return $this->commonValidate();
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

            'register_ids.required' => __('validation.register_ids.required'),
            'register_ids.array' => __('validation.register_ids.array')
        ];
    }

    /**
     * @return array[]
     */
    private function commonValidate(): array
    {
        return [
            'register_ids' => ['required', 'array'],
        ];
    }
}
