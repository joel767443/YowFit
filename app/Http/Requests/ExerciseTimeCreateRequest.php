<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ExerciseUpdateRequest
 */
class ExerciseTimeCreateRequest extends FormRequest
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
            'exercise_time_from' => 'required',
            'exercise_time_to' => 'required',
            'schedule_id' => 'required',
            'exercise_id' => 'required',
        ];
    }
}
