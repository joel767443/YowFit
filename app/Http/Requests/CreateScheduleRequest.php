<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'wakeup_time' => 'nullable|date_format:H:i:s',
            'exercise_time' => 'nullable|date_format:H:i:s',
            'eating_time' => 'nullable|date_format:H:i:s',
            'sleeping_time' => 'nullable|date_format:H:i:s',
            'relaxation_time' => 'nullable|date_format:H:i:s',
        ];
    }
}
