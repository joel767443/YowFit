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
            'exercise_time_from' => 'required|date_format:H:i:s',
            'exercise_time_to' => 'required|date_format:H:i:s|after:exercise_time_from',
            'schedule_id' => 'required|exists:schedules,id',
            'exercise_id' => 'required|exists:exercises,id',
        ];
    }
}
