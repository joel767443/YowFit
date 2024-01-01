<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'eating_times' => '',
            'exercise_times' => '',
            'work_times' => '',
            'relaxation_times' => '',
            'user_id' => '',
            'hours_sleep' => '',
            'sleeping_time' => '',
            'wakeup_time' => '',
            'weighing_frequency' => '',
            'exercises_per_day' => '',
            'meals_per_day' => '',
        ];
    }
}
