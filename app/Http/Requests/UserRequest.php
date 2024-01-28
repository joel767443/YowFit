<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRequest
 */
class UserRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email' . (!$this->isMethod("PUT") ? '|unique:users' : ''),
            'user_status_id' => 'exists:user_statuses,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
            'password' => 'string|min:8',
        ];
    }
}
